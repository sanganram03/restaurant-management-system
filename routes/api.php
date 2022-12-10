<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;

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
$router->get('/',function(){
    return response()->json('Welcome TO Laravel API');
});


Route::group([

], function(){
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});


Route::get('/', [HomeController::class, "index"]);
Route::get('/home', [HomeController::class, "redirect"])->middleware('auth','verified');

Route::get('/users', [AdminController::class, "users"]);
Route::get('/foods', [AdminController::class, "foods"]);
Route::post('/foodmenu', [AdminController::class,"upload"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
