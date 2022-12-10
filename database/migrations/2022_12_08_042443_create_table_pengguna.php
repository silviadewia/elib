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
            $table->string('nama_lengkap', 25);
            $table->string('jurusan', 25);
            $table->string('tempat_lahir', 25);
            $table->dateTime('tanggal_lahir');
            $table->string('username', 25);
            $table->string('password', 25);
            $table->string('level', 25);
            $table->enum('jenis_Kelamin', ['laki-laki','perempuan']);
            $table->integer('telepon')->unsigned();
            $table->string('email', 25);
            $table->text('foto');
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
