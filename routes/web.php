<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PostController::class,'index'])->name('posts.index');

Route::get('posts/{post}',[PostController::class,"show"])->name('posts.show');

Route::get('category/{category}',[PostController::class,"category"])->name('posts.category');

Route::get("tag/{tag}",[PostController::class,"tag"])->name("posts.tag");

// este es el encargado de la redireccion despues de log in exitoso
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[PostController::class,'index'])->name('dashboard');
});
