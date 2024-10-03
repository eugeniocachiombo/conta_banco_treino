<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartaos', function (Blueprint $table) {
            $table->id();
            $table->integer("numero");
            $table->integer("codigo_seguranca");
            $table->enum("tipo", ["credito", "pagamento"])->default("pagamento");
            $table->date("validade");
            $table->date("emissao");
            $table->enum("estado", ["activo", "inactivo", "bloqueado", "cancelado", "expirado"])->default("activo");
            $table->unsignedBigInteger("id_conta");
            $table->foreign("id_conta")->references("id")->on("contas")->onDelete("cascade");
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
        Schema::dropIfExists('cartaos');
    }
}
