<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('email',80);
            $table->string('contato',20);
         //   $table->foreignId('disc_id')->constrained('disciplina');
            $table->string('titulacao',50);
            $table->string('formacao',50);
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
        Schema::dropIfExists('professor');
    }
}
