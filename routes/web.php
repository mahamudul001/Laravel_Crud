<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DemoController::class, 'index']);

Route::get('/students/create', [DemoController::class, 'create'])->name('create');

Route::post('/', [DemoController::class, 'store'])->name('store');

Route::get('/edit/{id}', [DemoController::class, 'edit'])->name('edit');

Route::put('/{id}', [DemoController::class, 'update']);

Route::delete('/delete/{id}', [DemoController::class, 'delete'])->name('delete');