<?php

use App\Http\Controllers\UserController;
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
    return view('tables.plantas');
})->name('tables.plantas');

Route::get('/receitas', function () {
    return view('tables.receitas');
})->name('tables.receitas');

Route::get('/users', 'UserController@listAllUsers')->name('user.listAll');
Route::get('/users/add', 'UserController@create')->name('user.create');
Route::get('/users/editar/{user}', 'UserController@editForm')->name('user.editForm');

Route::post('/user/store', 'UserController@store')->name('user.store');

Route::put('/users/edit/{user}', 'UserController@edit')->name('user.edit');

Route::delete('/users/destroy/{user}', 'UserController@destroy')->name('user.destroy');