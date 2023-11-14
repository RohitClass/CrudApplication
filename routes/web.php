<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CrudApplication;



Route::get('/', function () {

    return view('welcome');
});
// Route::get("/admin" , [CrudApplication::class,"index"]);


Route::middleware(['admin'])->group(function () {
    Route::get('/login', [CrudApplication::class, 'index']);
    Route::get('/form', [CrudApplication::class, 'form'])->name("form.form");
    Route::get('/submit', [CrudApplication::class, 'submit'])->name('submit.submit');
    Route::post('/submit', [CrudApplication::class, 'data'])->name('submit.data');
    Route::get('/dashboard', [CrudApplication::class, 'dashboard'])->name("dashbord");
    Route::get('/delete/{id}', [CrudApplication::class, 'delete'])->name("delete.delete");
    Route::get('/edit/{id}', [CrudApplication::class, 'edit'])->name("edit.edit");
    Route::post('/update', [CrudApplication::class, 'update'])->name("update.update");


});


