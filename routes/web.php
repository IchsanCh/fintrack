<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test-email', function () {
//     \Mail::raw('Test email dari Laravel', function ($message) {
//         $message->to('ichsanmuhammed01@gmail.com')
//                 ->subject('Test Email');
//     });

//     return 'Email sent!';
// });
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/verify-email', [RegisterController::class, 'notice'])->name('verification.notice');
    Route::post('/verify-email', [RegisterController::class, 'verify'])->name('verification.verify');
    Route::post('/verify-email/resend', [RegisterController::class, 'resend'])->name('verification.resend');
});
