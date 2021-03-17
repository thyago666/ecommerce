<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';
    protected $fillable =['id','id_usuario','status','pagamento','vl_total','tipo_frete','vl_frete'];
}
