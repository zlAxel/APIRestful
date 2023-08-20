<?php

// ? Importamos el controladores
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\User\UserController;

// ? Importamos la clases a utilizar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas de API para tu aplicación. 
| Estas rutas son cargadas por RouteServiceProvider y todas ellas serán 
| asignadas al grupo de middleware "api". ¡Crea algo grandioso!
|
*/

// ! Creamos la ruta de recurso para los Compradores
Route::resource('buyers', BuyerController::class, ['only' => ['index', 'show']]);

// ! Creamos la ruta de recurso para los Categorías
Route::resource('categories', CategoryController::class, ['except' => ['create', 'edit']]);

// ! Creamos la ruta de recurso para los Productos
Route::resource('products', ProductController::class, ['only' => ['index', 'show']]);

// ! Creamos la ruta de recurso para los Transacciones
Route::resource('transactions', TransactionController::class, ['only' => ['index', 'show']]);

// ! Creamos la ruta de recurso para los Vendedores
Route::resource('sellers', SellerController::class, ['only' => ['index', 'show']]);

// ! Creamos la ruta de recurso para los Usuarios
Route::resource('users', UserController::class, ['except' => ['create', 'edit']]);
