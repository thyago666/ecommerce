@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>



</head>

<body>

  

  <!-- Page Content -->
  <div class="container">


     <div class="row">

      <div class="col-lg-3">

       @include('menu');

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

      <!--caroussel-->

      @if($params == 'cad')
   <form method="post" action="{{url('admin/produtos/post')}}">
    @else
      <form method="post" action="{{url('admin/produtos/update/')}}">
    @endif

    @csrf
     <b>Categoria</b>
        <div class="input-group mb-3">

  <select class="custom-select" id="categoria" name="categoria">

    <option selected>Categoria do Produto


    </option>
      @foreach($categorias as $categoria)

      @if($params=='up')
    <option value="{{$categoria->id}}" @if(isset($produtos) && $produtos->id_categoria == $categoria->id)
     selected @endif>
     {{$categoria->descricao}}
   </option>
   @else
           <option value="{{$categoria->id}}">
     {{$categoria->descricao}}
   </option>
   @endif
    @endforeach

   </select>
 
</div>

@php
if($params == 'up')
{
  $id_produto = $produtos->id;
$nome = $produtos->nome;
$descricao = $produtos->descricao;
$valor = $produtos->valor;
$ativo = $produtos->ativo;
$capa = $produtos->capa;
$estoque = $produtos->estoque;
$peso = $produtos->peso;
$altura = $produtos->altura;
$largura = $produtos->largura;
$comprimento = $produtos->comprimento;
}

else{
  $id_produto = '';
  $nome = '';
  $descricao = '';
$valor = '';
$ativo = '';
$capa = '';
$estoque = '';
$peso = '';
$altura = '';
$largura = '';
$comprimento ='';
}

@endphp

<input type="hidden" name="id_produto" value="{{$id_produto}}">


  <div class="form-group row">
   

    <div class="col">
          <b>Nome</b>
      <input type="text" class="form-control form-control" id="produto" name="produto" placeholder="Nome do Produto" value="{{$nome}}">
    </div>
  </div>
  <div class="form-group row">

    
    <div class="col">
        <b>Descrição</b>
       <textarea class="form-control" aria-label="With textarea" name="descricao" placeholder="Descrição do Produto">{{$descricao}}</textarea>
    </div>
  </div>
  <div class="form-group row">
  
 
    <div class="col-6">
         <b>Valor Unitário</b>
      <input type="text" class="form-control form-control" id="valor" name="valor" placeholder="Valor Unitário" value="{{$valor}}">
    </div>

    
      <div class="col-6">
          <b>Estoque</b>
      <input type="number" class="form-control form-control" id="estoque" name="estoque" placeholder="Quantidade no Estoque" value="{{$estoque}}">
    </div>
  </div>

  <b>Ativo</b>
    <div class="input-group mb-3">

  <select class="custom-select" id="ativo" name="ativo">
    @if($params=='up')
      @if($produtos->ativo == 'S')
     <option value="{{$produtos->ativo}}" selected>Sim</option>
      @else
      <option value="{{$produtos->ativo}}" selected>Não</option>
      @endif
     @else
    <option selected>Produto Ativo</option>
    @endif
    <option value="S">Sim</option>
    <option value="N">Não</option>
   </select>
 
</div>

<b>Capa</b>
      <div class="input-group mb-3">

  <select class="custom-select" id="capa" name="capa">
@if($params=='up')
      @if($produtos->capa == 'S')
     <option value="{{$produtos->capa}}" selected>Sim</option>
      @else
      <option value="{{$produtos->capa}}" selected>Não</option>
      @endif
     @else
    <option selected>Produto Capa</option>
    @endif
    <option value="S">Sim</option>
    <option value="N">Não</option>
   </select>
 
</div>

 <div class="form-group row">
  

    <div class="col-3">
          <b>Peso</b>
      <input type="text" class="form-control form-control" id="peso" name="peso" placeholder="Peso" value="{{$peso}}">
    </div>
 
      <div class="col-3">
           <b>Altura</b>
      <input type="text" class="form-control form-control" id="altura" name="altura" placeholder="Altura" value="{{$altura}}">
    </div>

    
      <div class="col-3">
          <b>Largura</b>
      <input type="text" class="form-control form-control" id="largura" name="largura" placeholder="Largura" value="{{$largura}}">
    </div>

    
      <div class="col-3">
          <b>Comprimento</b>
      <input type="text" class="form-control form-control" id="comprimento" name="comprimento" placeholder="Comprimento" value="{{$comprimento}}">
    </div>
  </div>
<button type="submit" class="btn btn-primary">Gravar</button>

</form>

<br>

        <div class="row">


  
    

        

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
 

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


  



</div>





@endsection
