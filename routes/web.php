<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/expenses', 'ExpensesController@index')->name('expenses.index');
Route::post('/expenses', 'ExpensesController@store')->name('expenses.store');
Route::get('/expenses/{expense:title}', 'ExpensesController@show')->name('expenses.show');
Route::put('/expenses/{expense:title}', 'ExpensesController@update')->name('expenses.update');
Route::delete('/expenses/{expense:title}', 'ExpensesController@destroy')->name('expenses.destroy');
