<?php

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

// Authentication Routes
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Public Booking Routes (No Authentication Required)
Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/step-1', function () {
        return view('public.booking-step1');
    })->name('step1');

    Route::get('/step-2', function () {
        return view('public.booking-step2');
    })->name('step2');

    Route::get('/step-3', function () {
        return view('public.booking-step3');
    })->name('step3');

    Route::get('/step-4', function () {
        return view('public.booking-step4');
    })->name('step4');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/appointments', function () {
        return view('admin.appointments');
    })->name('appointments');

    Route::get('/appointments/add', function () {
        return view('admin.add-appointment');
    })->name('add-appointment');

    Route::get('/doctors', function () {
        return view('admin.doctors');
    })->name('doctors');

    Route::get('/doctors/add', function () {
        return view('admin.doctor-add');
    })->name('doctor-add');

    Route::get('/patients', function () {
        return view('admin.patients');
    })->name('patients');

    Route::get('/calendar', function () {
        return view('admin.calendar');
    })->name('calendar');
});

// Doctor Routes
Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', function () {
        return view('doctor.dashboard');
    })->name('dashboard');

    Route::get('/appointments', function () {
        return view('doctor.appointments');
    })->name('appointments');

    Route::get('/appointments/{id}', function () {
        return view('doctor.appointment-details');
    })->name('appointment-details');

    Route::get('/calendar', function () {
        return view('doctor.calendar');
    })->name('calendar');
});

// Front Desk Routes
Route::prefix('frontdesk')->name('frontdesk.')->group(function () {
    Route::get('/dashboard', function () {
        return view('frontdesk.dashboard');
    })->name('dashboard');

    Route::get('/add-appointment', function () {
        return view('frontdesk.add-appointment');
    })->name('add-appointment');

    Route::get('/doctor-schedule', function () {
        return view('frontdesk.doctor-schedule');
    })->name('doctor-schedule');

    Route::get('/patients', function () {
        return view('frontdesk.patients');
    })->name('patients');

    Route::get('/history', function () {
        return view('frontdesk.history');
    })->name('history');
});
