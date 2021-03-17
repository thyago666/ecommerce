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

        <h5 class="my-4">Menu Administrativo</h5>
        <div class="list-group">
          <ul><a href="{{url('admin/produtos')}}">Cadastro de Produtos</a></ul>
          <ul>Cadastro de Usuários</ul>
          <ul>Pedidos</ul>
         
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <h2>{{$produto->nome}}</h2>
        <form method="post" action="{{url('admin/imagem/post/')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id_produto" value="{{$produto->id}}">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="imagem" id="imagem">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
<button type="submit" class="btn btn-primary">Gravar</button>
</form>

<br>

<div class="container">


  <div class="row">
    <div class="col-sm">
      @foreach($imagens as $imagem)
      <img src="{{asset("images/products/$imagem->id.$imagem->extensao")}}" class="mr-6" width="100">
     @endforeach
    </div>
    </div>

    
  
  </div>


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
