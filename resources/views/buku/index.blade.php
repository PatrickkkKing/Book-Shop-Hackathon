<x-app-layout>
    {{-- <x-slot name="header">
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <h2 class="text-center py-3" style="background-color: #FDF5BB; width: 390px;  border-radius: 15px;">
                        Welcome
                        To Book Shop</h2>
                </div>
                <div class="p-6 text-gray-900">
                    @can('view penulis')
                        <a href="{{ url('buku/create') }}" class="btn btn-primary">Tambah Buku</a>
                        <table class="table table-striped text-center mt-5">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Edisi</th>
                                <th>Harga Buku</th>
                                <th>Harga Jual</th>
                                <th>Status Buku</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($rows as $key => $row)
                                @if ($row->user_id === auth()->id())
                                    <tr>
                                        <td class="text-center">{{ $rows->firstItem() + $key }}</td>
                                        <td class="text-center">{{ $row->nama_buku }}</td>
                                        <td class="text-center">{{ $row->jenis_buku }}</td>
                                        <td class="text-center">{{ $row->penerbit_buku }}</td>
                                        <td class="text-center">
                                            {{ carbon\carbon::parse($row->tahun_terbit_buku)->format('d F Y') }}</td>
                                        <td class="text-center">{{ $row->edisi_buku }}</td>
                                        <td class="text-center">{{ $row->harga_buku }}</td>
                                        <td class="text-center">{{ $row->harga_jual }}</td>
                                        <td class="text-center">{{ $row->status }}</td>
                                        <td class="text-center">
                                            {{-- <a href="{{ route('image.show', $row->id_buku) }}" class="btn btn-outline-info btn-sm">Cover</a>
                                            <a class="btn btn-outline-success btn-sm" target="_blank" href="{{ route('files.show', $row->id_buku ) }}">E-Book</a> --}}
                                            <a href="{{ url('buku/show/' . $row->id_buku) }}"
                                                class="btn btn-outline-dark btn-sm">Data Buku</a>
                                            <a href={{ url('buku/edit/' . $row->id_buku) }}
                                                class="btn btn-outline-warning btn-sm">Edit</a>
                                            <a href="{{ url('buku/' . $row->id_buku) }}" data-confirm-delete="true"
                                                class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    @endcan
                </div>
                @can('view admin')


                    <div class="row mx-2" style="width: 350px">
                        @foreach ($rows as $key => $row)
                            <div class="col ">
                                <img src="{{ asset('images/' . $row->cover_buku) }}" alt="{{ $row->nama_buku }}"
                                    style="width: 350px; height: 150px">
                                <p class="text-center mt-1"
                                    style=" height: 50px;  overflow: hidden;white-space: normal; text-overflow: ellipsis;
                                 ">
                                    {{ $row->nama_buku }}</p>
                                <p class="text-center mt-1 p-2 text-white"
                                    style=" background-color: #73D393;border-radius: 15px; ">
                                    Rp. {{ $row->harga_jual }}</p>
                                <p class="text-center mt-1 p-2" style=" background-color: #F8EDA5;border-radius: 15px; ">
                                    Buy</p>
                            </div>
                        @endforeach
                    </div>


                    {{-- <table class="table table-striped text-center mt-5">
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Jenis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Edisi</th>
                            <th>Harga Jual</th>
                            <th>Penulis</th>
                            <th>Buku</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($rows as $key => $row)
                            <tr>
                                <td class="text-center">{{ $rows->firstItem() + $key }}</td>
                                <td class="text-center">{{ $row->nama_buku }}</td>
                                <td class="text-center">{{ $row->jenis_buku }}</td>
                                <td class="text-center">{{ $row->penerbit_buku }}</td>
                                <td class="text-center">
                                    {{ carbon\carbon::parse($row->tahun_terbit_buku)->format('d F Y') }}</td>
                                <td class="text-center">{{ $row->edisi_buku }}</td>
                                <td class="text-center">{{ $row->harga_jual }}</td>
                                <td class="text-center">{{ $row->penulis->name }}</td>
                                <td class="text-center">
                                    <a href="{{ url('buku/show/' . $row->id_buku) }}"
                                        class="btn btn-outline-dark btn-sm">Data Buku</a>
                                    {{-- <a href="{{ route('image.show', $row->id_buku) }}" class="btn btn-outline-info btn-sm">Cover</a>
                                    <a class="btn btn-outline-success btn-sm" target="_blank" href="{{ route('files.show', $row->id_buku ) }}">E-Book</a> --}}
                    {{-- </td>
                                <td> --}}
                    {{-- @if ($row->status == 'Di Setujui' || $row->status == 'Di Tolak')
                                        <p class="d-inline">Status: {{ ucfirst($row->status) }}</p>
                                    @else --}}
                    {{-- <form action="{{ route('posts.approve', $row->id_buku) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success btn-sm ">Setuju</button>
                                        </form>
                                        <form action="{{ route('posts.reject', $row->id_buku) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm d-inline">Tolak</button>
                                        </form> --}}
                    {{-- @endif
                                </td>
                            </tr>
                        @endforeach --}}
                    {{-- </table>  --}}

                @endcan
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
