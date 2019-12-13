<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $fillable = [
        'venda_id', 'produto_id', 'quantidade', 'valorUnitario'
    ];
}
