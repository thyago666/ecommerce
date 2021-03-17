<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Categorias;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
            public function index(){
            $Categorias = Categorias::all();
   $ProdDestaques = DB::select('SELECT prod.*, ima.id as imagem, ima.extensao FROM produtos prod, imagens ima WHERE prod.id = ima.id_produto and prod.capa = "S" ');
            //$ProdDestaques = Produtos::where('capa',true)->get();
           return view('home', compact('ProdDestaques','Categorias'));
    }

    public function detalhes($id){
        $params = 1;
        $Categorias = Categorias::all();
       // $ProdutoDetalhes = Produtos::find($id);
        $ProdutoDetalhes = DB::select('SELECT prod.*, ima.id as imagem, ima.extensao FROM produtos prod, imagens ima WHERE prod.id = ima.id_produto and prod.id = ?',[$id]);

       // $val = HomeController::calculaFrete('17780000');
       // $valor = $val->Valor;
       // $tipo = $val->Codigo;

        //var_dump($id);


        return view('detalhes',compact('Categorias','ProdutoDetalhes','params'));

    }

    public function pesquisaProdutos(Request $Request)
    {
        $descricao=$Request->pesquisa;
        $Categorias = Categorias::all();
        //$psqProdutos = DB::table('produtos')->where('nome', 'like', "%$descricao%")->get();

         $psqProdutos = DB::select("SELECT prod.*, ima.id as imagem, ima.extensao FROM produtos prod, imagens ima WHERE prod.ativo = 'S' and prod.id = ima.id_produto and prod.nome like '%".$descricao."%' ");

      return view('pesquisa',compact('psqProdutos','Categorias'));

    }

    public function pesquisaCategoria($id_categoria)
    {

         $Categorias = Categorias::all();
          $psqCategorias = DB::select('SELECT prod.*, ima.id as imagem, ima.extensao FROM produtos prod, imagens ima WHERE prod.id = ima.id_produto and prod.id_categoria = ?',[$id_categoria]);
         //$psqCategorias = BD::select('SELECT * FROM produtos WHERE id_categoria = ?',[$id_categoria]);
         //$psqCategorias = DB::table('produtos')->where('id_categoria', '=', "$id_categoria")->get();
         return view('categoria',compact('psqCategorias','Categorias'));
    }


    public function viewCep($idProduto)
    {

        $ProdutoDetalhes = Produtos::find($idProduto);
         $Categorias = Categorias::all();
         $params=1;
        return view('valorFrete',compact('ProdutoDetalhes','Categorias','params'));

    }

    public function calculaFrete(Request $Request,
        
        //$cepDestino='$Request->inputCep',
       // $cepDestino='17780000',
         $cepOrigem='17800000',
       // $peso=2.5,
        $valor=0
       // $tipoFrete='41106'
       // $altura=6,
        //$largura=20,
        //$comprimento=20

    )
    {
        

          
       // $cepDestino = 13425010;
         $cepDestino = $Request->inputCep;
         

           $ProdutoDetalhes = Produtos::find($Request->idProduto);
           $totalPeso = ($ProdutoDetalhes->peso * $Request->qtd);

           $peso = $totalPeso;
           //$peso = $ProdutoDetalhes->peso;
           $altura = $ProdutoDetalhes->altura;
           $largura = $ProdutoDetalhes->largura;
           $comprimento = $ProdutoDetalhes->comprimento;
           $tipoFretePac = 41106;
           $tipoFreteSedex = 40010;


        $urlPac = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $urlPac .= "nCdEmpresa=";
        $urlPac .= "&sDsSenha=";
        $urlPac .= "&sCepOrigem=".$cepOrigem;
        $urlPac .= "&sCepDestino=".$cepDestino;
        $urlPac .= "&nVlPeso=".$peso;
        $urlPac .= "&nVlLargura=".$largura;
        $urlPac .= "&nVlAltura=".$altura;
        $urlPac .= "&nCdFormato=1";
        $urlPac .= "&nVlComprimento=".$comprimento;
        $urlPac .= "&sCdMaoPropria=n";
        $urlPac .= "&nVlValorDeclarado=".$valor;
        $urlPac .= "&sCdAvisoRecebimento=n";
        $urlPac .= "&nCdServico=".$tipoFretePac;
        $urlPac .= "&nVlDiametro=0";
        $urlPac .= "&StrRetorno=xml";

        //sedex

         $urlSedex = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $urlSedex .= "nCdEmpresa=";
        $urlSedex .= "&sDsSenha=";
        $urlSedex .= "&sCepOrigem=".$cepOrigem;
        $urlSedex .= "&sCepDestino=".$cepDestino;
        $urlSedex .= "&nVlPeso=".$peso;
        $urlSedex .= "&nVlLargura=".$largura;
        $urlSedex .= "&nVlAltura=".$altura;
        $urlSedex .= "&nCdFormato=1";
        $urlSedex .= "&nVlComprimento=".$comprimento;
        $urlSedex .= "&sCdMaoPropria=n";
        $urlSedex .= "&nVlValorDeclarado=".$valor;
        $urlSedex .= "&sCdAvisoRecebimento=n";
        $urlSedex .= "&nCdServico=".$tipoFreteSedex;
        $urlSedex .= "&nVlDiametro=0";
        $urlSedex .= "&StrRetorno=xml";

       $xmlPac = simplexml_load_file($urlPac);
         $xmlSedex = simplexml_load_file($urlSedex);
       //return $xml->cServico;

            $cServicoPac = $xmlPac->cServico;
            $valorFretePac = $cServicoPac->Valor;
            $prazoEntregaPac = $cServicoPac->PrazoEntrega;
            $tipoFretePac = 'PAC';


            $cServicoSedex = $xmlSedex->cServico;
            $valorFreteSedex = $cServicoSedex->Valor;
            $prazoEntregaSedex = $cServicoSedex->PrazoEntrega;
            $tipoFreteSedex = 'SEDEX';
             
              $Categorias = Categorias::all();
              $params = 2;
        
       // $val = HomeController::calculaFrete('17780000');
       // $valor = $val->Valor;
       // $tipo = $val->Codigo;

       // var_dump($val);


        return view('valorFrete',compact('Categorias','ProdutoDetalhes','valorFretePac','params','prazoEntregaPac','valorFreteSedex','prazoEntregaSedex','tipoFreteSedex','tipoFretePac'));
}

      public function sobre()
      {

        return view('sobre');

      }



}