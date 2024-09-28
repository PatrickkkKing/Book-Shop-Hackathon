<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('kode_buku');
            $table->string('nama_buku');
            $table->enum('jenis_buku', ['Novel', 'Biografi','Dongeng','Cerpen','Majalah']);
            $table->string('penerbit_buku');
            $table->date('tahun_terbit_buku');
            $table->integer('edisi_buku');
            $table->text('sinopsis_buku');
            $table->bigInteger('harga_buku');
            $table->bigInteger('harga_jual');
            $table->enum('status', ['Di Proses', 'Di Setujui', 'Di Tolak'])->default('Di Proses');
            $table->text('alasan_ditolak')->nullable();  // Alasan jika buku ditolak
            $table->string('dokumen_buku');
            $table->string('path_buku');
            $table->string('cover_buku');
            $table->integer('jumlah_buku_terjual')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        
    }
};
