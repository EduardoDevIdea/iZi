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

//-----------------------------   CLIENTE Controller

//Rotas CLIENTE, direcionando para o ClienteController usar os métodos
Route::resource('/clientes', 'ClienteController', ['except' => ['destroy']]); //quando usa o resource as rotas já são criadas automaticamente e podem ser vistas através de "php artisan route:list" as rotas nomeadas 
//na view para armazenar os dados do form, por exemplo, no action coloca

//Lista de Clientes
Route::get('/list_cli', 'ClienteController@listar');

//Filtrar Clientes
Route::post('/search_cli', 'ClienteController@filtro');

//Excluir Cliente
Route::get('/clientes/{cliente}/delete', 'ClienteController@destroy')->name('clientes.destroy');

//-----------------------------------------------------------------------------------

//-----------------------------  ORÇAMENTO Controller

//RESOURCE - Orçamento
Route::resource('/orcamentos', 'OrcamentoController', ['except' => ['destroy']]);

//listar orçamentos
Route::get('/list_orc', 'OrcamentoController@listar');

//filtrar orçamentos
Route::post('/search_orc', 'OrcamentoController@filtro');

//definir status
Route::post('/status', 'OrcamentoController@status');

//definir inicio
Route::post('/inicio', 'OrcamentoController@inicio');

//definir estado do servico
Route::post('/servico', 'OrcamentoController@servico');

//download orçamento
Route::get('download/{$id}', 'OrcamentoController@download');

//enviar orçamento
Route::get('/enviar/{$id}', 'OrcamentoController@enviar');

//deletar orçamento
Route::get('/orcamentos/{orcamento}/delete', 'OrcamentoController@destroy')->name('orcamentos.destroy');

//------------------------------------------------------------------------------------

//-----------------------------   AGENDA Controller

//RESOURCE - Agenda
Route::resource('/agendas', 'AgendaController', ['except' => ['destroy']]);

Route::get('/agendas/{agenda}/delete', 'AgendaController@destroy')->name('agendas.destroy');

//-----------------------------------------------------------------------------------

//-----------------------------  DIRETO PARA VIEWS

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

//Agendar Visita
Route::get('/agendar', function(){
    return view('agendas.create');
})->middleware('auth');

//---------------------------------------------------------------------------------------
