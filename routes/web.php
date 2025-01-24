<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //Routes Administrateurs
    Route::group(['middleware' => ['role:Administrateur']], function () {
        Route::get('/validations-offres', function () {
            return view('validations-offres');
        })->name('validations-offres');

        Route::get('/transactions', function () {
            return view('transaction');
        })->name('transaction');
    });


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/souscriptions', function () {
        return view('souscription');
    })->name('souscription');
    Route::get('/rdv', function () {
        return view('rdv');
    })->name('rdv');
    Route::get('/agences', function () {
        return view('agences');
    })->name('agences');
    Route::get('/users', action: function () {
        return view('users');
    })->name('users');
});
