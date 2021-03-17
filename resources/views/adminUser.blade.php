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

        <h1 class="my-4">Menu</h1>
        <div class="list-group">
        <h4><a href="{{url('admin/user')}}">Meus Pedidos</a></h4>
        <h4>Meus Dados</h4>
        <h4>Promoções</h4>
        <h4>Sair</h4>
         
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        

        <div class="row">



    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">Status</th>
      <th scope="col">Pagamento</th>
      <th scope="col">Tipo Frete</th>
      <th scope="col">Valor Frete</th>
      <th scope="col">Valor Produtos</th>
      <th scope="col">Valor Total</th>
    </tr>
  </thead>

    @foreach($pedidos as $pedido)  
  <tbody>
    <tr>
       <th>{{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')}}</th>
      <th>{{$pedido->status}}</th>
       <th>{{$pedido->pagamento}}</th>
      <td>{{$pedido->tipo_frete}}</td>
      <td>{{'R$ '.number_format($pedido->vl_frete, 2, ',', '.') }}</td>
      <td>{{'R$ '.number_format($pedido->vl_total, 2, ',', '.') }}</td>

      @php
      $vl_total_geral = ($pedido->vl_frete + $pedido->vl_total );
      @endphp

       <td>{{'R$ '.number_format($vl_total_geral, 2, ',', '.') }}</td>
    </tr>
  
   
  </tbody>

     @endforeach 
</table>

    

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>


  



</div>





@endsection
