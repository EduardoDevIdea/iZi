<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['dia', 'lembrete', 'alerta', 'user_id'];
}
