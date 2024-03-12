<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'verified']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/payment/{plan?}', [PaymentController::class, 'charge'])->name('goToPayment');
Route::post('payment/process-payment/{plan?}', [PaymentController::class, 'processPayment'])->name('processPayment');

Route::get('/upload-video', function () { return view('upload-video'); })->name('upload-video');
Route::post('/upload-video',[VideoController::class, 'upload'])->name('video.upload');
Route::get('/thank-you',function () { return view('thanks'); })->name('thank-you');
});