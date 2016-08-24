<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'RelatorioController@index');


Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');

Route::group(['prefix' => '', 'middleware' => 'auth'], function () {

	Route::group(['prefix' => 'clientes'], function () {
		Route::get('', ['as' => 'clientes.index', 'uses' => 'ClientesController@index']);
		Route::get('add', ['as' => 'clientes.add', 'uses' => 'ClientesController@add']);
		Route::post('save', ['as' => 'clientes.save', 'uses' => 'ClientesController@save']);
		Route::get('edit/{id}', ['as' => 'clientes.edit', 'uses' => 'ClientesController@edit']);
		Route::put('update/{id}', ['as' => 'clientes.update', 'uses' => 'ClientesController@update']);
		Route::get('delete/{id}', ['as' => 'clientes.delete', 'uses' => 'ClientesController@delete']);
	});

	Route::group(['prefix' => 'vendedores'], function () {
		Route::get('', ['as' => 'vendedores.index', 'uses' => 'VendedoresController@index']);
		Route::get('add', ['as' => 'vendedores.add', 'uses' => 'VendedoresController@add']);
		Route::post('save', ['as' => 'vendedores.save', 'uses' => 'VendedoresController@save']);
		Route::get('edit/{id}', ['as' => 'vendedores.edit', 'uses' => 'VendedoresController@edit']);
		Route::put('update/{id}', ['as' => 'vendedores.update', 'uses' => 'VendedoresController@update']);
		Route::get('delete/{id}', ['as' => 'vendedores.delete', 'uses' => 'VendedoresController@delete']);
	});

	Route::group(['prefix' => 'produtos'], function () {
		Route::get('', ['as' => 'produtos.index', 'uses' => 'ProdutosController@index']);
		Route::get('add', ['as' => 'produtos.add', 'uses' => 'ProdutosController@add']);
		Route::post('save', ['as' => 'produtos.save', 'uses' => 'ProdutosController@save']);
		Route::get('edit/{id}', ['as' => 'produtos.edit', 'uses' => 'ProdutosController@edit']);
		Route::put('update/{id}', ['as' => 'produtos.update', 'uses' => 'ProdutosController@update']);
		Route::get('delete/{id}', ['as' => 'produtos.delete', 'uses' => 'ProdutosController@delete']);
	});

	Route::group(['prefix' => 'vendas'], function () {
		Route::get('', ['as' => 'vendas.index', 'uses' => 'VendasController@index']);
		Route::get('add', ['as' => 'vendas.add', 'uses' => 'VendasController@add']);
		Route::post('save', ['as' => 'vendas.save', 'uses' => 'VendasController@save']);
		Route::get('edit/{id}', ['as' => 'vendas.edit', 'uses' => 'VendasController@edit']);
		Route::put('update/{id}', ['as' => 'vendas.update', 'uses' => 'VendasController@update']);
		Route::get('delete/{id}', ['as' => 'vendas.delete', 'uses' => 'VendasController@delete']);
	});
});
