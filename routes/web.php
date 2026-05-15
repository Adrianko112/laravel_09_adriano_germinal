<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServiziController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/chi-siamo', [PublicController::class, 'aboutUs'])->name('aboutUs');

Route::get('/chi-siamo/detail/{name}', [PublicController::class, 'aboutUsDetail'])->name('aboutUsDetail');

Route::get('/contatti', [PublicController::class, 'contacts'])->name('contacts');

Route::get('/servizi', [ServiziController::class, 'servizi'])->name('services');




//invio mail 

Route::post('/contact-us', [PublicController::class,'contactUs'])->name('contactUs');

//aggiunta servizio
Route::get('/services/create', [ServiziController::class, 'create'])->name('services-create')->middleware('auth');

Route::post('/services/submit', [ServiziController::class, 'store'])->name('services-store');

//vedere servizio

Route::get('servizi/show/{servizio}', [ServiziController::class,'show'])->name('servizio.show');

//modificare servizio

Route::get('servizio/edit/{servizio}', [ServiziController::class,'edit'])->name('servizio.edit')->middleware('auth');
Route::put('servizio/update/{servizio}', [ServiziController::class,'update'])->name('servizio.update')->middleware('auth');

//cancellare servizio 
Route::delete('servizio/delete/{servizio}', [ServiziController::class,'destroy'])->name('servizio.delete')->middleware('auth');

//profilo utente
Route::get('/user/profile', [PublicController::class, 'profile'])->name('user.profile')->middleware('auth');

//creazione tag 
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create')->middleware('auth');
Route::post('/tags/create/submit', [TagController::class,'submit'])->name('tags.submit')->middleware('auth'); 
//visualizzazione tag
Route::get('/tags/index', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/show/{name}', [TagController::class, 'show'])->name('tags.show');