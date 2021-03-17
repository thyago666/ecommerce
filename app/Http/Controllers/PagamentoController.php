<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\ItemPedido;
use App\Models\Produtos;
use App\Models\Categorias;
use App\Models\Endereco;
use DB;

class PagamentoController extends Controller
{
    function enviaRequisicao($id_pedido){


    		//echo $id_pedido;
    		 //$totalGeral = 0;
			//$pedido = $pedido;

			/*
		
			$itensCarrinhos = DB::select('SELECT prod.valor, ite.qtd FROM produtos prod, itens_pedido ite WHERE ? = ite.id_pedido AND prod.id = ite.id_produto',[$pedido]);
			
			  foreach($itensCarrinhos as $itensCarrinho)
			  {
			  $total = ($itensCarrinho->qtd * $itensCarrinho->valor); 
                $totalGeral = ($totalGeral + $total);
            }
            */

            //$itensCarrinhos = DB::select('SELECT * FROM pedidos WHERE id = ?',[$pedido]);
			
        
          // $totalGeral = number_format($totalGeral,2,'.','');

            $itensCarrinhos = Pedidos::find($id_pedido);

             $totalProdutos = number_format($itensCarrinhos->vl_total,2,'.','');
             $totalFrete = number_format($itensCarrinhos->vl_frete,2,'.','');
             $totalGeral = ($totalProdutos + $totalFrete);
             $totalGeralFormatado = number_format($totalGeral,2,'.','');

                    
			$data['token'] = '19479A68D9D845B4B586A6ED8C4E0631';
			$data['email'] = 'tsb.666@hotmail.com';
			$data['currency'] = 'BRL';
			$data['itemId1'] = '1';
			$data['itemQuantity1'] = '1';
			$data['itemDescription1'] = 'Valor Total + Frete';
			$data['itemAmount1'] = $totalGeralFormatado;
			$data['reference'] = $id_pedido;

			$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';

			$data= http_build_query($data);
			$curl = curl_init($url);

			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			$xml = curl_exec($curl);
			curl_close($curl);
			$xml = simplexml_load_string($xml);
			$xml -> code;
			$codigo = $xml -> code;
		return redirect ('https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$codigo);
    }

    function notificacoes()
    {

    	$notificationCode = preg_replace('/[^[:alnum:]-]/','', $_POST["notificationCode"]);

$data['token'] = '19479A68D9D845B4B586A6ED8C4E0631';
$data['email'] = 'tsb.666@hotmail.com';

$data= http_build_query($data);

$url = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);
$reference = $xml->reference;
$status = $xml->status;

$alteraStatus = Pedidos::find($reference);
$alteraStatus->status = $status;
$alteraStatus->save();    	
    }

    	public function endereco($id_pedido)
    	{

    		 $Categorias = Categorias::all();
    		return view('endereco',compact('id_pedido','Categorias'));

    	}

    	public function gravaEndereco(Request $Request)
    	{

            
    

            $Request->validate([
                'endereco' => 'required',
                'numero' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'cep' => 'required',
                'telefone' => 'required',

            ]);

    

            
    		$id_pedido = $Request->id_pedido;
    		$cepDestino = $Request->cep;
    		$cepOrigem = 17800000;
    		$valorFreteSedex = 0;
    		$valorFretePac = 0;
    		$valor=0;

    		$endereco = new Endereco([
    			'id_pedido'=>$Request->id_pedido,
    			'endereco'=>$Request->endereco,
    			'numero'=>$Request->numero,
    			'bairro'=>$Request->bairro,
    			'cidade'=>$Request->cidade,
    			'estado'=>$Request->estado,
    			'cep'=>$Request->cep,
    			'telefone'=>$Request->telefone
    		]);
    		$endereco->save();

    		 $Categorias = Categorias::all();

    		
    		$dimensoes = DB::select ('SELECT prod.*, ite.qtd FROM produtos prod, itens_pedido ite WHERE ite.id_pedido = ? and prod.id = ite.id_produto',[$id_pedido]);

    


    		//abaixo calculo de frete

    		foreach($dimensoes as $dimensao)
    		{

    		 //$cepDestino = $Request->inputCep;
	         //$ProdutoDetalhes = Produtos::find($Request->idProduto);
    		
           $totalPeso = ($dimensao->peso * $dimensao->qtd);

           $peso = $totalPeso;
           //$peso = $ProdutoDetalhes->peso;
           $altura = $dimensao->altura;
           $largura = $dimensao->largura;
           $comprimento = $dimensao->comprimento;
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

        //var_dump($xmlSedex);

         //echo $codigo = $xmlPac->Codigo;

            $cServicoPac = $xmlPac->cServico;
            $valorFretePac = ($valorFretePac+$cServicoPac->Valor);
            $prazoEntregaPac = $cServicoPac->PrazoEntrega;
            $tipoFretePac = 'PAC';


            $cServicoSedex = $xmlSedex->cServico;
            $valorFreteSedex = ($valorFreteSedex+$cServicoSedex->Valor);
            $prazoEntregaSedex = $cServicoSedex->PrazoEntrega;
            $tipoFreteSedex = 'SEDEX';
        }

            
            return view('frete',compact('id_pedido','Categorias','valorFretePac','prazoEntregaPac','valorFreteSedex','prazoEntregaSedex'));
            

    	}




}
