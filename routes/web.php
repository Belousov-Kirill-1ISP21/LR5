<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/update-status', [AdminController::class, 'updateStatus'])->name('admin.update-status');

Route::get('/debug-register', function(Request $request) {
    
    $testData = [
        'login' => 'test_' . time(),
        'password' => '12345',
        'full_name' => 'Test User',
        'phone' => '1234567890',
        'email' => 'test_' . time() . '@test.ru' 
    ];
    
    try {
        $user = \App\Models\User::create($testData);
        return "ПОЛЬЗОВАТЕЛЬ СОЗДАН! ID: " . $user->id;
    } catch (\Exception $e) {
        return "ОШИБКА: " . $e->getMessage();
    }
});