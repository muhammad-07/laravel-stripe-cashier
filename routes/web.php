<?php

use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\VideoController;
use App\Models\Payment;
use App\Models\Singing;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function() { return view('welcome');})->name('home');
Route::group(['middleware' => ['auth', 'verified']], function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::get('/payment/{plan?}', [PaymentController::class, 'charge'])->name('goToPayment');
    Route::post('payment/process-payment/{plan?}', [PaymentController::class, 'processPayment'])->name('processPayment');

    Route::middleware('isPaid')->group(function () {
        Route::resource('user-details', UserDetailController::class);
        Route::get('/upload-video/{plan?}', function () {
            $user_id = Auth::id();
            $plan = Payment::where('user_id', $user_id)->where('stripe_payment_id', '!=', '')->first()->plan_id ?? '';
            $hasUserDetails = UserDetail::where('user_id', $user_id)->exists();
            $hasSinging = Singing::where('user_id', $user_id)->where('plan_id', $plan)->exists();
            if ($hasUserDetails && $hasSinging)
                return view('upload-video');
            else if($hasUserDetails)
                return view('singing');

                return view('details');

        })->name('upload-video');
        Route::post('/upload-video', [VideoController::class, 'upload'])->name('video.upload');
        Route::get('/thank-you', function () {
            return view('thanks');
        })->name('thank-you');
    });
});


// ========== Admin ================
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/videos', [AdminVideoController::class, 'index'])->name('admin.videos.index');
    Route::put('/admin/videos/{video}/status', [AdminVideoController::class, 'updateStatus'])->name('admin.videos.updateStatus');
    Route::get('/admin/videos/{video}', [AdminVideoController::class, 'show'])->name('admin.videos.show');
});
