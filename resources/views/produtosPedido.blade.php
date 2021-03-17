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

 
<h2>Listagem de Produtos</h2>


  <table class="table">
  <thead>
    <tr>
      <th scope="col">Códido</th>
      <th scope="col">Produto</th>
      <th scope="col">Frete</th>
         <th scope="col">Qtd</th>
      <th scope="col">Valor Unitário</th>

   
    </tr>
  </thead>
  @foreach($produtos as $produto)
  <tbody>
    <tr>
      <th scope="row">{{$produto->id}}</th>
      <td>{{$produto->nome}}</td>
       <td>{{$produto->tipo_frete}}</td>
       <td>{{$produto->qtd}}</td>
      <td>{{$produto->vl_unitario}}</td>

    </tr>
 

  </tbody>

  @endforeach

  @php
  $total = ($produto->vl_total + $produto->vl_frete);
  @endphp

 <td><h2>Total Produtos + Frete</h2><h4><font color="red">{{'R$ '.number_format($total, 2, ',', '.') }}</font></h4></td>
  <tbody>
  


  
 

  </tbody>
</table>
<form method="post" action="{{url('admin/pedidos/imp')}}">
              @csrf
          <button type="submit" class="btn btn-primary">
          Imprimir Pedido</button>
          <input type="hidden" name="id_pedido" value="{{$produto->id_pedido}}">
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
