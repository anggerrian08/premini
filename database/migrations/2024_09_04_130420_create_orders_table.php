<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('karyawan_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('produk_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        });

        // Tabel pivot untuk order_items
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('produk_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->integer('quantity'); // Menyimpan jumlah produk
            $table->decimal('price', 8, 2); // Menyimpan harga produk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
};
