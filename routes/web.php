<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// PLANTAS
Route::get('/', 'PlantaController@listAllPlantas')->name('planta.listAll');
Route::get('/planta/add', 'PlantaController@create')->name('planta.create')->middleware('auth');
Route::get('/planta/editar/{planta}', 'PlantaController@editForm')->name('planta.editForm')->middleware('auth');

Route::post('/planta/store', 'PlantaController@store')->name('planta.store')->middleware('auth');

Route::put('/planta/edit/{planta}', 'PlantaController@edit')->name('planta.edit')->middleware('auth');

Route::delete('/planta/destroy/{planta}', 'PlantaController@destroy')->name('planta.destroy')->middleware('auth');

// RECEITAS
Route::get('/receitas', 'ReceitaController@listAllReceitas')->name('receita.listAll');
Route::get('/receita/add', 'ReceitaController@create')->name('receita.create')->middleware('auth');
Route::get('/receita/editar/{receita}', 'ReceitaController@editForm')->name('receita.editForm')->middleware('auth');

Route::post('/receita/store', 'ReceitaController@store')->name('receita.store')->middleware('auth');

Route::put('/receita/edit/{receita}', 'ReceitaController@edit')->name('receita.edit')->middleware('auth');

Route::delete('/receita/destroy/{receita}', 'ReceitaController@destroy')->name('receita.destroy')->middleware('auth');


// USUÁRIOS
Route::get('/users', 'UserController@listAllUsers')->name('user.listAll')->middleware('auth');;
Route::get('/user/add', 'UserController@create')->name('user.create')->middleware('auth');
Route::get('/user/editar/{user}', 'UserController@editForm')->name('user.editForm')->middleware('auth');

Route::post('/user/store', 'UserController@store')->name('user.store')->middleware('auth');

Route::put('/user/edit/{user}', 'UserController@edit')->name('user.edit')->middleware('auth');

Route::delete('/user/destroy/{user}', 'UserController@destroy')->name('user.destroy')->middleware('auth');

Auth::routes();