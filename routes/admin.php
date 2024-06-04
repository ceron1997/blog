<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name("admin.index");
Route::resource('categories',CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags',TagController::class)->except('show')->names('admin.tags');
Route::resource('posts',PostController::class)->except('show')->names('admin.posts'); 
Route::resource('users',UserController::class)->only(['index', 'edit', 'update'])->names('admin.users'); 