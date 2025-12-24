<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopController;

// หน้าแสดงฟอร์ม
Route::get('/', [WorkshopController::class, 'index']);

// รับค่าจากฟอร์ม
Route::post('/submit', [WorkshopController::class, 'store']);
