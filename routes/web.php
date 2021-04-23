<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
  return view('index');
});

Route::get('/{id}', function($id){
  return view('vendas', ['id_vendedor' => $id]);
});

Route::get('/vendedor/create', function(){
  return view('createVendedor');
});

Route::get('/venda/create', function(){
  $vendedores = DB::table('vendedors')->select('vendedors.id', 'vendedors.nome')->get();
  return view('createVendas', ['vendedores' => $vendedores]);
});