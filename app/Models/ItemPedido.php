<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ItemPedido extends Model
{
    protected $table = 'itens_pedido';
   protected $fillable =['id','id_pedido','id_produto','qtd','vl_unitario'];
}
