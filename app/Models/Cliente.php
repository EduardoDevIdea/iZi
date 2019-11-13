<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //Sempre passar nesse $fillable os campos que serão  permitidos serem inseridos no banco de dados, senão dá o erro "Add [_token] to fillable property to allow mass assignmen"
    
    protected $fillable = [
        'nome', 'sobrenome', 'tipo', 'email', 'telefone', 'endereco', 'status', 'user_id'
    ];

}
