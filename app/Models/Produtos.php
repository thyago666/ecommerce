<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\ItemPedido;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable =['id','id_categoria','nome','descricao','valor','ativo','capa','estoque','peso','altura','largura','comprimento'];
 }
