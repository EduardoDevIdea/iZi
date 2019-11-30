<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable = [
        'user_id','cliente_id', 'titulo', 'descricao', 'prazo', 'valor', 'status', 'inicio', 'servico'
    ];

}
