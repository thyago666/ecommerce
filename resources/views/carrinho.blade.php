@extends('layouts.app')

@section('content')
<div class="container">

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>

 

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

   <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

     

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-12">

      

      


              
       


<table class="table">
  <thead>
    <tr>
      <th scope="col">Imagem</th>
      <th scope="col">Descrição</th>
      <th scope="col">Qtd</th>
      <th scope="col">Valor</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
  @php
  $totalGeral = 0;
  @endphp
   @foreach($itensCarrinhos as $itensCarrinho)
  <tbody>
    <tr>
      <th scope="row"><img src="{{asset("images/products/$itensCarrinho->imagem.$itensCarrinho->extensao")}}" alt="..." width="100px" class="img-thumbnail"></th>
      <td>{{$itensCarrinho->nome}}</td>
      <td>{{$itensCarrinho->qtd}}</td>
      @php
                $total = ($itensCarrinho->qtd * $itensCarrinho->valor); 
                $totalGeral = ($totalGeral + $total);
             @endphp
      <td>{{'R$ '.number_format($total, 2, ',', '.') }}</td>
      <form method="post" action="{{url("home/excluir/$itensCarrinho->id")}}">
        @csrf
      <td><button type="submit" class="btn btn-outline-danger">Excluir</button></td>
    </form>
    </tr>
  </tbody>
  @endforeach
</table>
         <div class="card-footer">
          <form method="get" action="{{url("/")}}">
               <button type="submit" class="btn btn-primary">Comprar Mais</button>
             </form>
             <br>
             <form method="get" action="{{url("/endereco/$itensCarrinho->id_pedido/")}}">
               <button type="submit" class="btn btn-primary">Finalizar Compra</button>
             </form>
              </div>
           
          </div>
   




        

 
        <!-- /.row -->

    
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
