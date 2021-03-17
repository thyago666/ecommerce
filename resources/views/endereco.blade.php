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

 <h4>Informe abaixo o endereço de entrega</h4><br>

   @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
              </ul>
            </div>

            @endif
        <div class="row">

         

         <form method="post" action="{{url('endereco/post')}}">
            @csrf
            <input type="hidden" name="id_pedido" id="id_pedido" value="{{$id_pedido}}">
  <div class="form-row">


   <div class="form-group col-md-6">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="">
  </div>

     <div class="form-group col-md-2">
      <label for="numero">Número</label>
      <input type="text" class="form-control" id="numero" name="numero">
    </div>

      <div class="form-group col-md-4">
      <label for="bairro">Bairro</label>
      <input type="text" class="form-control" id="bairro" name="bairro">
    </div>


  </div>

 
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade">
    </div>
    <div class="form-group col-md-4">
      <label for="estado">Estado</label>
      <select id="estado" name="estado" class="form-control">
        <option value="SP">SP</option>
        <option value="PR">PR</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" id="cep" name="cep">
    </div>
  </div>

    <div class="form-row">


   <div class="form-group col-md-6">
    <label for="telefone">Telefone</label>
    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="">
  </div>

     

    


  </div>
 
  <button type="submit" class="btn btn-primary">Seguir</button>

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



























