@extends('layouts.app')

@section('content')
<div class="container">

<!DOCTYPE html>
<html lang="en">



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

      

        <div class="row">


               
          <div class="col-lg-9 col-md-9 mb-9">

            @foreach($ProdutoDetalhes as $ProdutoDetalhe)
          
              <a href="#"><img class="card-img-top" src="{{asset("images/products/$ProdutoDetalhe->imagem.$ProdutoDetalhe->extensao")}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{$ProdutoDetalhe->nome}}</a>
                </h4>
               <h5>{{'R$ '.number_format($ProdutoDetalhe->valor, 2, ',', '.') }}</h5>

              <a href="{{url("/cep/$ProdutoDetalhe->id")}}"><img src="{{asset('images/correios.png')}}" class="img-thumbnail" width="100px"></a>
          


           



<!--https://api.whatsapp.com/send?phone=5511958373026-->



 <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Quantidade</label>
  </div>
  <form method="post" action="{{url("/insert/{$ProdutoDetalhe->id}")}}">
  
     @csrf
  <select class="custom-select" id="qtd" name="qtd">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</div>


      <input type="hidden" name="valor_unitario" value="{{$ProdutoDetalhe->valor}}">          
</p>


                <h3 class="text-white bg-dark">Descrição do Produto</h3>
                <p class="card-text">{{$ProdutoDetalhe->descricao}}</p>
              </div>


              <div class="card-footer">
        
              <button type="button" class="btn btn-primary">Voltar</button>
              <button type="submit" class="btn btn-primary">Comprar</button>
              </div>
           
          </div>
        </form>


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
