<?php

use App\Http\Controllers\listingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models;
use App\Models\Listing;
Route::get('/',[listingController::class,'index']);
Route::get('/listings/create',[listingController::class,'create'])->middleware('auth');
Route::get('/single-list/{listing}',[listingController::class,'show']);

Route::get('/listings/{listing}/edit',[listingController::class,'edit'])->middleware('auth');
Route::put('/listings/{listing}',[listingController::class,'update'])->middleware('auth');
Route::delete('/listings/{listing}',[listingController::class,'destroy'])->middleware('auth');
Route::post('/listings',[listingController::class,'store'])->middleware('auth');


// user manege


Route::get('/register',[UserController::class,'create'])->middleware('guest');
Route::post('/users',[UserController::class,'store']);
Route::post('/logout',[UserController::class,'logout']);
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate',[UserController::class,'authenticate']);
























// Route::get('/hello',function (){
//      return 'hello world ...';
// } );

// Route::get('/etudiant/{id}',function ($id){
//   return response('etudiant num ' .$id);
// })->where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//     return $request->name ." ".$request->age;

// });