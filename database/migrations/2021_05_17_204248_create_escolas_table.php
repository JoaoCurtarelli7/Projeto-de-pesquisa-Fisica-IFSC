<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cep', 12);
            $table->string('telefone', 20);
            $table->string('rua', 12)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('email', 100);
            $table->string('cnpj', 18);
            $table->string('sigla', 20);
            $table->foreignId('municipio_id')->constrained('municipios')->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('tipo', 100);
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
        Schema::dropIfExists('escolas');
    }
}
