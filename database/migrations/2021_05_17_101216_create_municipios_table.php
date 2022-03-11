<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_ibge')->nullable();
            $table->string('nome', 100);
            $table->float('latitude', 10)->nullable();
            $table->float('longitude', 10)->nullable();
            $table->boolean('capital')->nullable();
            $table->foreignId('estado_id')->constrained('estados');
            $table->softDeletes();
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
        Schema::dropIfExists('municipios');
    }
}
