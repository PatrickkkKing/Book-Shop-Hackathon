<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{url('buku/' .$row->id_buku )}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        @csrf

                        <label for="">Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" value="{{$row->kode_buku}}">
                        <label for="">Nama Buku</label>
                        <input type="text" name="nama_buku" class="form-control " value="{{$row->nama_buku}}">
                        <label for="">Jenis Buku</label>
                        <select name="jenis_buku" id="" class="form-control">
                            <option value="{{$row->jenis_buku}}">{{$row->jenis_buku}}</option>
                            <option value="">-- Option --</option>
                            <option value="Novel">Novel</option>
                            <option value="Biografi">Biografi</option>
                            <option value="Dongeng">Dongeng</option>
                            <option value="Cerpen">Cerpen</option>
                            <option value="Majalah">Majalah</option>
                        </select>
                        <label for="">Penerbit Buku</label>
                        <input type="text" name="penerbit_buku" class="form-control " value="{{$row->penerbit_buku}}">
                        <label for="">Tahun Terbit Buku</label>
                        <input type="date" name="tahun_terbit_buku" class="form-control " value="{{$row->tahun_terbit_buku}}">
                        <label for="">Penulis Buku</label>
                        <input type="text" name="penulis_buku" class="form-control " value="{{$row->penulis_buku}}">
                        <label for="">Edisi Buku</label>
                        <input type="number" name="edisi_buku" class="form-control " value="{{$row->edisi_buku}}">
                        <label for="">Harga Buku</label>
                        <input type="number" name="harga_buku" class="form-control " value="{{$row->harga_buku}}">
                        <label for="floatingTextarea2">Sinopsis Buku</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="sinopsis_buku">{{$row->sinopsis_buku}}</textarea>
                            <label for="floatingTextarea2" class="fst-italic">Isi Disini......</label>
                        </div>
                        <label for="">Buku</label>
                        <input type="file" name="dokumen_buku" class="form-control ">
                        <label for="">Cover Buku</label>
                        <input type="file" name="cover_buku" class="form-control ">
                        <button class="btn btn-warning mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
