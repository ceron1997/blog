<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;


Route::get('/', [PostController::class,'index'] )->name('post.index');
Route::get('posts/{post}', [PostController::class,'show'] )->name('posts.show');
Route::get('category/{category}', [PostController::class,'category'] )->name('posts.category');
Route::get('tags/{tag}', [PostController::class,'tag'] )->name('posts.tag');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');


//rutas para administracion ************************************************************************
Route::get('admin/', [HomeController::class,'index'] )->name('admin.index');
Route::resource('categories',CategoryController::class)->names('admin.categories');
// php artisan route:list --name=admin.categories
