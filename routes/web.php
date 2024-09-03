<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    //Permissions's routes

    Route::get('/permissions',[\App\Http\Controllers\PermissionController::class,'index'])->name('permissions.index');
    Route::get('/permissions/create',[\App\Http\Controllers\PermissionController::class,'create'])->name('permissions.create');
    Route::post('/permissions',[\App\Http\Controllers\PermissionController::class,'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit',[\App\Http\Controllers\PermissionController::class,'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}',[\App\Http\Controllers\PermissionController::class,'update'])->name('permissions.update');
    Route::delete('/permissions',[\App\Http\Controllers\PermissionController::class,'destroy'])->name('permissions.destroy');


//Roles routes
Route::get('/roles',[\App\Http\Controllers\RoleController::class,'index'])->name('roles.index');
Route::get('/roles/create',[\App\Http\Controllers\RoleController::class,'create'])->name('roles.create');
Route::post('/roles',[\App\Http\Controllers\RoleController::class,'store'])->name('roles.store');
Route::get('/roles/{id}/edit',[\App\Http\Controllers\RoleController::class,'edit'])->name('roles.edit');
Route::post('/roles/{id}',[\App\Http\Controllers\RoleController::class,'update'])->name('roles.update');
Route::delete('/roles',[\App\Http\Controllers\RoleController::class,'destroy'])->name('roles.destroy');

//Route for articles
Route::get('/articles',[\App\Http\Controllers\ArticleController::class,'index'])->name('articles.index');
Route::get('/articles/create',[\App\Http\Controllers\ArticleController::class,'create'])->name('articles.create');
Route::post('/articles',[\App\Http\Controllers\ArticleController::class,'store'])->name('articles.store');
Route::get('/articles/{id}/edit',[\App\Http\Controllers\ArticleController::class,'edit'])->name('articles.edit');
Route::post('/articles/{id}',[\App\Http\Controllers\ArticleController::class,'update'])->name('articles.update');
Route::delete('/articles',[\App\Http\Controllers\ArticleController::class,'destroy'])->name('articles.destroy');

//Users
Route::get('/users',[\App\Http\Controllers\UserController::class,'index'])->name('users.index');
Route::get('/users/create',[\App\Http\Controllers\UserController::class,'create'])->name('users.create');
Route::post('/users',[\App\Http\Controllers\UserController::class,'store'])->name('users.store');
Route::get('/users/{id}/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('users.edit');
Route::post('/users/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('users.update');
Route::delete('/users',[\App\Http\Controllers\UserController::class,'destroy'])->name('users.destroy');

require __DIR__.'/auth.php';
