<?php

use App\Models\Acesso;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessos', function (Blueprint $table) {
            $table->id();
            $table->enum("tipo", ["admin", "gestor", "cliente"])->default("cliente");
            $table->timestamps();
        });

        Acesso::create(["tipo" => "admin"]);
        Acesso::create(["tipo" => "gestor"]);
        Acesso::create(["tipo" => "cliente"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acessos');
    }
}
