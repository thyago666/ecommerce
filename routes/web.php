<?php

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
/*

Route::get('/', function ()
 {
    return view('/home');

});
*/

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/carrinho', [App\Http\Controllers\CarrinhoController::class, 'listar'])->name('carrinho');
Route::post('/insert/{idProduto}', [App\Http\Controllers\CarrinhoController::class, 'InserirPedido'])->name('insert');
Route::get('/detalhes/{id}', [App\Http\Controllers\HomeController::class, 'detalhes'])->name('detalhes');
Route::post('home/excluir/{id}', [App\Http\Controllers\CarrinhoController::class, 'excluir'])->name('excluir');
Route::post('/home/finalizar/', [App\Http\Controllers\CarrinhoController::class, 'finalizar'])->name('finalizar');

Route::get('/pagamento/{id_pedido}',[App\Http\Controllers\PagamentoController::class,'enviaRequisicao'])->name('pagamento');

Route::get('/notificacoes',[App\Http\Controllers\PagamentoController::class,'notificacoes'])->name('notifica');

Route::post('/pesquisa',[App\Http\Controllers\HomeController::class,'pesquisaProdutos'])->name('pesquisa');

Route::get('/categoria/{id_categoria}',[App\Http\Controllers\HomeController::class,'pesquisaCategoria'])->name('categoria');

Route::post('/cep',[App\Http\Controllers\HomeController::class,'calculaFrete'])->name('cep');
Route::get('/cep/{idProduto}',[App\Http\Controllers\HomeController::class,'viewCep'])->name('viewCep');

Route::get('/endereco/{id_pedido}/',[App\Http\Controllers\PagamentoController::class,'endereco'])->name('endereco');

Route::post('/endereco/post/',[App\Http\Controllers\PagamentoController::class,'gravaEndereco'])->name('gravaEndereco');

Route::get('sobre',[App\Http\Controllers\HomeController::class,'sobre'])->name('sobre');


//admin usuario
Route::get('admin/user',[App\Http\Controllers\AdminUserController::class,'HomeAdmin'])->name('HomeAdmin');

//admin
Route::get('admin',[App\Http\Controllers\AdminController::class,'homeAdmin'])->name('homeAdmin');
Route::get('admin/produtos',[App\Http\Controllers\AdminController::class,'viewProdutos'])->name('viewProdutos');
Route::get('admin/produtos/cad',[App\Http\Controllers\AdminController::class,'cadProdutos'])->name('cadProdutos');

Route::get('admin/produtos/{id_produto}',[App\Http\Controllers\AdminController::class,'updateViewProduto'])->name('updateViewProduto');

Route::post('admin/produtos/update/',[App\Http\Controllers\AdminController::class,'updateProdutos'])->name('updateProdutos');

Route::post('admin/produtos/post',[App\Http\Controllers\AdminController::class,'gravarProdutos'])->name('gravarProdutos');

Route::get('admin/imagens/{id_produto}',[App\Http\Controllers\AdminController::class,'formImage'])->name('formImage');

Route::post('admin/imagem/post/',[App\Http\Controllers\AdminController::class,'gravaImagem'])->name('gravaImagem');

Route::post('admin/produtos/psq',[App\Http\Controllers\AdminController::class,'psqProdutos'])->name('psqProdutos');

Route::post('admin/categorias/post',[App\Http\Controllers\AdminController::class,'gravaCategorias'])->name('gravaCategorias');

Route::post('admin/categorias/update',[App\Http\Controllers\AdminController::class,'updateCategorias'])->name('updateCategorias');

Route::get('admin/categorias/',[App\Http\Controllers\AdminController::class,'Categorias'])->name('Categorias');

Route::get('admin/categorias/cad',[App\Http\Controllers\AdminController::class,'formCategorias'])->name('formCategorias');

Route::get('admin/categorias/{id_categoria}',[App\Http\Controllers\AdminController::class,'updateFormCategorias'])->name('updateFormCategorias');

Route::get('admin/pedidos/',[App\Http\Controllers\AdminController::class,'pedidosLoja'])->name('pedidosLoja');

Route::post('admin/pedidos/produtos/',[App\Http\Controllers\AdminController::class,'exibeprodutosModal'])->name('exibeprodutosModal');

Route::post('admin/pedidos/imp',[App\Http\Controllers\AdminController::class,'imprimePedido'])->name('imprimePedido');
