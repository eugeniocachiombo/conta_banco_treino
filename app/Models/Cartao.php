<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    use HasFactory;

    protected $fillable = [
        "numero",
        "codigo_seguranca",
        "tipo",
        "validade",
        "emissao",
        "estado",
        "id_conta",
    ];
}
