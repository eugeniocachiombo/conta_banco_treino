<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'descricao',
        'quantia',
        'id_usuario',
        'id_conta',
    ];
}
