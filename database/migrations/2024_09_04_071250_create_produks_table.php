<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('supplayer_id'); 
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->string('file_path');
            $table->timestamps();


            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('restrict');
            $table->foreign('supplayer_id')->references('id')->on('supplayers')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
