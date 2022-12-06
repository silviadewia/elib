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
            $table->id(); //ID ws ono gawan, gaush di tambah
            $table->string('kategori', 25);
            $table->string('rak', 25);
            $table->string('pengarang', 25);

            //teruskan
            $table->timestamps(); //timestamp iki default, isine created_at dan updated_at dadi kue gausah gawe created_at karo updated_at
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
