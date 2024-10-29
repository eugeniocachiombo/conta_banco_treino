<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->enum("tipo", ["fisico", "juridico"])->default("fisico");
            $table->decimal("salario", 15, 2);
            $table->string("nif");
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_morada");            
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
        Schema::dropIfExists('clientes');
    }
}
