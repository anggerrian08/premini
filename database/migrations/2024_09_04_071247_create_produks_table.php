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
            $table->unsignedBigInteger('kategori_id'); // Foreign key to kategoris
            $table->unsignedBigInteger('supplayer_id'); // Foreign key to supplayers
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('file_path')->nullable(); // Optional file path for uploads
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('restrict');
            $table->foreign('supplayer_id')->references('id')->on('supplayers')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
