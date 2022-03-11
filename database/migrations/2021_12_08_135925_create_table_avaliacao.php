<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAvaliacao extends Migration
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
            $table->string('titulo', 80);
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->foreignId('disciplina_id')->constrained('disciplina');
            $table->foreignId('turma_id')->constrained('turma');
            $table->text('instrucoes', 150)->nullable();
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
        Schema::table('avaliacao_aluno', function (Blueprint $table) {
            //
        });
    }
}
