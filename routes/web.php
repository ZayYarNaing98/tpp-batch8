<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Static Route
Route::get('/blogs', function(){
    return "This is Blog Page!";
});

// Dynamic Route
Route::get('/blogs/{id}', function($id){
    return "This is Blog Details => $id";
});

// Naming Route
Route::get('/dashboard', function(){
    return "Welcome from TPP Dashboard";
})->name('dashboard.tpp');

// Redirect Route
Route::get('/tpp', function(){
    return redirect()->route('dashboard.tpp');
});

// Group Route
Route::prefix('/backend')->group(function(){
    Route::get('/admin', function(){
        return " This is Admin Route";
    });

    Route::get('/users', function(){
        return "This is User Route";
    })->name('admin.users');

    Route::get('/users/{id}', function($id){
        return "This is user show - $id";
    });

    Route::get('/students', function(){
        return redirect()->route('admin.users');
    });
});

// Route::get('/articles', function(){
//     return view('articles.index');
// });

Route::get('/articles', [ArticleController::class, 'index']);

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');

Route::post('/categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');


// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');