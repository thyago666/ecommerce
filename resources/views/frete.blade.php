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

        <h1 class="my-4">Categorias</h1>
        <div class="list-group">
            @foreach($Categorias as $Categoria)
          <a href="{{url("categoria/$Categoria->id")}}" class="list-group-item">{{$Categoria->descricao}}</a>
          @endforeach
         
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

 <h4>Informe abaixo o tipo de frete</h4><br>

        <div class="col">


         <form method="post" action="{{url('home/finalizar/')}}">
            @csrf
            <input type="hidden" name="id_pedido" id="id_pedido" value="{{$id_pedido}}">
              <input type="hidden" name="vl_frete" id="vl_frete" value="{{$valorFretePac}}">
                <input type="hidden" name="tp_frete" id="tp_frete" value="PAC">
  <div class="card border-success mb-3">
  <div class="card-header"><h1>PAC</h1></div>
  <div class="card-body">
    <h1 class="card-title">{{'R$ '.number_format($valorFretePac, 2, ',', '.') }}</h1>
    <p class="card-text"><h2>Prazo estimado: {{$prazoEntregaPac}} dias.</h2></p>
    <button type="submit" class="btn btn-danger">OK</button>
  </div>
</div>
</form>

         <form method="post" action="{{url('home/finalizar/')}}">
            @csrf
            <input type="hidden" name="id_pedido" id="id_pedido" value="{{$id_pedido}}">
            <input type="hidden" name="vl_frete" id="vl_frete" value="{{$valorFreteSedex}}">
            <input type="hidden" name="tp_frete" id="tp_frete" value="SEDEX">

 <div class="card border-success mb-3">
  <div class="card-header"><h1>SEDEX</h1></div>
  <div class="card-body">
    <h1 class="card-title">{{'R$ '.number_format($valorFreteSedex, 2, ',', '.') }}</h1>
    <p class="card-text"><h2>Prazo estimado: {{$prazoEntregaSedex}} dias.</h2></p>
    <button type="submit" class="btn btn-danger">OK</button>
  </div>
</div>
</form>






 



    

        

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<br>
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



























