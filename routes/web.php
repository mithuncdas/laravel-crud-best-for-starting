<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * blog route start
 */
Route::get('/',[BlogController::class,'index'])->name('blog.all');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::get('/blog/store',[BlogController::class,'store'])->name('blog.store');
Route::get('/blog/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::get('/blog/update',[BlogController::class,'update'])->name('blog.update');
Route::get('/blog/delete',[BlogController::class,'delete'])->name('blog.delete');
/**
 * blog route end
 */
