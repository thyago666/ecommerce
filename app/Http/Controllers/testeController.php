<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testeController extends Controller
{
    
	 function teste(){
    $itensCarrinhos = DB::select('SELECT * FROM produtos');

     foreach($itensCarrinhos as $itensCarrinho)
     {

     	echo $itensCarrinho->nome;


     }
}
}
