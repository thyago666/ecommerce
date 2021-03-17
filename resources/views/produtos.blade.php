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

<form action="{{url('admin/produtos/cad')}}">
 <button type="submit" class="btn btn-success">+ Cadastrar Produto</button>
</form>

<p>
<h2>Listagem de Produtos</h2>


<form action="{{url('admin/produtos/psq')}}" method="post">
  @csrf
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Pesquisar Por:</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="opcao">

    <option value="1">Código</option>
    <option value="2">Nome</option>
   </select>

   <div class="form-group">
 
    <input type="text" class="form-control" id="psq" name="psq" aria-describedby="emailHelp" placeholder="Informe o Código ou o Nome do Produto">
  
  </div>


  <button type="submit" class="btn btn-primary my-1">OK</button>


</form>


<table class="table table-sm table-primary">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Nome</th>
      <th scope="col"><center>Opções</center></th>
    
     
    </tr>
  </thead>

  @foreach($produtos as $produto)
  <tbody>
    <tr>
      <td>{{$produto->id}}</td>
      <td>
        {{$produto->nome}}
      </td>

 
        <td>
          <center>
      <button type="button" class="btn btn-danger"><a href="{{$produto->id}}"><font color="white">Excluir</font></a></button>
       <button type="button" class="btn btn-primary"><a href="{{url("admin/produtos/$produto->id")}}"><font color="white">Alterar</font></a></button>
        <button type="button" class="btn btn-success"><a href="{{url("admin/imagens/$produto->id")}}"><font color="white">Imagem</font></a></button>
      </center>
    </td>
    </tr>
 </tbody>

 @endforeach
</table>

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
