<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/notes/edit/{note}', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('note.update');
Route::delete('/notes/{note}', [NoteController::class, 'delete'])->name('note.delete');
Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
Route::get('/notes/{note}', [NoteController::class, 'show'])->name('note.show');