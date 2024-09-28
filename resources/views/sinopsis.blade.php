<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @can('view pelanggan')
    <div class="container p-3">
        <div class="row">
            <div class="col-8">
                <h3>{{$row->nama_buku}}</h3>
                <div class="card p-3">
                    <h5>Sinopsis</h5>
                    <p>{{$row->sinopsis_buku}}</p>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-4">
                    <img src="{{ asset('images/' . $row->cover_buku) }}" alt="{{ $row->nama_buku }}" style="max-width: 100%;">
                    <p class="text-secondary">Jenis :{{$row->jenis_buku}}</p>
                    <p class="text-secondary">Penulis :{{ $row->penulis->name }}</p>
                    <p class="text-secondary">Penerbit :{{$row->penerbit_buku}}</p>
                    <p class="text-secondary">Tahun Terbit:{{Carbon\carbon::parse($row->tahun_terbit_buku)->format('d F Y')}}</p>
                    <p class="text-secondary">Edisi : {{$row->edisi_buku}}</p>
                    <p class="text-secondary">Jumlah Terjual : {{$row->jumlah_buku_terjual}}</p>
                    <h2>Rp. {{$row->harga_jual}}</h2>
                    <form action="{{ route('buku.beli', $row->id_buku) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary">Beli E-Book</button>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                                    
                    {{-- <a class="btn btn-outline-success btn-sm" target="_blank" href="{{ route('files.show', $row->id_buku ) }}">E-Book</a> --}}
                </div>
            </div>
        </div>
    </div>
    @endcan
</x-app-layout>