<?php

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

//------- AUTH
Auth::routes();

//------- CLIENTE Controller

//Rotas CLIENTE, direcionando para o ClienteController usar os métodos
Route::resource('/clientes', 'ClienteController', ['except' => ['destroy']]); //quando usa o resource as rotas já são criadas automaticamente e podem ser vistas através de "php artisan route:list" as rotas nomeadas 
//na view para armazenar os dados do form, por exemplo, no action coloca

//Lista de Clientes
Route::get('/list_cli', 'ClienteController@listar');

//Excluir Cliente
Route::get('/clientes/{cliente}/delete', 'ClienteController@destroy')->name('clientes.destroy');

//-----------------------------------------------------------------------------------

//------- ORÇAMENTO Controller

//RESOURCE - Orçamento
Route::resource('/orcamentos', 'OrcamentoController', ['except' => ['destroy']]);

//listar orçamentos
Route::get('/list_orc', 'OrcamentoController@listar');

//deletar orçamento
Route::get('/orcamentos/{orcamento}/delete', 'OrcamentoController@destroy')->name('orcamentos.destroy');

//------------------------------------------------------------------------------------

//------- DIRETO PARA VIEWS

//Tela Menu
Route::get('/index', function(){
    return view('menu.index');
})->middleware('auth');
    
//Cadastrar Cliente
Route::get('/cad_cli', function(){
    return view('clientes.create');
})->middleware('auth');

//Cadastrar Orçamento
Route::get('/cad_orc', function(){
    return view('orcamentos.create');
})->middleware('auth');

//---------------------------------------------------------------------------------------





