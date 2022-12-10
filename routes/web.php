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



Route::get('/', [HomeController::class, "index"]);
Route::get('/home', [HomeController::class, "redirect"])->middleware('auth','verified');

Route::get('/users', [AdminController::class, "users"]);
Route::get('/foods', [AdminController::class, "foods"]);
Route::post('/foodmenu', [AdminController::class,"upload"]);

Route::get('/foodchefs', [AdminController::class, "foodchefs"]);
Route::get('/viewreservation', [AdminController::class, "viewreservation"]);


Route::get('/approved/{id}', [AdminController::class,'approved']);

Route::get('/remove/{id}', [AdminController::class,'remove']);

Route::get('/delete/{id}', [AdminController::class,'delete']);

Route::get('/redirects', [HomeController::class, "redirects"]);

Route::get('/deletefood/{id}', [AdminController::class,'deletefood']);

Route::post('/reservation', [AdminController::class,"reservation"]);

Route::get('/approvreserve/{id}', [AdminController::class,'approvreserve']);

Route::get('/rejectreserve/{id}', [AdminController::class,'rejectreserve']);

Route::get('/reservstatus/{id}', [Admincontroller::class, 'reservestatus']);

Route::get('/chefs', [AdminController::class, "chefs"]);

Route::post('/addfoodchefs', [AdminController::class, "addfoodchefs"]);

Route::get('/deletechefs/{id}', [AdminController::class, "deletechefs"]);

Route::post('/addcart/{id}', [HomeController::class, "addcart"]);

Route::get('/showcart/{name}', [HomeController::class, "showcart"]);

Route::get('/deletecart/{id}', [HomeController::class, "deletecart"]);

Route::get('google-chart', [GoogleController::class, 'googleLineChart']);

Route::post('/orderconfirm', [HomeController::class, "orderconfirm"]);

Route::get('/vieworder', [AdminController::class, "vieworder"]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
