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
          
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
     
                </h4>


               
  <form method="post" action="{{url("/cep")}}" id="form1" name="form1">
               @csrf

               <input type="hidden" name="idProduto" id="idProduto" value="{{$ProdutoDetalhes->id}}">

      
 <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Informe o CEP" aria-label="Recipient's username" aria-describedby="basic-addon2" name="inputCep" id="inputCep">
  <div class="input-group-append">

    <button class="btn btn-outline-secondary" type="submit">CEP</button>

    </div>

  </div>
<p>
<p>
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Quantidade</label>
  </div>
 
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
</form>
@if($params == 2)


@if($tipoFretePac == 'PAC')
<div class="alert alert-success" role="alert">
  PAC<br>
 Valor: R$ {{$valorFretePac}}<br>
Prazo de Entrega: {{$prazoEntregaPac}} dias.
</div>
@endif

@if($tipoFreteSedex == 'SEDEX')
<div class="alert alert-success" role="alert">
  SEDEX<br>
 Valor: R$ {{$valorFreteSedex}}<br>
Prazo de Entrega: {{$prazoEntregaSedex}} dias.
</div>
@endif
@endif
                
</p>


              
              </div>
              <div class="card-footer">
            
               <button type="submit" class="btn btn-light"><a href="{{url("detalhes/$ProdutoDetalhes->id")}}">Voltar</a></button>
       
     
              </div>
           
          </div>
    




  

        

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
