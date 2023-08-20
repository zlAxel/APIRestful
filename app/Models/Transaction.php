<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    /**
     * ? Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'quantity',
        'buyer_id',
        'product_id',
    ];

    /**
     * ? Relación con el modelo Buyer
     */

    public function buyer() {
        return $this->belongsTo(Buyer::class);
    }

    /**
     * ? Relación con el modelo Product
     */

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
