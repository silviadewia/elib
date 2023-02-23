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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 25);
            $table->string('name')->comment("inisial");
            $table->string('nama_lengkap');
            $table->string('jurusan', 25);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->unsignedInteger('level')->default(1);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->bigInteger('telepon')->unsigned();
            $table->string('foto');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
