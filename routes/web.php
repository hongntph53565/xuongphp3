<?php

use Illuminate\Support\Facades\Route;
// Admin Controllers
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CategoryController;

// User Controllers
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PaymentController;

use App\Http\Controllers\AuthController;


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegister'])->name('postRegister');


Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('show/{idProduct}', [HomeController::class, 'show'])->name('show');
Route::get('cart', [CartController::class, 'cart'])->name('cart');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

    //products
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

        Route::get('list-product', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::get('add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])->name('addPostProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::get('detail-product/{idProduct}', [ProductController::class, 'detailProduct'])->name('detailProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-product/{idProduct}', [ProductController::class, 'updatePatchProduct'])->name('updatePatchProduct');
    });

    //categories
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {

        Route::get('list-category', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');
        Route::delete('delete-category', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('update-category/{idCate}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category/{idCate}', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });

    //users
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

        Route::get('list-user', [UserController::class, 'listUser'])->name('listUser');
        Route::get('add-user', [UserController::class, 'addUser'])->name('addUser');
        Route::post('add-user', [UserController::class, 'addPostUser'])->name('addPostUser');
        Route::delete('delete-user', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('update-user/{idUser}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::patch('update-user/{idUser}', [UserController::class, 'updatePatchUser'])->name('updatePatchUser');
    });

    //orders
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {

        Route::get('list-order', [OrderController::class, 'listOrder'])->name('listOrder');
        Route::get('add-order', [OrderController::class, 'addOrder'])->name('addOrder');
        Route::post('add-order', [OrderController::class, 'addPostOrder'])->name('addPostOrder');
        Route::get('delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
        Route::get('update-order/{id}', [OrderController::class, 'updateOrder'])->name('updateOrder');
        Route::post('update-order/{id}', [OrderController::class, 'updatePostOrder'])->name('updatePostOrder');
    });

    //comments
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {

        Route::get('list-comment', [CommentController::class, 'listComment'])->name('listComment');
        Route::get('add-comment', [CommentController::class, 'addComment'])->name('addComment');
        Route::post('add-comment', [CommentController::class, 'addPostComment'])->name('addPostComment');
        Route::delete('delete-comment', [CommentController::class, 'deleteComment'])->name('deleteComment');
    });
});
