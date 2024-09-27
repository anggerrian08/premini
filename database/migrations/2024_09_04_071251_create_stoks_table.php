<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoksTable extends Migration // Ganti nama kelas
{
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
