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


Route::get('/', 'PlantaController@index')->name('planta.index');
Route::post('/plantas', 'PlantaController@store')->name('planta.store');
Route::get('/plantas/create', 'PlantaController@create')->name('planta.create');
Route::get('/plantas/{planta}', 'PlantaController@show')->name('planta.show');
Route::get('/plantas/{planta}/edit', 'PlantaController@edit')->name('planta.edit');
Route::put('/plantas/{planta}', 'PlantaController@update')->name('planta.update');
Route::delete('/plantas/{planta}', 'PlantaController@destroy')->name('planta.destroy');

Route::get('/planta/analise/{planta}', 'PlantaController@showParaAnalise')->name('planta.showParaAnalise');
Route::get('/minhasPlantas', 'PlantaController@indexMinhasPlantas')->name('planta.minhasPlantas');
Route::get('/paraAnalise','PlantaController@indexParaAnalise')->name('planta.paraAnalise');
Route::get('/planta/search', 'PlantaController@search')->name('planta.search');
Route::put('/parecer/{planta}', 'PlantaController@parecer')->name('planta.parecer');
Route::get('/aprovar/{planta}', 'PlantaController@aprovar')->name('planta.aprovar');
Route::get('/submeter/{planta}', 'PlantaController@submeter')->name('planta.submeter');

Route::get('/receitas', 'ReceitaController@index')->name('receita.index');
Route::get('/receitas/create', 'ReceitaController@create')->name('receita.create');
Route::post('/receitas', 'ReceitaController@store')->name('receita.store');
Route::get('/receitas/{receita}', 'ReceitaController@show')->name('receita.show');
Route::get('/receitas/{receita}/edit', 'ReceitaController@edit')->name('receita.edit');
Route::put('/receitas/{receita}', 'ReceitaController@update')->name('receita.update');
Route::delete('/receitas/{receita}', 'ReceitaController@destroy')->name('receita.destroy');

Route::get('/minhasReceitas', 'ReceitaController@minhasReceitas')->name('receita.minhasReceitas');
Route::post('/receita/fetch', 'ReceitaController@fetchPlanta')->name('receita.fetchPlanta');
Route::get('/searchReceita', 'ReceitaController@search')->name('receita.search');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin',], function(){
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::post('/users/store', 'UserController@store')->name('user.store');    
    Route::get('/users/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/users/{user}', 'UserController@update')->name('user.update');    
    Route::delete('/users/{user}', 'UserController@destroy')->name('user.destroy');
});
Auth::routes();
