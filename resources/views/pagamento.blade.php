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
        <div class="card text-center">
  <div class="card-header">
    Efetue o Pagamento
  </div>
  <div class="card-body">
    <h5 class="card-title">Pague com Pagseguro</h5>
    <p class="card-text">Parcele sua compra em até 12x.</p>
    <a href="{{url("/pagamento/$id_pedido")}}" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar.gif"  /></a>
    
  </div>
  <div class="card-footer text-muted">
    
  </div>
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
