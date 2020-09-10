<?php

use Illuminate\Support\Facades\Route;
use Masry\Lighthouse\Http\Controllers\PostsController;


Route::group(routeConfiguration(), function () {
    Route::get("/posts", [PostsController::class, "index"])->name("posts.index");
    Route::get("/sendmail", [PostsController::class, "sendMail"])->name("posts.mail");
    Route::get("/mailView", [PostsController::class, "mailView"])->name("posts.emails.welcome");
});


function routeConfiguration()
{
    return [
        "prefix" => config("lighthouse.prefix"),
        "middleware" => config("lighthouse.middleware")
    ];
}
