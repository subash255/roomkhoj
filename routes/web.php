<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SelectpaymentController;
use App\Http\Controllers\UseradminController;
use App\Http\Controllers\UserController;
use App\Models\Selectpayment;
use Illuminate\Support\Facades\Route;



Route::get('/',[PageController::class,'home'])->name('home');

Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/about',function () {
    return view('about');
});
Route::get ('/rent',function () {
    return view('rent');
});
Route::get('/search',[PageController::class,'search'])->name('search');
Route::get('/showroom',[PageController::class,'showroom'])->name('showroom');
Route::get('/moreroom',[PageController::class,'moreroom'])->name('moreroom');

Route::middleware('auth')->group(function () {
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
Route::delete('/rooms/{id}',[RoomController::class,'delete'])->name('rooms.delete');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/notification',[DashboardController::class,'notification'])->name('notification');
Route::get('notification/view/{id}',[DashboardController::class,'view'])->name('view');



Route::get('/useradmin',[UseradminController::class,'index'])->name('useradmin.index');
Route::get('useradmin/edit/{id}',[UseradminController::class,'edit'])->name('useradmin.edit');
Route::post('useradmin/update/{id}',[UseradminController::class,'update'])->name('useradmin.update');
Route::delete('/useradmin/{id}',[UseradminController::class,'delete'])->name('useradmin.delete');



});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
Route::get('users/index',[UserController::class,'index'])->name('users.index');

Route::get('users/profile/content',[UserController::class,'profileindex'])->name('users.profile.content');

Route::get('users/profile/{id}',[UserController::class,'profile'])->name('users.profile');
Route::get('/room',[UserController::class,'room'])->name('users.room');
Route::get('users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
Route::get('users/{id}/book',[UserController::class,'book'])->name('users.book');
Route::get('users/search',[UserController::class,'search'])->name('users.search');
Route::get('users/showroom',[UserController::class,'showroom'])->name('users.showroom');
Route::get('users/moreroom',[UserController::class,'moreroom'])->name('users.moreroom');
Route::get('users/about',[UserController::class,'about'])->name('users.about');
Route::get('users/{id}/selectpayment',[SelectpaymentController::class,'selectpayment'])->name('users.selectpayment');
Route::post('users/{id}/store',[SelectpaymentController::class,'store'])->name('users.store');
Route::get('users/room',[UserController::class,'booking'])->name('users.room');





Route::post('users/{id}/stores', [BooksController::class, 'stores'])->name('users.stores');

Route::get('/book/success', [BooksController::class, 'success'])->name('book.success');
Route::get('/book/failure', [BooksController::class, 'failure'])->name('book.failure');

Route::get('users/pay', [BooksController::class, 'index'])->name('users.pay');

});









require __DIR__.'/auth.php';
Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
   Route::post('login', [AuthenticatedSessionController::class, 'store']);


