<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * ? Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    /**
     * ? Los atributos que deben ocultarse para las matrices.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * ? Los atributos que deben convertirse a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * ? Creamos función para saber si un usuario es verificado
     *
     * @return void
     */

    const VERIFIED_USER   = '1';
    const UNVERIFIED_USER = '0';

    public function isVerified() {
        return $this->verified == User::VERIFIED_USER;
    }

    /**
     * ? Creamos función para saber si un usuario es administrador
     *
     * @return void
     */

    const ADMIN_USER   = 'true';
    const REGULAR_USER = 'false';

    public function isAdmin() {
        return $this->admin == User::ADMIN_USER;
    }

    /**
     * ? Creamos función estatica para generar el token de verificación
     *
     * @return void
     */

    public static function generateVerificationToken() { 
        return str_random(40);
    }
}
