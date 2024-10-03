<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosPessoais extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'sobrenome',
        'nascimento',
        'genero',
        'nacionalidade',
        'id_usuario',
    ];
}
