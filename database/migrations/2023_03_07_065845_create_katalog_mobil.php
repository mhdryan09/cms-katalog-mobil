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
        Schema::create('katalog_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('brand',50);
            $table->string('type',50);
            $table->integer('tahun');
            $table->integer('harga');
            $table->text('spesifikasi');
            $table->string('image');
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
        Schema::dropIfExists('katalog_mobil');
    }
};
