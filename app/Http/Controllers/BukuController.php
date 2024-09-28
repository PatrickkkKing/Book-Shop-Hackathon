<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Promise\Create;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Jika user adalah admin, tampilkan semua buku
        if (auth()->user()->hasRole('admin')) {
            $rows = Buku::paginate(10); // Tampilkan semua buku tanpa filter
        } else {
            // Jika bukan admin (misal penulis), tampilkan hanya buku milik user tersebut
            $rows = Buku::where('user_id', auth()->id())->paginate(10);
        }
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('buku.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'dokumen_buku' => 'required|mimes:pdf|max:2048',
            'cover_buku' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        //mengambil data yang di input oleh user
        $file = $request->file('dokumen_buku');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs('buku', $fileName); 

        // Simpan file gambar ke direktori 'public/images'
        $imageName = time().'.'.$request->cover_buku->extension();
        $request->cover_buku->move(public_path('images'), $imageName);

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'nama_buku' => $request->nama_buku,
            'jenis_buku' => $request->jenis_buku,
            'penerbit_buku' => $request->penerbit_buku,
            'tahun_terbit_buku' => $request->tahun_terbit_buku,
            'edisi_buku' => $request->edisi_buku,
            'harga_buku' => $request->harga_buku,
            'harga_jual' => $request->harga_jual,
            'sinopsis_buku' => $request->sinopsis_buku,
            'dokumen_buku' => $file->getClientOriginalName(),
            'path_buku' => $filePath,
            'cover_buku' => $imageName,
            'user_id' => auth()->id() // Tambahkan ini untuk menyimpan ID penulis (user)
        ]);
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if (auth()->user()->hasRole('admin')) {
            $row = Buku::findOrFail($id); // Tampilkan semua buku tanpa filter
            return view('buku.show', compact('row'));
        } else {
        $row = Buku::where('id_buku', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('buku.show', compact('row'));
    }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $row = Buku::where('id_buku', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('buku.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'dokumen_buku' => 'required|mimes:pdf|max:2048',
            'cover_buku' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        //mengambil data yang di input oleh user dokumen
        $file = $request->file('dokumen_buku');
        $fileName = time().'_'.$file->getClientOriginalName();
        $filePath = $file->storeAs('buku', $fileName);

        // Simpan file gambar ke direktori 'public/images'
        $imageName = time().'.'.$request->cover_buku->extension();
        $request->cover_buku->move(public_path('images'), $imageName);
        
        $row = Buku::findOrFail($id);
        $row->update([
            'kode_buku' => $request->kode_buku,
            'nama_buku' => $request->nama_buku,
            'jenis_buku' => $request->jenis_buku,
            'penerbit_buku' => $request->penerbit_buku,
            'tahun_terbit_buku' => $request->tahun_terbit_buku,
            'edisi_buku' => $request->edisi_buku,
            'harga_buku' => $request->harga_buku,
            'harga_jual' => $request->harga_jual,
            'sinopsis_buku' => $request->sinopsis_buku,
            'dokumen_buku' => $file->getClientOriginalName(),
            'path_buku' => $filePath,
            'cover_buku' => $imageName,
            'user_id' => $row->user_id, // Tetap simpan user_id yang sama
        ]);
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Buku::where('id_buku', $id)->where('user_id', auth()->id())->firstOrFail();
        $row->delete();
        toast('Your Post as been submited!','success');
        return redirect('buku');
    }

    public function lihatdata($id)
    {
        $row = Buku::findOrFail($id);
        // Ambil path dari storage
        $path = storage_path('app/' . $row->path_buku);
        
        // Return response file PDF
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $row->dokumen_buku . '"',
        ]);
        
    }

    public function tampilgambar($id){
        // Ambil gambar berdasarkan ID
        $buku = Buku::find($id);
        // Jika gambar tidak ditemukan, return error atau redirect
        if (!$buku) {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan.');
        }
        return view('buku.cover', compact('buku'));
    }

    public function approve($id)
    {
        $rows = Buku::findOrFail($id);
        $rows->status = 'Di Setujui';
        $rows->save();
        Alert::toast('Buku Telah Di Setujui', 'success');
        return redirect()->back();
    }

    public function reject($id)
    {
        $rows = Buku::findOrFail($id);
        $rows->status = 'Di Tolak';
        $rows->alasan_ditolak = 'Buku Di Tolak';
        $rows->save();
        Alert::toast('Data Buku Berhasil Di Tolak', 'success');
        return redirect()->back();
    }

    public function landingpage(){
        $rows = Buku::where('status', 'Di Setujui')->get();
        // Variabel kosong untuk hasil pencarian (default)
        $books = collect(); 
        return view('landingpage', compact('rows', 'books'));
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
        return view('landingpage', compact('books'));
    }

    public function bukuditerima()
    {
        $approvedBooks = Buku::where('status', 'Di Setujui')->get();
        return view('landingpage', compact('approvedBooks'));
    }
    public function beliBuku($id)
    {
        // Cari buku berdasarkan id
        $buku = Buku::findOrFail($id);

        // Tambahkan jumlah buku terjual
        $buku->jumlah_buku_terjual = $buku->jumlah_buku_terjual + 1;

        // Simpan perubahan
        $buku->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Buku berhasil dibeli!');
    }
}
