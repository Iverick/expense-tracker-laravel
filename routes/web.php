<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // ExpensesController routes
    Route::get('/expenses', 'ExpensesController@index')->name('expenses.index');
    Route::post('/expenses', 'ExpensesController@store')->name('expenses.store');
    Route::get('/expenses/{expense:title}', 'ExpensesController@show')->name('expenses.show');
    Route::put('/expenses/{expense:title}', 'ExpensesController@update')->name('expenses.update');
    Route::delete('/expenses/{expense:title}', 'ExpensesController@destroy')->name('expenses.destroy');
});

Auth::routes();
