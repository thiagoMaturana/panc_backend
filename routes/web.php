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

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin',
], function(){
    Route::get('/plantas', 'PlantaController@index')->name('planta.index');
    Route::get('/planta/create', 'PlantaController@create')->name('planta.create');
    Route::post('/planta', 'PlantaController@store')->name('planta.store');
    Route::get('/planta/{planta}/edit', 'PlantaController@edit')->name('planta.edit');
    Route::put('/planta/{planta}', 'PlantaController@update')->name('planta.update');
    Route::delete('/planta/{planta}', 'PlantaController@destroy')->name('planta.destroy');
    
    Route::get('/receitas', 'ReceitaController@index')->name('receita.index');
    Route::get('/receita/create', 'ReceitaController@create')->name('receita.create');
    Route::post('/receita', 'ReceitaController@store')->name('receita.store');
    Route::get('/receita/{receita}/edit', 'ReceitaController@edit')->name('receita.edit');
    Route::put('/receita/{receita}', 'ReceitaController@update')->name('receita.update');
    Route::delete('/receita/{receita}', 'ReceitaController@destroy')->name('receita.destroy');
    
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/user/create', 'UserController@create')->name('user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store');    
    Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::put('/user/{user}', 'UserController@update')->name('user.update');    
    Route::delete('/user/{user}', 'UserController@destroy')->name('user.destroy');
});

Route::get('/', 'PublicController@indexPlanta')->name('publico.planta.index');
Route::get('/plantas/create', 'PublicController@createPlanta')->name('publico.planta.create');
Route::post('/plantas', 'PublicController@storePlanta')->name('publico.planta.store');
Route::get('/plantas/{planta}', 'PublicController@showPlanta')->name('publico.planta.show');//show
Route::get('/plantas/{planta}/edit', 'PublicController@editPlanta')->name('publico.planta.edit');
Route::put('/plantas/{planta}', 'PublicController@updatePlanta')->name('publico.planta.update');
Route::delete('/plantas/{planta}', 'PublicController@destroyPlanta')->name('publico.planta.destroy');

Route::get('/plantas/analise/{planta}', 'PublicController@showPlantaParaAnalise')->name('publico.planta.showParaAnalise');
Route::get('/minhasPlantas', 'PublicController@indexMinhasPlantas')->name('publico.planta.indexMinhasPlantas');
Route::get('/plantasParaAnalise','PublicController@indexParaAnalise')->name('publico.planta.indexParaAnalise');
Route::get('/plantas/{planta}/aprovar', 'PublicController@aprovarPlanta')->name('publico.planta.aprovar');
Route::get('/plantas/{planta}/rejeitar', 'PublicController@rejeitarPlanta')->name('publico.planta.rejeitar');
Route::get('/plantas/{planta}/submeter', 'PublicController@submeterPlanta')->name('publico.planta.submeter');

Route::get('/receitas', 'PublicController@indexReceita')->name('publico.receita.index');
Route::get('/receitas/create', 'PublicController@createReceita')->name('publico.receita.create');
Route::post('/receitas', 'PublicController@storeReceita')->name('publico.receita.store');
Route::get('/receitas/{receita}', 'PublicController@showReceita')->name('publico.receita.show');
Route::get('/receitas/{receita}/edit', 'PublicController@editReceita')->name('publico.receita.edit');
Route::put('/receitas/{receita}', 'PublicController@updateReceita')->name('publico.receita.update');
Route::delete('/receitas/{receita}', 'PublicController@destroyReceita')->name('publico.receita.destroy');

Route::post('/receitas/fetch', 'ReceitaController@fetchPlanta')->name('receita.fetchPlanta');
Route::get('/minhasReceitas', 'PublicController@indexMinhasReceitas')->name('publico.receita.indexMinhasReceitas');
Route::get('/receitas/porPlanta/{planta}', 'PublicController@indexReceitaPorPlanta')->name('publico.receita.indexPorPlanta');
Route::get('/receitas/minhaPlanta/{receita}', 'PublicController@showReceitaMinhasReceita')->name('publico.receita.showReceitaMinhaReceita');


Route::get('/searchPlanta', 'PublicController@searchPlanta')->name('planta.search');
Route::get('/searchReceita', 'PublicController@searchReceita')->name('receita.search');

Auth::routes();
