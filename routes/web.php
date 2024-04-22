<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/notes/index', [NoteController::class, 'index'])->name('indexNote');
    Route::get('/notes/create',[NoteController::class,'create'])->name('createNote');
    Route::post('/notes/store',[NoteController::class,'store'])->name('storeNote');
    Route::get('/notes/show/{uuid}',[NoteController::class,'show'])->name('showNote');
    Route::get('/notes/edit/{uuid}',[NoteController::class,'edit'])->name('editNote');
    Route::post('/notes/update',[NoteController::class,'update'])->name('updateNote');
});
