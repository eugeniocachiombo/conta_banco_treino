<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->text("descricao");
            $table->decimal("quantia", 15, 2);
            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_conta");
            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("cascade");
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
        Schema::dropIfExists('emprestimos');
    }
}
