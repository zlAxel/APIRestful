<?php

use App\Models\Product;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                                       // * | Identificador del producto
            $table->string('name');                                             // * | Nombre del producto
            $table->text('description');                                        // * | Descripción del producto
            $table->integer('quantity')->unsigned();                            // * | Cantidad del producto (Entero positivo)
            $table->string('status')->default(Product::UNAVAILABLE_PRODUCT);    // * | Estado del producto (disponible, no disponible)
            $table->string('image');                                            // * | Imagen del producto
            $table->foreignId('seller_id')
                  ->constrained('users', 'user_id')->onDelete('cascade');       // * | Identificador del vendedor (Relacionado con la tabla users)
            $table->timestamps();                                               // * | Fecha de creación y actualización del producto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
