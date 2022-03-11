<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('matricula', function (Blueprint $table) {
            $table->id();
            $table->string('matricula', 45);
            $table->foreignId('curso_id')->constrained('curso');
            $table->foreignId('turma_id')->constrained('turma');
            $table->foreignId('aluno_id')->constrained('aluno');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
