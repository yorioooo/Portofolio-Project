<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FishController;

Route::resource('fishs', FishController::class);

Route::get('/fishs', [FishController::class,'index'])
->name('fishs.index');

Route::get('/fishs/create', [FishController::class,'create'])
->name('fishs.create');

Route::get('/fishs/create2', [FishController::class,'create2'])
->name('fishs.create2');

Route::post('/fishs', [FishController::class,'store'])
->name('fishs.store');

Route::get('/fishs/{fish}', [FishController::class,'show'])
->name('fishs.show');

Route::get('/fishs/{fish}/edit', [FishController::class,'edit'])
->name('fishs.edit');

Route::put('/fishs/{fish}', [FishController::class,'update'])
->name('fishs.update');

Route::delete('/fishs/{fish}', [FishController::class,'destroy'])
->name('fishs.destroy');