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


    <form method="post" action="{{url('/pesquisa')}}">
       @csrf
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Pesquise aqui sua busca por produtos" aria-label="Recipient's username" aria-describedby="basic-addon2" name="pesquisa" id="pesquisa">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit">Pesquisa</button>
  </div>
</div>
</form>

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

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{asset('images/banner1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{asset('images/banner2.jpg')}}" alt="Second slide">
            </div>
            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">


                @foreach($ProdDestaques as $ProdDestaque)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">

              <a href="{{url("/detalhes/$ProdDestaque->id")}}"><img class="card-img-top" src="{{asset("images/products/$ProdDestaque->imagem.$ProdDestaque->extensao")}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{url("/detalhes/$ProdDestaque->id")}}">{{$ProdDestaque->nome}}</a>
                </h4>
                <h5>{{'R$ '.number_format($ProdDestaque->valor, 2, ',', '.') }}</h5>
                <p class="card-text">{{$ProdDestaque->descricao}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          @endforeach
    

        

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
