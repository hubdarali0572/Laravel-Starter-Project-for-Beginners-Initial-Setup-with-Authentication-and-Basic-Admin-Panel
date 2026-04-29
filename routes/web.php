<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentContactController;
use App\Http\Controllers\StudentAdmissionController;

// frontend routes

Route::get('/admin', function () {
    return redirect()->route('login');
});

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::post('/contact-submit', [FrontendController::class, 'send'])->name('contact.send');
Route::post('/apply', [FrontendController::class, 'sendRegistration'])->name('student.register');

Route::resource('studentAdmission', StudentAdmissionController::class);
Route::resource('studentContact', StudentContactController::class);

// Admin Dashboard Routes

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserController::class);


        //  Role Route
    Route::resource('roles', RoleController::class);
    Route::get('/assign-role', [RoleController::class, 'showAssignRole'])->name('show.assign.role.form');
    Route::post('/assign-role', [RoleController::class, 'assignRole'])->name('assign.role');


    // Activity Log Route
    
   Route::get('activity-logs', [DashboardController::class, 'activitylog'])->name('activitylog.activitylog');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
