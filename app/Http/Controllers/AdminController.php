<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Produtos;
use App\Models\Imagens;
use App\Models\Pedidos;
use DB;

class AdminController extends Controller
{
    
   public function __construct()
    {
        $this->middleware('auth');

        }

    public function homeAdmin()
    {

        if (Gate::allows('administrador'))
        {
   	return view('admin');
   }
   else
   {
    echo 'Você não esta autorizado';
   }
    }

    public function viewProdutos()
    {
    	
         if (Gate::allows('administrador'))
        {
        $categorias = Categorias::all();
        $produtos = Produtos::all();
        
        return view('produtos',compact('categorias','produtos'));
         }
        else
           {
            echo 'Você não esta autorizado';
           }
    }

    public function updateViewProduto($id_produto)
    {


         if (Gate::allows('administrador'))
        {
        $categorias = Categorias::all();
        $produtos = Produtos::find($id_produto);
        $params = 'up';

          return view('cadastroProdutos',compact('categorias','produtos','params'));
         }
        else
           {
            echo 'Você não esta autorizado';
           }
    }

    public function updateProdutos(Request $Request)
    {
          if (Gate::allows('administrador'))
        {
        $produtos = Produtos::find($Request->id_produto);
        $produtos->id_categoria = $Request->categoria;
        $produtos->nome = $Request->produto;
        $produtos->descricao = $Request->descricao;
        $produtos->valor = $Request->valor;
        $produtos->ativo = $Request->ativo;
        $produtos->capa = $Request->capa;
        $produtos->estoque = $Request->estoque;
        $produtos->peso = $Request->peso;
        $produtos->altura = $Request->altura;
        $produtos->largura = $Request->largura;
        $produtos->comprimento = $Request->comprimento;
        $produtos->save();
         $categorias = Categorias::all();
        $produtos = Produtos::all();
         return view('produtos',compact('categorias','produtos'));
      }else{

         echo 'Você não esta autorizado';
      }

    }

     public function cadProdutos()
    {
      
         if (Gate::allows('administrador'))
        {
        $categorias = Categorias::all();
        $produtos = Produtos::all();
         $params = 'cad';
        return view('cadastroProdutos',compact('categorias','produtos','params'));
         }
        else
           {
            echo 'Você não esta autorizado';
           }
    }

    public function psqProdutos(Request $Request)
    {
        if (Gate::allows('administrador'))
        {
        $psq = $Request->psq;
        $opcao = $Request->opcao;
        $categorias = Categorias::all();

        if($opcao == 1)
        {
           $produtos = DB::select('select * from produtos where id = ?',[$psq]);
        }
         elseif($opcao == 2)
         {
           $produtos = DB::select("select * from produtos where nome like '%".$psq."%' ");
            }

        return view('produtos',compact('categorias','produtos'));
    }
    else{
        echo 'Você não esta autorizado';        
    }

       }

    public function gravarProdutos(Request $Request)
    {
       	

         if (Gate::allows('administrador'))
        {


        $id_categoria = $Request->categoria;	
    	$nome = $Request->produto;
        $descricao = $Request->descricao;
    	$valor = $Request->valor;
        $ativo = $Request->ativo;
        $capa = $Request->capa;
    	$estoque = $Request->estoque;
    	$peso = $Request->peso;
    	$altura = $Request->altura;
    	$largura = $Request->largura;
    	$comprimento = $Request->comprimento;
    
    	$produtos = new Produtos(['id_categoria'=>$id_categoria,'nome'=>$nome,'descricao'=>$descricao,'valor'=>$valor,'ativo'=>$ativo,'capa'=>$capa,'estoque'=>$estoque,'peso'=>$peso,'altura'=>$altura,'largura'=>$largura,'comprimento'=>$comprimento]);

    	$produtos->save();
        return redirect ("/admin/produtos");

    }else{
        echo 'Você não esta autorizado';

    }
       }

       public function formImage($id_produto)
       {
           
              if (Gate::allows('administrador'))
        {
           $produto = Produtos::find($id_produto);

           $imagens = DB::select("SELECT ima.*
         FROM imagens ima
          WHERE ? = ima.id_produto",[$id_produto]);

           return view('imagem',compact('produto','imagens'));
       }
       else{
         echo 'Você não esta autorizado';        
       }
       }

       public function gravaImagem(Request $Request)
       {
        
                  if (Gate::allows('administrador'))
        {

        if($Request->file('imagem')->isValid())
        {
            $extensao = $Request->imagem->extension();
            $id_produto = $Request->id_produto;
            $imagem = new Imagens(['id_produto'=>$id_produto,'extensao'=>$extensao]);
            $imagem->save();
            $id_imagem = Imagens::orderBy('created_at', 'desc')->first();
            $nameFile = $id_imagem->id. '.' .$Request->imagem->extension();
            $Request->file('imagem')->storeAs('products',$nameFile);
           return(AdminController::formImage($id_produto));

        }

    }else{
        echo 'Você não esta autorizado'; 

       } 
    }


    public function Categorias()
    {

        if (Gate::allows('administrador'))
        {

       $categorias = Categorias::all();
       return view('categoriasAdmin',compact('categorias'));
     }else{
      echo 'Você não esta autorizado';
     }
    }

    public function formCategorias()
    {

      return view('cadastroCategoria');

    }

    public function gravaCategorias(Request $Request)
    {

         if (Gate::allows('administrador'))
        {
           $nomeCategoria = $Request->categoria; 

           $categoria = new Categorias(['descricao'=>$nomeCategoria]);
           $categoria->save();

            return redirect ("/admin/categorias");
          }else{
              echo 'Você não esta autorizado'; 
          }

    }

    public function updateFormCategorias($id_categoria)
    {
      
      $categoria = Categorias::find($id_categoria);
      return view('cadastroCategoria',compact('categoria'));

    }

    public function updateCategorias(Request $Request)
    {

          $categoria = Categorias::find($Request->id_categoria);
          $categoria->descricao=$Request->categoria;
          $categoria->save();
           $categorias = Categorias::all();
          return view('categoriasAdmin',compact('categorias'));
    }

    public function pedidosLoja()
    {


        $pedidos = DB::select("SELECT user.*, ende.*, ped.*
         FROM pedidos ped, users user, endereco ende
          WHERE ende.id_pedido = ped.id and user.id = ped.id_usuario and ped.pagamento = ? ORDER BY ped.created_at DESC ",[1]);
     
        
          
          

      return view('adminPedidos',compact('pedidos'));
    }

    public function exibeprodutosModal(Request $Request)
    {

      $id_pedido = $Request->id_pedido;
    $produtos = DB::select("SELECT prod.*, ped.*, ped.id as id_pedido, itens.*
         FROM pedidos ped, produtos prod, itens_pedido itens
  WHERE prod.id=itens.id_produto AND ped.id=itens.id_pedido and ped.pagamento = 1 and ped.id = ?",[$id_pedido]);

      
   //echo $id_pedido;
      return view('produtosPedido',compact('produtos'));
    }

    public function imprimePedido(Request $Request)
    {
     
      $id_pedido = $Request->id_pedido; 

       $pedidos = DB::select("SELECT user.*, ende.*, ped.*
         FROM pedidos ped, users user, endereco ende
          WHERE ende.id_pedido = ped.id and user.id = ped.id_usuario and ped.pagamento = 1 and ped.id=?",[$id_pedido]);


       $produtos = DB::select("SELECT prod.*, ped.*, ped.id as id_pedido, itens.*
         FROM pedidos ped, produtos prod, itens_pedido itens
  WHERE prod.id=itens.id_produto AND ped.id=itens.id_pedido and ped.pagamento = 1 and ped.id = ?",[$id_pedido]); 

       return view('imprimePedido',compact('pedidos','produtos'));
    }

    public function telephone($number){
    $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
    // primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, insere o hifem, e o ultimo pega apenas o 4 ultimos digitos
    return $number;
}

}
