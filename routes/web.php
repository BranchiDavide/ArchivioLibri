<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/", [BookController::class, "index"])->name("home");

Route::resource("authors", \App\Http\Controllers\AuthorController::class);
Route::resource("categories", \App\Http\Controllers\CategoryController::class);
Route::resource("books", BookController::class);
