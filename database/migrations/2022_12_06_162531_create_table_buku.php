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
            $table->string('kategori', 25);
            $table->string('rak', 25);
            $table->string('pengarang', 25);
            $table->string('penerbit', 25);
            $table->string('judul_buku', 25);
            $table->integer('tahun_buku')->unsigned();
            $table->integer('jumlah_buku')->unsigned();
            $table->integer('isbn')->unsigned();
            $table->varchar('sampul');
            $table->varchar('lampiran_buku');
            $table->text('keterangan_lain');
            $table->string('dibuat_oleh', 25);
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
