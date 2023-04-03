<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", function () {
    return view("index");
})->name("index");

Route::get("/products", function () {
    return view("products");
})->name("products");

Route::get("/products/{id}", function () {
    return view("details");
    // dd("hello world");
})->name("details");

Route::get("/addproduct", function () {
    return view("addproduct");
    // dd("hello world");
})->name("addproduct");

Route::get("/editproduct/{id}", function () {
    return view("editproduct");
    // dd("hello world");
})->name("editproduct");

Route::get("/categories", function () {
    return view("categories");
})->name("categories");


Route::get("/editcategories/{id}", function () {
    return view("editcategories");
    // dd("hello world");
})->name("editcategories");

Route::get("/addcategories", function () {
    return view("addcategories");
    // dd("hello world");
})->name("addcategories");
