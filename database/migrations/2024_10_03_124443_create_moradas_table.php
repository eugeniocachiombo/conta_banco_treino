<?php

use App\Models\Morada;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moradas', function (Blueprint $table) {
            $table->id();
            $table->string("provincia");
            $table->string("endereco");
            $table->timestamps();
        });

        $this->cadastrar("Luanda", "Talatona, Camama");
        $this->cadastrar("Luanda", "Cazenga, Filda");
        $this->cadastrar("Luanda", "São Paulo, Prédio dos livros");
        $this->cadastrar("Luanda", "Benfica, Sicomex");
    }

    public function cadastrar($provincia, $endereco){
        Morada::create([
            "provincia" => $provincia,
            "endereco" => $endereco
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moradas');
    }
}
