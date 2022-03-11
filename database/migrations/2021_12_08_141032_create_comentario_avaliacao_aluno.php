<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioAvaliacaoAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_avaliacao_aluno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avaliacao_aluno_id')->constrained('avaliacao_aluno');
            $table->text('texto', 500);
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
        Schema::dropIfExists('comentario_avaliacao_aluno');
    }
}
