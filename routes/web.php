<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PhoneController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('phones',PhoneController::class);

Route::resource('contacts',ContactController::class);
Route::post('/add-contact',[ContactController::class,'addContact'])->name('contact.add');
Route::post('/add-phone',[ContactController::class,'addPhone'])->name('phone.add');
Route::delete('/contactDel/{id}',[ContactController::class,'delete'])->name('contacts.delete');