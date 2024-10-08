<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->integer("num_conta")->unique();
            $table->enum("tipo", ["corrente", "salario"])->default("corrente");
            $table->enum("estado", ["activo", "inactivo", "bloqueado", "cancelado"])->default("activo");
            $table->decimal("saldo", 15, 2)->nullable();
            $table->unsignedBigInteger("id_usuario")->nullable();
            $table->foreign('id_usuario')->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('contas');
    }
}
