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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!--topo-->
   
        <!-- End Topo -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        
          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-12">
                <div class="card-header py-12">
                  <!--<h6 class="m-0 font-weight-bold text-primary">Pacientes</h6>-->
                </div>

              
                <div class="card-body">
                  
       

             
                          <!-- DataTales Example -->
                           
                          
                                      <div class="media">
                                    <img src="{{asset('images/logo.png')}}" class="mr-6" width="150">
                                    <div class="media-body">
                                      <h5 class="mt-0"><b>Tonho Art's</b></h5>
                                      <h6 class="mt-0"><b>Pinturas em tinta óleo, esculturas em madeiras, carrancas etc</b></h6>
                          Al. Central, Nº 1, Bairro: Centro Adamantina - SP CEP: 17800-000<p>
                                          <b>ANTÔNIO BOMFIM</b> (00)0000-0000
                                      </div>
                                  </div>

                                                                                                                
                                         <p class="lead">
                                         	@foreach($pedidos as $pedido)
                                            <h3>PEDIDO: Nº  {{$pedido->id_pedido}}</h3>
                                            <b>Data:</b> {{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')}}<p>
                                        <b>Cliente: </b> {{$pedido->name}}<p>
                                     
                                     <b>Endereço: </b> {{$pedido->endereco}} <b>Nº: </b>{{$pedido->numero}}
                                     <b>Bairro: </b>{{$pedido->bairro}}<p>
                                      @php
                                      $telefone = '(' . substr($pedido->telefone, 0, 2) . ')' . substr($pedido->telefone, 2, 5) . '-' . substr($pedido->telefone, 7);;
                                      @endphp

                                     <b>Telefone: </b>{{$telefone}} <b>E-mail:</b> {{$pedido->email}}<p>
                                     <b>Cidade: </b>{{$pedido->cidade}} <b>UF: </b>{{$pedido->estado}} <b>CEP: </b>{{$pedido->cep}}
                                  		@endforeach
                                            </br>
                                            </br>

                                         <b> Observações :</b> </br>
                                        </p>
                                         </br>
                          
                                            <h3>PRODUTOS</h3>
                                              <table class="table">
                                              <thead>
                                                <tr>
                                                
                                                  <th scope="col">Código</th>
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
												      <td>{{$produto->valor}}</td>
												    </tr>
												   </tbody>
												   @endforeach

                                           @php
                                            $total = ($produto->vl_total + $produto->vl_frete);
                                            @endphp   
                                                   <td><h2>Total Produtos + Frete</h2><h4><font color="red">{{'R$ '.number_format($total, 2, ',', '.') }}</font></h4></td>

                                          </table>
                 

                                  
                     
                              
                               
         
                </div>
             </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
   
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->




</body>

</html>
@endsection
