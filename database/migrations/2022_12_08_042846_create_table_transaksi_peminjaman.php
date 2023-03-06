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
        Schema::create('table_pinjam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedInteger('lama');
            $table->json('id_buku')->comment('json data, untuk simpan banyak buku');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->unsignedBigInteger('status')->default(0)->comment('0: belum dikembalikan, 1: sudah dikembalikan, 2: telat dikembalikan');
            $table->decimal('denda');
            $table->string('dibuat_oleh', 25);
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('users');
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pinjam');
    }
};
