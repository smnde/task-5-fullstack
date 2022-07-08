<?php

use App\Http\Controllers\Local\CategoriesController;
use App\Http\Controllers\Local\PostsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::resource('categories', CategoriesController::class)->except(["show", "create"]);
Route::resource('articles', PostsController::class);
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/detail/{id}", [HomeController::class, "detail"])->name("detail");