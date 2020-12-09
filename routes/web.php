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
Route::post('/planta', 'PlantaController@store')->name('planta.store');
Route::get('/planta/create', 'PlantaController@create')->name('planta.create');
Route::get('/planta/{planta}', 'PlantaController@show')->name('planta.show');
Route::get('/planta/{planta}/edit', 'PlantaController@edit')->name('planta.edit');
Route::put('/planta/{planta}', 'PlantaController@update')->name('planta.update');
Route::delete('/planta/{planta}', 'PlantaController@destroy')->name('planta.destroy');

Route::get('/planta/analise/{planta}', 'PlantaController@showParaAnalise')->name('planta.showParaAnalise');
Route::get('/minhasPlantas', 'PlantaController@indexMinhasPlantas')->name('planta.minhasPlantas');
Route::get('/paraAnalise','PlantaController@indexParaAnalise')->name('planta.paraAnalise');
Route::get('/plantas/search', 'PlantaController@search')->name('planta.search');
Route::put('/parecer/{planta}', 'PlantaController@parecerPlanta')->name('planta.parecer');
Route::get('/aprovar/{planta}', 'PlantaController@aprovar')->name('planta.aprovar');
Route::get('/submeter/{planta}', 'PlantaController@submeter')->name('planta.submeter');

Route::get('/receitas', 'ReceitaController@index')->name('receita.index');
Route::get('/receita/create', 'ReceitaController@create')->name('receita.create');
Route::post('/receita', 'ReceitaController@store')->name('receita.store');
Route::get('/receitas/{receita}', 'ReceitaController@show')->name('receita.show');
Route::get('/receita/{receita}/edit', 'ReceitaController@edit')->name('receita.edit');
Route::put('/receita/{receita}', 'ReceitaController@update')->name('receita.update');
Route::delete('/receita/{receita}', 'ReceitaController@destroy')->name('receita.destroy');

Route::get('/minhasReceitas', 'ReceitaController@minhasReceitas')->name('receita.minhasReceitas');
Route::post('/receitas/fetch', 'ReceitaController@fetchPlanta')->name('receita.fetchPlanta');
Route::get('/planta/{planta}/receitas', 'ReceitaController@receitaPorPlanta')->name('receita.porPlanta');
Route::get('/searchReceita', 'ReceitaController@search')->name('receita.search');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin',], function(){
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');    
    Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserController@update')->name('user.update');    
    Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');
});
Auth::routes();
