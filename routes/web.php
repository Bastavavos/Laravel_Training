<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::group(['middleware' => 'auth'], function() {
//   Route::group([
//       'prefix' => 'categories',
//       'middleware' => 'is_admin',
//       'as' => 'categories.',
//   ], function () {
//       Route::get('tasks',
//           [\App\Http\Controllers\Admin\TaskController::class, 'index'])->name('tasks.index');
//   });
//
//    Route::group([
//        'prefix' => 'user',
//        'as' => 'user.',
//    ], function () {
//        Route::get('tasks',
//            [\App\Http\Controllers\User\TaskController::class, 'index'])->name('tasks.index');
//    });
//});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware('is_admin');
});

//Route::resource('categories', \App\Http\Controllers\CategoryController::class);

require __DIR__.'/auth.php';
