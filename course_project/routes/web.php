<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use Illuminate\Tests\Integration\Routing\Middleware;

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
//All listings
Route::get('/', [ListingController::class,'index']);

//Create Listing Form
Route::get('/listings/create', [ListingController::class,'create'])->middleware('auth');

//Store Listing Data
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//Update
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete
Route::delete('/listings/{listing}', [ListingController::class,'delete'])->middleware('auth');

Route::get('/listings/menage', [ListingController::class,'menage'])->middleware('auth');



//Single Listing
Route::get('/listings/{listing}', [ListingController::class,'show']);

Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/users', [UserController::class,'store']);

Route::post('/logout', [UserController::class,'logout'])->middleware('auth');

Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');

Route::post('users/authenticate', [UserController::class,'authenticate']);
Route::get('/listings/menage', [ListingController::class,'menage']);