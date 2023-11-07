<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CrudApplication;
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

    return view('welcome');
});
// Route::get("/admin" , [CrudApplication::class,"index"]);

Route::middleware(['admin'])->group(function () {
    Route::get('/login', [CrudApplication::class, "index"]);
    Route::get('/submit', [CrudApplication::class, "submit"])->name("submit.submit");
    Route::get('/dashboard', [CrudApplication::class, "dashboard"]);
});
