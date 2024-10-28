<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->enum("tipo", ["admin", "gestor"])->default("gestor");
            $table->integer("salario");
            $table->string("NIF");
            $table->unsignedBigInteger("id_agencia");
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_morada");            
            $table->foreign("id_agencia")->references("id")->on("agencias")->onDelete("cascade");
            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("id_morada")->references("id")->on("moradas")->onDelete("cascade");
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
        Schema::dropIfExists('funcionarios');
    }
}
