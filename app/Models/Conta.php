<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_conta',
        'tipo',
        'estado',
        'saldo',
        'id_usuario',
    ];
}
