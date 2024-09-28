<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penulis;
use App\Models\User;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rows = Penulis::all();
        $row = User::all();
        return view('penulis.index', compact('rows','row'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Penulis::create([
            'nama_penulis' => $request->nama_penulis,
            'tgl_lahir_penulis' => $request->tgl_lahir_penulis,
            'no_hp_penulis' => $request->no_hp_penulis,
            'alamat_penulis' => $request->alamat_penulis
        ]);
        return redirect('penulis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $row = Penulis::find($id);
        return redirect('penulis.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $row =  Penulis::findOrFail($id);
        $row->update([
            'nama_penulis' => $request->nama_penulis,
            'tgl_lahir_penulis' => $request->tgl_lahir_penulis,
            'no_hp_penulis' => $request->no_hp_penulis,
            'alamat_penulis' => $request->alamat_penulis
        ]);
        return redirect('penulis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Penulis::findOrFail($id);
        $row->destroy();
        return redirect('penulis.index');
    }
}
