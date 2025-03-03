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
        "nif",
        "id_agencia",
        "id_usuario",
        "id_morada",
    ];

    public function buscarUsuario(){
        return $this->BelongsTo(User::class, "id_usuario", "id");
    }

    public function buscarMorada(){
        return $this->BelongsTo(Morada::class, "id_morada", "id");
    }

    public function buscarAgencia(){
        return $this->BelongsTo(Agencia::class, "id_agencia", "id");
    }
}
