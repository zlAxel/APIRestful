<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    /**
     * ? Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'name',
        'description',
        'quantity',
        'status',
        'image',
        'seller_id',
    ];

    /**
     * ? Creamos función para saber si un producto está disponible
     *
     * @return void
     */
    
    const AVAILABLE_PRODUCT   = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';

    public function isAvailable() {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    /**
     * ? Relación con el modelo Category
     */

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    /**
     * ? Relación con el modelo Seller
     */

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    /**
     * ? Relación con el modelo Transaction
     */

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
