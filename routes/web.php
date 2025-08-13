<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');