<?php

namespace App\Models;

use App\Models\Transaction;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buyer extends User {
    use HasFactory;

    /** 
     * ? Relación con el modelo Transaction
     */

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

}
