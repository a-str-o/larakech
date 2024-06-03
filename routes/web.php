<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return Redirect::route('contacts.index');
});

Route::resource('contacts', ContactController::class);