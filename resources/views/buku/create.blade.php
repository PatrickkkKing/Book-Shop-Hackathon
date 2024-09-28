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
                    <form action="{{url('buku')}}" method="post" enctype="multipart/form-data">
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
                        <label for="">Edisi Buku</label>
                        <input type="number" name="edisi_buku" class="form-control ">
                        <label for="">Harga Buku</label>
                        <input type="number" name="harga_buku" class="form-control " id="text1">
                        <input type="hidden" id="total" name="harga_jual" class="form-control">
                        <p name="perhitungan_nilai" style="font-weight: bold;" class="h5 text-dark">Harga Jual : <span id="totalDisplay">0</span></p>
                        <label for="floatingTextarea2">Sinopsis Buku</label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="sinopsis_buku"></textarea>
                            <label for="floatingTextarea2" class="fst-italic">Isi Disini......</label>
                        </div>
                        
                        <label for="">Buku</label>
                        <input type="file" name="dokumen_buku" class="form-control ">
                        <label for="">Cover Buku</label>
                        <input type="file" name="cover_buku" class="form-control ">
                        <button class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        // Fungsi untuk menghitung total
        function calculateTotal() {
            // Ambil nilai dari setiap select option
            var text1 = parseInt(document.getElementById('text1').value);
        
            // Jumlahkan nilai
            var total = text1 + 25000;
            
            // Tampilkan hasil di span "total"
            document.getElementById('totalDisplay').textContent = total;

            // Simpan hasil di input hidden "total" untuk dikirim ke server
            document.getElementById('total').value = total;
        }

        // Jalankan fungsi setiap kali ada perubahan di select option
        document.getElementById('text1').addEventListener('change', calculateTotal);
    </script>
</x-app-layout>


