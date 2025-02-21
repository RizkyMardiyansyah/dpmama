<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\paymentController;
use App\Models\template;



Route::get('/admin', function () {
    return redirect('/admin/orders');
});




Route::get('/', [DomainController::class, 'index'])->name('home');
Route::get('/success/{order}', [DomainController::class, 'success'])->name('success');


Route::post('/orderstore', [DomainController::class, 'store'])->name('orderstore');
Route::get('/update-status', [paymentController::class, 'updateStatus'])->name('updateStatus');
Route::get('/templates', [DomainController::class, 'index'])->name('templates.index');







