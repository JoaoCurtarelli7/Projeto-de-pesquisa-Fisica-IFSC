<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->string('tipo', 80)->nullable()->before('nome');
            $table->date('data_inicio')->nullable()->before('tipo');
            $table->date('data_fim')->nullable()->before('data_inicio');
            $table->foreignId('escola_id')->nullable()->before('data_fim')->constrained('escolas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curso', function (Blueprint $table) {
            //
        });
    }
}
