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
        Schema::create('table_transaksi_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->integer('no_pinjaman')->unsigned();
            $table->dateTime('tgl_pinjaman');
            $table->integer('id_anggota')->unsigned();
            $table->integer('lama')->unsigned();
            $table->integer('id_buku')->unsigned();
            $table->dateTime('tanggal_kembali');
            $table->decimal('denda',$precision = 10, $scale = 3);
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
        Schema::dropIfExists('table_transaksi_peminjaman');
    }
};
