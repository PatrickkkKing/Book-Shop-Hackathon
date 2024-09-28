<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rows = Buku::where('status', 'Di Setujui')->get();

        // Variabel kosong untuk hasil pencarian (default)
        $books = collect(); 

        return view('dashboard', compact('rows', 'books'));
    }

    public function tampilgambar($id){
        // Ambil gambar berdasarkan ID
        $buku = Buku::find($id);

        // Jika gambar tidak ditemukan, return error atau redirect
        if (!$buku) {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan.');
        }

        // Ambil semua data buku untuk `rows`
        $rows = Buku::all();
        return view('dashboard', compact('buku', 'rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sinopsis(){
        $book = DB::table('tb_buku')
        ->join('users', 'tb_buku.id_buku', '=', 'users.id')  // Perbaiki kolom join
        ->select('tb_buku.*', 'users.name as user_name')
        ->get();

    return view('sinopsis', compact('book'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Pencarian hanya untuk buku yang statusnya 'approved'
        $books = Buku::where('status', 'Di Setujui')
            ->where(function ($q) use ($query) {
                $q->where('nama_buku', 'LIKE', "%{$query}%")
                ->orWhere('jenis_buku', 'LIKE', "%{$query}%")
                ->orWhereHas('penulis', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
                });
            })
            ->get();

        // Mengembalikan view dengan hasil pencarian
        return view('dashboard', compact('books'));
    }

    public function showApprovedBooks()
    {
        $approvedBooks = Buku::where('status', 'Di Setujui')->get();
        return view('dashboard', compact('approvedBooks'));
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $row = Buku::find($id);
        return view('sinopsis', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
