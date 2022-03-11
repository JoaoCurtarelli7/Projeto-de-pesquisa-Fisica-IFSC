<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('curso_disciplina', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('curso');
            $table->foreignId('professor_id')->constrained('professor');
            $table->foreignId('disciplina_id')->constrained('disciplina');
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
        Schema::dropIfExists('curso_disciplinas');
    }
}
