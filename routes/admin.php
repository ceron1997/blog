<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagController;


Route::get('',[HomeController::class,'index'])->name("admin.index");
Route::resource('categories',CategoryController::class)->names('admin.categories');
Route::resource('tags',TagController::class)->names('admin.tags');