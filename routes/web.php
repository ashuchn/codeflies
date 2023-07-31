<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::prefix('login')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/post', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::prefix('register')->group(function () {
    Route::get('/', [AuthController::class, 'register'])->name('register');
    Route::post('/post', [AuthController::class, 'registerPost'])->name('register.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('profile',[UserController::class, 'profile'])->name('profile');
    Route::get('profile/{id}',[UserController::class, 'profileUpdate'])->name('profile.update');
    Route::post('profile/{id}/save',[UserController::class, 'profileSave'])->name('profile.save');
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});

Route::get('test1', function() {
    $str = "Lorem ipsum dolor sit amet 'consectetur adipiscing' elit, litora 'enim cum tellus' nisl 'ridiculus senectus' natoque, 'eros' vestibulum mauris aenean tempus lobortis. Accumsan 'volutpat semper auctor' tincidunt";

    // Initialize variables
    $wordCount = 0;
    $insideQuote = false;
    
    // Iterate through each character in the string
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
    
        if ($char == ' ' && !$insideQuote) {
            $wordCount++;
        } elseif ($char == "'") {
            // Toggle the insideQuote flag
            $insideQuote = !$insideQuote;
        }
    }
    
    // Check if the last word was inside a quoted area and increment the word count if necessary
    if ($insideQuote) {
        $wordCount++;
    }
    
    // Add one to the word count to account for the last word without space after it
    $wordCount++;
    
    return "Word count: " . $wordCount;
});

