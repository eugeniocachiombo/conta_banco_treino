<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        "tipo",
        "salario",
        "NIF",
        "id_usuario",
        "id_morada",
    ];
}
