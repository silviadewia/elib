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
        Schema::create('table_denda', function (Blueprint $table) {
            $table->id();
            $table->decimal('harga',$precision = 10, $scale = 2 );
            $table->enum('status', ['aktif','tidak']);
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
        Schema::dropIfExists('table_denda');
    }
};
