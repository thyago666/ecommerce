<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pedidos;
use App\Models\ItemPedido;
use App\Models\Produtos;
use App\Http\Controllers\PagamentoController;
use DB;

class CarrinhoController extends Controller
{
    

     public function __construct()
    {
        $this->middleware('auth');
    }


    public function InserirPedido(Request $Request, $idProduto)
    {
   
    $qtd=$Request->qtd;
    $valor_unitario=$Request->valor_unitario;
    $id_user=auth()->user()->id;
    $ultimoId = Session()->get('id');
    	if (Session()->exists('id'))
    	{
        $ItemPedido = new ItemPedido(['id_pedido'=>$ultimoId,'id_produto'=>$idProduto,'qtd'=>$qtd,'vl_unitario'=>$valor_unitario]);
        $ItemPedido->save();
       return redirect()->route('carrinho');
     	}
    	else
    	{
       $idPedido = Pedidos::where('status','Pendente')->where('pagamento',1)->where('id_usuario',$id_user)->first();

       if (!$idPedido){
			$pedido = new Pedidos(['id_usuario'=>$id_user,'status'=>'Pendente','pagamento'=>1,'vl_total'=>0,'tipo_frete'=>0,'vl_frete'=>0]);
     		$pedido->save();
     		$pedido->where('id')->orderBy('created_at', 'desc')->first();
	   		Session::put('id',$pedido->id); 
     		$ultimoId = Session()->get('id');
    		$ItemPedido = new ItemPedido(['id_pedido'=>$ultimoId,'id_produto'=>$idProduto,'qtd'=>$qtd,'vl_unitario'=>$valor_unitario]);
     		$ItemPedido->save();
     		return redirect()->route('carrinho');
      }
      else
      {
        $id = $idPedido->id;
        $ItemPedido = new ItemPedido(['id_pedido'=>$id,'id_produto'=>$idProduto,'qtd'=>$qtd,'vl_unitario'=>$valor_unitario]);
        $ItemPedido->save();
        return redirect()->route('carrinho');
      }
      }
   		}
  
  public function listar()
  {
    $idUser=auth()->user()->id;
      $itensCarrinhos = DB::select('select p.*, i.*,pd.id as id_pedido,ima.id as imagem,ima.extensao FROM produtos p, itens_pedido i, pedidos pd,imagens ima where p.id = ima.id_produto and p.id = i.id_produto and pd.id_usuario = ? and i.id_pedido = pd.id and pd.status = "Pendente"',[$idUser]);

      if(!$itensCarrinhos)
      {
          echo 'Carrinho Vazio';

      }
      else{
return view('carrinho',compact('itensCarrinhos'));

      }



  	
  }
  
  public function excluir($id)
  {
  	$produto = ItemPedido::find($id);
  	$produto->delete();
  	return redirect()->route('carrinho');

  }

  public function finalizar(Request $Request){

 //$ValorTotal = PagamentoController::enviaRequisicao($id_pedido);

     $totalGeral = 0;
      $id_pedido = $Request->id_pedido;
        $vl_frete = $Request->vl_frete;
          $tp_frete = $Request->tp_frete;

    
      $itensCarrinhos = DB::select('SELECT prod.valor, ite.qtd FROM produtos prod, itens_pedido ite WHERE ? = ite.id_pedido AND prod.id = ite.id_produto',[$id_pedido]);
      
        foreach($itensCarrinhos as $itensCarrinho)
        {
        $total = ($itensCarrinho->qtd * $itensCarrinho->valor); 
                $totalGeral = ($totalGeral + $total);
            }
        
           $totalGeral = number_format($totalGeral,2,'.','');
    $pedido = Pedidos::find($id_pedido);
    $pedido->status = 'Finalizado';
    $pedido->vl_total = $totalGeral;
    $pedido->vl_frete = $vl_frete;
    $pedido->tipo_frete = $tp_frete;
    $pedido->save();
    Session::forget('id');
      // return redirect()->route('pagamento');
    return view('pagamento',compact('id_pedido'));
  }
}
