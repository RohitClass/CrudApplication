<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CrudApplication;



Route::get('/', function () {

    return view('welcome');
});

Route::group(["prefix" => "admin"], function(){

    Route::group(['middleware' => 'admin.guest'], function(){

        Route::get("/login" , [CrudApplication::class,"index"])->name('admin.login');
        Route::get('/submit', [CrudApplication::class, 'submit'])->name('submit.submit');
        
    });

    Route::group(['middleware' => 'admin.auth'], function(){

    Route::get('/form', [CrudApplication::class, 'form'])->name("form.form");
    Route::post('/submit', [CrudApplication::class, 'data'])->name('submit.data');
    Route::get('/dashboard', [CrudApplication::class, 'dashboard'])->name("dashbord");
    Route::get('/delete/{id}', [CrudApplication::class, 'delete'])->name("delete.delete");
    Route::get('/edit/{id}', [CrudApplication::class, 'edit'])->name("edit.edit");
    Route::post('/update', [CrudApplication::class, 'update'])->name("update.update");
    Route::get('/logout', [CrudApplication::class, 'logout'])->name("logout.logout");

    });

});
