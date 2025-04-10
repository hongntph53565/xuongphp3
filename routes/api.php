<?php

//Khai báo api
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Models\Product;

//http://127.0.0.1:8000/api/test
Route::get('/test', function () {
    return response()->json([
        'message' => "Call API thành công"
    ], 200);
});


Route::prefix('product')->group(function () {
    //http://127.0.0.1:8000/api/product
    Route::get('/', [ProductController::class, "index"]);
    Route::get('/{id}', [ProductController::class, "show"]);
    Route::post('/add', [ProductController::class, "store"]);
    Route::put('update/{id}', [ProductController::class, "update"]);
    Route::delete('delete/{id}', [ProductController::class, "delete"]);
});
