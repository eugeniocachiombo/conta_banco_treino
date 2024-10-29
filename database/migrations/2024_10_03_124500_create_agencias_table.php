<?php

use App\Models\Agencia;
use App\Models\Morada;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            $table->id();
            $table->string("num_indent");
            $table->unsignedBigInteger("localizacao");
            $table->foreign("localizacao")->references("id")->on("moradas")->onDelete("cascade");
            $table->timestamps();
        });

        $totalMoradas = count(Morada::all());

        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
        $this->cadastrar(rand(00000,12345).chr(rand(65,90)).chr(rand(65,90)).chr(rand(65,90)), rand(1, $totalMoradas));
    }

    public function cadastrar($provincia, $endereco){
        Agencia::create([
            "num_indent" => $provincia,
            "localizacao" => $endereco
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencias');
    }
}
