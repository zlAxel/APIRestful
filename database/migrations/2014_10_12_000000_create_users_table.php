<?php

use App\Models\User;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                                                   // * | Identificador del usuario
            $table->string('name');                                         // * | Nombre del usuario
            $table->string('email')->unique();                              // * | Correo electrónico del usuario
            $table->timestamp('email_verified_at')->nullable();             // * | Fecha de verificación del correo electrónico
            $table->string('password');                                     // * | Contraseña del usuario
            $table->rememberToken();                                        // * | Token de autenticación    
            $table->string('verified')->default(User::USER_NOT_VERIFIED);   // * | Estado del usuario (verificado, no verificado)
            $table->string('verification_token')->nullable();               // * | Token de verificación del usuario
            $table->string('admin')->default(User::REGULAR_USER);           // * | Tipo de usuario (administrador, usuario regular)    
            $table->timestamps();                                           // * | Fecha de creación y actualización del usuario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
