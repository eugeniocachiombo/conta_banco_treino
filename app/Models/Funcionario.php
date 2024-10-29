<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        "tipo",
        "salario",
        "NIF",
        "id_agencia",
        "id_usuario",
        "id_morada",
    ];
}
