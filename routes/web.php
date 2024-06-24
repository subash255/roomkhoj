<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get ('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/',[PageController::class,'home'])->name('home');

Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/about',function () {
    return view('about');
});
Route::get ('/rent',function () {
    return view('rent');
});

Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/delete',[CategoryController::class,'delete'])->name('categories.delete');

Route::get('/rooms',[RoomController::class,'index'])->name('rooms.index');
Route::get('/rooms/create',[RoomController::class,'create'])->name('rooms.create');
Route::post('/rooms/store',[RoomController::class,'store'])->name('rooms.store');
Route::get('/rooms/{id}/edit',[RoomController::class,'edit'])->name('rooms.edit');
Route::post('/rooms/{id}/update',[RoomController::class,'update'])->name('rooms.update');
Route::get('/rooms/{id}/delete',[RoomController::class,'delete'])->name('rooms.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users/index',[UserController::class,'index'])->name('users.index');

Route::get('users/profile',[UserController::class,'profile'])->name('users.profile');


require __DIR__.'/auth.php';


