<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAvaliacaoAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('avaliacao_aluno', function (Blueprint $table) {
            $table->foreignId('avaliacao_id')->nullable()->constrained('avaliacao_aluno')->before("aluno_id");
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
