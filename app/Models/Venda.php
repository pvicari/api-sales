<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    //
    protected $fillable = [
        'valor', 'comissao', 'vendedor_id'
    ];

}
