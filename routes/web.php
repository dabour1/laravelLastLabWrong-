<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::resource("posts",Controllers\PostController::class);
Route::resource("users",Controllers\UserController::class);
Route::get("/user/{user}/posts",[Controllers\UserController::class,"getPosts"])->name("userposts.show")
    ->middleware("auth");

Route::get("testAuth",function (){
    return view("posts.authorize");
});


