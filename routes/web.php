<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // ExpensesController routes
    Route::prefix('/expenses')->group( function() {
        Route::get('/', 'ExpensesController@index')->name('expenses.index');
        Route::post('/', 'ExpensesController@store')->name('expenses.store');
        Route::get('/{expense}', 'ExpensesController@show')->name('expenses.show');
        Route::put('/{expense}', 'ExpensesController@update')->name('expenses.update');
        Route::delete('/{expense}', 'ExpensesController@destroy')->name('expenses.destroy');
    });
});

Auth::routes();
