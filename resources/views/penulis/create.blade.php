<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{url('buku')}}" method="post">
                        @csrf
                        <label for="">Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control ">
                        <label for="">Nama Buku</label>
                        <input type="text" name="nama_buku" class="form-control ">
                        <label for="">Jenis Buku</label>
                        <select name="jenis_buku" id="" class="form-control">
                            <option value="">-- Option --</option>
                            <option value="Novel">Novel</option>
                            <option value="Biografi">Biografi</option>
                            <option value="Dongeng">Dongeng</option>
                            <option value="Cerpen">Cerpen</option>
                            <option value="Majalah">Majalah</option>
                        </select>
                        <label for="">Penerbit Buku</label>
                        <input type="text" name="penerbit_buku" class="form-control ">
                        <label for="">Tahun Terbit Buku</label>
                        <input type="date" name="tahun_terbit_buku" class="form-control ">
                        <label for="">Penulis Buku</label>
                        <input type="text" name="penulis_buku" class="form-control ">
                        <label for="">Edisi Buku</label>
                        <input type="number" name="edisi_buku" class="form-control ">
                        <label for="">Harga Buku</label>
                        <input type="number" name="harga_buku" class="form-control ">

                        <button class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
