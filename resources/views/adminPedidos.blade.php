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

 
<h2>Listagem de Pedidos</h2>




<div id="accordion">
@foreach($pedidos as $pedido)
  <div class="card">
    <div class="card-header" id="1">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$pedido->id}}" aria-expanded="false">
        {{$pedido->name}}  <b>#Pedido Nº</b> {{$pedido->id}} <b>Data:</b> {{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')}}    
      </h5>
    </div>
    <div id="collapse{{$pedido->id}}" class="collapse" data-parent="#accordion">
      <div class="card-body">
      <b>Endereço</b> {{$pedido->endereco}}<p>
       <b>CEP</b> {{$pedido->cep}}
        <b>Cidade</b> {{$pedido->cidade}} <b>UF</b> {{$pedido->estado}}
           @php
            $telefone = '(' . substr($pedido->telefone, 0, 2) . ')' . substr($pedido->telefone, 2, 5) . '-' . substr($pedido->telefone, 7);
             @endphp
          <b>Contato:</b>{{$telefone}}<P>
            <form method="post" action="{{url('admin/pedidos/produtos/')}}">
              @csrf
          <button type="submit" class="btn btn-primary">
          Produtos</button>
          <input type="hidden" name="id_pedido" value="{{$pedido->id}}">
        </form>
      </div>
  


    </div>


  </div>


@endforeach



  
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
