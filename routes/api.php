<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/post',[PostController::class,'index']);
Route::post('/post',[PostController::class,'store']);
Route::get('/post/{post}',[PostController::class,'show']);
Route::match(['post'],'/post/{post}',[PostController::class,'update']);
Route::delete('/post/{post}',[PostController::class,'destroy']);
//Route::resource('post',PostController::class);
Route::get('/user',[UserController::class,'index']);

Route::post('/signup',[AuthController::class,'signup']);
