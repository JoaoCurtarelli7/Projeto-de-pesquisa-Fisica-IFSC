<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('aluno_id')->constrained('aluno');
            $table->date('data');
            $table->float('habilidade1')->nullable();
            $table->float('habilidade2')->nullable();
            $table->float('habilidade3')->nullable();
            $table->float('habilidade4')->nullable();
            $table->float('habilidade5')->nullable();
            $table->float('habilidade6')->nullable();
            $table->float('habilidade7')->nullable();
            $table->float('habilidade8')->nullable();
            $table->float('habilidade9')->nullable();
            $table->float('habilidade10')->nullable();
            $table->float('habilidade11')->nullable();
            $table->float('habilidade12')->nullable();
            $table->float('competencia1');
            $table->float('competencia2');
            $table->float('competencia3');
            $table->float('nota_final');
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
        Schema::dropIfExists('avaliacao');
    }
}
