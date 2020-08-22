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

Route::get('/receitas', function () {
    return view('tables.receitas');
})->name('tables.receitas');

// PLANTAS
Route::get('/', 'PlantaController@listAllPlantas')->name('planta.listAll');
Route::get('/planta/add', 'PlantaController@create')->name('planta.create');
Route::get('/planta/editar/{planta}', 'PlantaController@editForm')->name('planta.editForm');

Route::post('/planta/store', 'PlantaController@store')->name('planta.store');

Route::put('/planta/edit/{planta}', 'PlantaController@edit')->name('planta.edit');

Route::delete('/planta/destroy/{planta}', 'PlantaController@destroy')->name('planta.destroy');


// USUÁRIOS
Route::get('/users', 'UserController@listAllUsers')->name('user.listAll');
Route::get('/user/add', 'UserController@create')->name('user.create');
Route::get('/user/editar/{user}', 'UserController@editForm')->name('user.editForm');

Route::post('/user/store', 'UserController@store')->name('user.store');

Route::put('/user/edit/{user}', 'UserController@edit')->name('user.edit');

Route::delete('/user/destroy/{user}', 'UserController@destroy')->name('user.destroy');