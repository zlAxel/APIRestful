<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // ? Desactivamos las llaves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // ? Truncamos las tablas usando los Modelos
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate(); // * | Tabla pivote

        // ? Creamos variables para almacenar la cantidad de registros que queremos crear
        $usersQuantity          = 200;
        $categoriesQuantity     = 30;
        $productsQuantity       = 1000;
        $transactionsQuantity   = 1000;

        // ? Ejecutamos los factories
        User::factory( $usersQuantity )->create();
        Category::factory( $categoriesQuantity )->create();
        Product::factory( $productsQuantity )->create()->each(
            function ( $product ) {
                // * Obtenemos las categorías aleatorias
                $categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
                // * Sincronizamos las categorías con el producto
                $product->categories()->attach( $categories ); 
            }
        );
        Transaction::factory( $transactionsQuantity )->create();
    }
}
