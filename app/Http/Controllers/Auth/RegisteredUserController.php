<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string', // role harus ada di form registrasi
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role dan permission berdasarkan pilihan role saat registrasi
        if ($request->role === 'penulis') {
            $user->assignRole('penulis');
            $user->givePermissionTo('view penulis');
        } else {
            $user->assignRole('pelanggan');
            $user->givePermissionTo('view pelanggan');
        }

        event(new Registered($user));
        Alert::toast('Pendaftaran Berhasil, Silahkan Login', 'success');
        return redirect()->route('login'); // Redirect ke dashboard setelah registrasi
    }

    /**
     * Redirect user setelah registrasi berdasarkan role.
     */
    protected function registered(Request $request, $user)
    {
        return redirect()->route('dashboard');
    }
    
}
