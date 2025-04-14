<?php

//Khai báo api
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthenController;
use App\Http\Controllers\Api\UserController;

// Route công khai
Route::post('login', [AuthenController::class, "login"]);

// Các route cần đăng nhập (được bảo vệ bởi Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });

    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('{id}', 'show');
        Route::put('{id}', 'update');
        Route::delete('{id}', 'delete');
    });
});


// Route::prefix('product')->group(function () {
//     //http://127.0.0.1:8000/api/product
//     Route::get('/', [ProductController::class, 'index']);
//     Route::get('/{id}', [ProductController::class, 'show']);
//     Route::post('/add', [ProductController::class, 'store']);
//     Route::put('update/{id}', [ProductController::class, 'update']);
//     Route::delete('delete/{id}', [ProductController::class, 'delete']);
// });



// Route::apiResource('categories', CategoryController::class);
// Route::apiResource('products', ProductController::class);
// Route::apiResource('users', UserController::class);
