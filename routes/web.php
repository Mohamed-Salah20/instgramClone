<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Models\Post;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();


// Route::redirect('/home', '/there');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{user}',[ProfilesController::class,'index'])->name('profile.show');
Route::get('/profile/{user}/edit',[ProfilesController::class,'edit'])->name('profile.edit');
Route::patch('/profile/{user}',[ProfilesController::class,'update'])->name('profile.update');


Route::get('/',[PostsController::class,'index']);
Route::get('/p/create',[PostsController::class,'create']);
Route::post('/p',[PostsController::class,'store']);
Route::get('/p/{post}',[PostsController::class,'show']);

Route::post('/follow/{user}', [FollowsController::class,'store']);
