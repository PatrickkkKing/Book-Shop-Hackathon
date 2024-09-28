<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @can('view penulis')
        <div>
            <h2>Welcome Penulis!</h2>
            <p>Ini adalah konten khusus untuk penulis.</p>
            <!-- Tambahkan konten lain yang spesifik untuk penulis -->
        </div>
    @endcan
    @can('view pelanggan')
    <div class="container mt-5">
        <!-- Form Pencarian -->
        <div class="row">
            <div class="col-4 offset-4">
                <form action="{{ route('books.search') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="query" placeholder="Cari judul, jenis buku, atau penulis" required>
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tombol untuk Menampilkan Buku Disetujui -->
        <div class="text-center mb-4">
            <a href="{{ route('books.approved') }}" class="btn btn-success">Tampilkan Seluruh Buku</a>
        </div>

        <!-- Hasil Pencarian dan Semua Buku -->
        <div class="container-fluid p-3">
            <div class="row">
                @if(isset($books) && $books->isNotEmpty())
                    @foreach ($books as $book)
                        <div class="col-3 rounded-3">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <img src="{{ asset('images/' . $book->cover_buku) }}" alt="{{ $book->nama_buku }}" style="max-width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$book->nama_buku}}</h5>
                                    <p class="fw-bold">{{$book->jenis_buku}}</p>
                                    <p class="fw-bold">{{$book->penulis->name}}</p>
                                    <p>Edisi: <span class="fw-bold">{{$book->edisi_buku}}</span></p>
                                    <h4>Rp. {{$book->harga_jual}}</h4>
                                    <a href="{{url('show/' . $book->id_buku)}}" class="btn btn-primary">Deskripsi E-Book</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif(isset($books) && $books->isEmpty())
                    <p class="text-center">Tidak ada buku yang ditemukan.</p>
                @else
                    @if(isset($approvedBooks) && $approvedBooks->isNotEmpty())
                        @foreach ($approvedBooks as $book)
                            <div class="col-3 rounded-3">
                                <div class="card shadow-sm" style="width: 18rem;">
                                    <img src="{{ asset('images/' . $book->cover_buku) }}" alt="{{ $book->nama_buku }}" style="max-width: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$book->nama_buku}}</h5>
                                        <p class="fw-bold">{{$book->jenis_buku}}</p>
                                        <p class="fw-bold">{{$book->penulis_buku}}</p>
                                        <p>Edisi: <span class="fw-bold">{{$book->edisi_buku}}</span></p>
                                        <h4>Rp. {{$book->harga_jual}}</h4>
                                        <a href="{{url('show/' . $book->id_buku)}}" class="btn btn-primary">Deskripsi E-Book</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
    @endcan
</x-app-layout>
