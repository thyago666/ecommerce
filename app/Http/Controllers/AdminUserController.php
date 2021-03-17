<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;

class AdminUserController extends Controller
{
   
	 public function __construct()
    {
        $this->middleware('auth');

        }


   public function HomeAdmin()
    {
    	$user_id = auth()->user()->id;


    	$pedidos = Pedidos::where('id_usuario',$user_id)->get();
    	return view('adminUser',compact('pedidos'));

    }

}
