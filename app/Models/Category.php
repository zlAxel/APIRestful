<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    /**
     * ? Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * ? Relación con el modelo Product
     */

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
