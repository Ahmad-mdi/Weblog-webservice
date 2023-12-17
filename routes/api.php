<?php
use App\Http\Controllers\Post\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/post',[PostController::class,'index']);
Route::post('/post',[PostController::class,'store']);
Route::get('/post/{post}',[PostController::class,'show']);
Route::put('/post/{post}',[PostController::class,'update']);
Route::delete('/post/{post}',[PostController::class,'destroy']);
