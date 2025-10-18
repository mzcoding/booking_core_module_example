<?php

use App\Http\Controllers\GuideController;
use App\Http\Controllers\HunterBookController;
use Illuminate\Support\Facades\Route;

Route::get('guides', GuideController::class);
Route::post('bookings', HunterBookController::class);
