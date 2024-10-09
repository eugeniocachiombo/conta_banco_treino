<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'telefone',
        'password',
        'id_acesso',
    ];

    public function buscarAcesso(){
        return $this->BelongsTo(Acesso::class, "id_acesso", "id");
    }

    public function buscarConta(){
        return $this->BelongsTo(Conta::class, "id", "id_usuario");
    }

    public function buscarEmprestimo($id){
        return Emprestimo::where("id_usuario", $id)->first();
    }

    public function buscarDadosPessoais(){
        return $this->BelongsTo(DadosPessoais::class, "id", "id_usuario");
    }

    public function buscarDadosPessoaisJoin(){
        return $this->BelongsTo(DadosPessoais::class, "id_usuario", "id_usuario");
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
