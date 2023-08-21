<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('category_product', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');       // * | Identificador de la categoría (Relacionado con la tabla categories)
            $table->foreignId('product_id')->constrained()->onDelete('cascade');        // * | Identificador del producto (Relacionado con la tabla products)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('category_product');
    }
};
