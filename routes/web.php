<?php

use App\Http\Controllers\ContactController;
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

Route::get('/contact/create',[ContactController::class,'create'])->name('contacts.store');
Route::get('/contact/',[ContactController::class,'index'])->name('contacts.show');
Route::post('/contact/create', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/contact/{contact}',[ContactController::class,'destroy'])->name('contact.delete');
Route::get('/contact/{contact}/edit',[ContactController::class,'edit'])->name('contact.edit');
Route::put('/contact/{contact}',[ContactController::class,'update'])->name('contact.update');
