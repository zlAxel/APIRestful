<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->unsigned();                            // * | Cantidad del producto (Entero positivo)
            $table->foreignId('buyer_id')
                  ->constrained('users', 'user_id')->onDelete('cascade');       // * | Identificador del comprador (Relacionado con la tabla users)
            $table->foreignId('product_id')
                  ->constrained()->onDelete('cascade');                         // * | Identificador del producto (Relacionado con la tabla products)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('transactions');
    }
};
