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
        Schema::create('topups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->nulllable(); // foreign key untuk produk merupakan relasi ke tabel products
            $table->string('title'); // judul topup
            $table->integer('jumlah'); // jumlah topup
            $table->integer('price'); // harga topup
            $table->integer('position')->default(0); // posisi untuk pengurutan topup
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topups');
    }
};
