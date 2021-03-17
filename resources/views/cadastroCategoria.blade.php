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

@if(isset($categoria))
 <form method="post" action="{{url('admin/categorias/update')}}">
 	@else
 	<form method="post" action="{{url('admin/categorias/post')}}">
 	@endif

    @csrf
  <div class="form-group row">
    <div class="col">
    	<b>Categoria</b>
    	@if(isset($categoria))
    	<input type="hidden" name="id_categoria" value="{{$categoria->id}}">
      <input type="text" class="form-control form-control" id="categoria" name="categoria" placeholder="Nome da Categoria" value="{{$categoria->descricao}}">
      @else
      <input type="text" class="form-control form-control" id="categoria" name="categoria" placeholder="Nome da Categoria" value="">
      @endif
    </div>
  </div>
<button type="submit" class="btn btn-primary">Gravar</button>

</form>

    
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


























