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
        Schema::create('table_pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perpustakaan', 25);
            $table->string('email', 25);
            $table->integer('telepon')->unsigned();
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
        Schema::dropIfExists('table_pengaturan');
    }
};
