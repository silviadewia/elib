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
        Schema::create('table_pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 25);
            $table->string('nama_lengkap');
            $table->string('jurusan', 25);
            $table->string('tempat_lahir');
            $table->dateTime('tanggal_lahir');
            $table->string('username');
            $table->string('password');
            $table->string('level', 25);
            $table->enum('jenis_Kelamin', ['laki-laki', 'perempuan']);
            $table->bigInteger('telepon')->unsigned();
            $table->string('email');
            $table->string('foto');
            $table->string('alamat');
            $table->string('dibuat_oleh', 25);
            $table->timestamps();
        });
    }

    /**s
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pengguna');
    }
};