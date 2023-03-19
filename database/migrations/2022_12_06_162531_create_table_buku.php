<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_buku', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('rak');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->string('judul_buku');
            $table->integer('tahun_buku')->unsigned();
            $table->integer('jumlah_buku')->unsigned();
            $table->integer('isbn')->unsigned();
            $table->string('sampul');
            $table->string('lampiran_buku');
            $table->text('keterangan_lain');
            $table->string('dibuat_oleh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_buku');
    }
};