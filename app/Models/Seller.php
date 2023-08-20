<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends User {
    use HasFactory;

    /**
     * ? Relación con el modelo Product
     */

    public function products() {
        return $this->hasMany(Product::class);
    }   
}
