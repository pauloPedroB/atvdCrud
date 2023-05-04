<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('book.index');
})->name('welcome');
Route::resource('book', bookController::class)->parameters([
    'posts' => 'id'
]);