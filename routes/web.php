<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return response()->json("hello world");
});

Route::prefix('admin')->group(function () {
    Route::get('/products', function () {
        return response()->json("Products list");
    });

    Route::post('/products', function () {
        return response()->json("Product created");
    });

    Route::put('/products/{id}', function ($id) {
        return response()->json("Product with ID $id updated");
    });

    Route::delete('/products/{id}', function ($id) {
        return response()->json("Product with ID $id deleted");
    });
});
