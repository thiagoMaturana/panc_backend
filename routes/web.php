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
    Route::get('/plantas', 'PlantaController@listAllPlantas')->name('planta.listAll');
    Route::get('/planta/add', 'PlantaController@create')->name('planta.create');
    Route::get('/planta/editar/{planta}', 'PlantaController@editForm')->name('planta.editForm');
    Route::post('/planta/store', 'PlantaController@store')->name('planta.store');
    Route::put('/planta/edit/{planta}', 'PlantaController@edit')->name('planta.edit');
    Route::delete('/planta/destroy/{planta}', 'PlantaController@destroy')->name('planta.destroy');
    
    Route::get('/receitas', 'ReceitaController@listAllReceitas')->name('receita.listAll');
    Route::get('/receita/add', 'ReceitaController@create')->name('receita.create');
    Route::get('/users', 'UserController@listAllUsers')->name('user.listAll');
    Route::get('/receita/editar/{receita}', 'ReceitaController@editForm')->name('receita.editForm');
    Route::post('/receita/store', 'ReceitaController@store')->name('receita.store');
    Route::put('/receita/edit/{receita}', 'ReceitaController@edit')->name('receita.edit');
    Route::delete('/receita/destroy/{receita}', 'ReceitaController@destroy')->name('receita.destroy');
    
    Route::get('/user/add', 'UserController@create')->name('user.create');
    Route::get('/user/editar/{user}', 'UserController@editForm')->name('user.editForm');
    Route::post('/user/store', 'UserController@store')->name('user.store');    
    Route::put('/user/edit/{user}', 'UserController@edit')->name('user.edit');    
    Route::delete('/user/destroy/{user}', 'UserController@destroy')->name('user.destroy');
});

Route::get('/', 'PublicController@listAllPlantas')->name('publico.planta.listAll');
Route::get('/plantas/add', 'PublicController@addForm')->name('publico.planta.addForm');
Route::get('/plantas/{planta}}', 'PublicController@detail')->name('publico.planta.detail');
Route::get('/plantas/editar/{planta}', 'PublicController@editForm')->name('publico.planta.editForm');
Route::post('/plantas/store', 'PublicController@store')->name('publico.planta.store');
Route::put('/plantas/edit/{planta}', 'PublicController@edit')->name('publico.planta.edit');
Route::delete('/plantas/destroy/{planta}', 'PublicController@destroy')->name('publico.planta.destroy');


Route::get('/receitas', 'PublicController@listAllReceitas')->name('publico.receita.listAll');
Route::get('/receitas/add', 'PublicController@addFormReceita')->name('publico.receita.addForm');
Route::get('/receitas/{receita}', 'PublicController@detailReceita')->name('publico.receita.detail');
Route::get('/receitas/editar/{receita}', 'PublicController@editFormReceita')->name('publico.receita.editForm');
Route::post('/receitas/store', 'PublicController@storeReceita')->name('publico.receita.store');
Route::put('/receitas/edit/{receita}', 'PublicController@editReceita')->name('publico.receita.edit');
Route::delete('/receitas/destroy/{receita}', 'PublicController@destroyReceita')->name('publico.receita.destroy');

Auth::routes();
