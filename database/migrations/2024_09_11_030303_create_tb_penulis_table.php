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
        Schema::create('tb_penulis', function (Blueprint $table) {
            $table->increments('id_penulis');
            $table->date('tgl_lahir_penulis');
            $table->string('no_hp_penulis');
            $table->string('alamat_penulis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_penulis');
    }
};
