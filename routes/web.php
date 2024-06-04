<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, "welcome"])->name("/");
Route::get("/login", [UserController::class, "index"])->name("login.view");
Route::get("/register", [UserController::class, "create"])->name("register.view");

Route::post("/register/create", [UserController::class, "store"])->name("register.user");
Route::post("/app", [AuthController::class, "login"])->name("app");

Route::middleware("auth")->group(function () {

    Route::get("/create", [PostController::class,"create"] )->name("posts.create");
    Route::get("/posts",[PostController::class,"index"])->name("posts.index");
    Route::post("/create/post", [PostController::class, "store"])->name("posts.store");
    Route::post("/posts/{post}/update", [PostController::class, "update"])->name("posts.update");
    Route::delete("/delete/post", [PostController::class, "destroy"])->name("posts.delete");

    Route::post("/post/comment", [CommentPostController::class, "store"])->name("comment.store");
    Route::delete("/delete/comment", [CommentPostController::class, "destroy"])->name("comment.delete");

    Route::get("/app", [AuthController::class, "login"]);
    Route::get("/home", [AppController::class, "index"])->name("app.home");

    Route::get("/profile",[UserController::class, "edit"])->name("edit.user");
    
    Route::get("/logout", [AuthController::class, "logout"])->name("logout.user");
    Route::get("/user/{id}",[UserController::class, "show"])->name("user.show");

    Route::get("/friends", function(){
        $title="Amigos";
        return view("app.friends",["title"=>$title]);
    })->name("app.friends");

    Route::get("/about", function () {
        $title = "Sobre";
        return view("app.about", ["title" => $title]);
    })->name("app.about");   
});
