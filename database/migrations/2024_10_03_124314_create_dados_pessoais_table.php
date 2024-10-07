<?php

use App\Models\Conta;
use App\Models\DadosPessoais;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateDadosPessoaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_pessoais', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("sobrenome");
            $table->date("nascimento");
            $table->enum("genero", ["M", "F"]);
            $table->string("nacionalidade")->nullable();
            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
        $this->cadastrarAutomatico();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados_pessoais');
    }

    public function cadastrarAutomatico()
    {
        $admin = User::create([
            'name' => "conta_admin",
            'email' => "contaadmin@gmail.com",
            'telefone' => "911111111",
            'password' => Hash::make("123456"),
            'id_acesso' => 1,
        ]);

        DadosPessoais::create([
            'nome' => "Eugénio",
            'sobrenome' => "Cachiombo",
            'nascimento' => "1999-04-27",
            'genero' => 'M',
            'nacionalidade' => 'angola',
            'id_usuario' => $admin->id,
        ]);

        Conta::create([
            'num_conta' => 123412341,
            'saldo' => 1000000.68,
            'id_usuario' => $admin->id,
        ]);

        Conta::create([
            'num_conta' => 123412342,
            'saldo' => 500000.70,
            'tipo' => "salario",
            'estado' => "inactivo",
            'id_usuario' => $admin->id,
        ]);

        $gestor = User::create([
            'name' => "conta_gestor",
            'email' => "contagestor@gmail.com",
            'telefone' => "922222222",
            'password' => Hash::make("123456"),
            'id_acesso' => 2,
        ]);

        DadosPessoais::create([
            'nome' => "Conta",
            'sobrenome' => "Gestor",
            'nascimento' => "1980-04-04",
            'nacionalidade' => 'angola',
            'id_usuario' => $gestor->id,
        ]);

        Conta::create([
            'num_conta' => 123412343,
            'saldo' => 200000.33,
            'id_usuario' => $gestor->id,
        ]);
    }
}
