<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// url = api/v1/ . ex api/v1/articles
Route::group(["prefix" => "v1"], function() {
	Route::post("login", [AuthController::class, "login"]);
	Route::post("register", [AuthController::class, "register"]);
	Route::group(["middleware" => "auth:api"], function() {
		// show categories
		Route::apiResource("categories", CategoriesController::class)->except(["show", "create", "edit"]);
		// Show all posts or articles, can use for homepage
		// url = api/v1/articles
		Route::get("articles", [PostsController::class, "allPost"]);
		// Show posts by user_id or author, use it for CRUD POST
		// url = api/v1/posts
		Route::apiResource("posts", PostsController::class)->except(["create", "edit"]);
		// logout
		Route::post("logout", [AuthController::class, "logout"]);
	});
});