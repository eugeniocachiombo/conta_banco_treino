<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->unsignedBigInteger("id_usuario");
            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
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
}
