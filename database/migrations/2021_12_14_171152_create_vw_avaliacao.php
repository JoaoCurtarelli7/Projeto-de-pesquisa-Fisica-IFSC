<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVwAvaliacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW vw_avaliacao AS
                      SELECT
                            aa.id,
                            aa.aluno_id,
                            al.nome,
                            aa.`data`,
                            a.turma_id,
                            a.id as avaliacao_id,
                            a.titulo as avaliacao_titulo,
                            t.nome as turma_nome,
                            aa.tipo_resolucao,
                            aa.nota_final,
                            aa.habilidade1,
                            aa.habilidade2,
                            aa.habilidade3,
                            aa.habilidade4,
                            aa.habilidade5,
                            aa.habilidade6,
                            aa.habilidade7,
                            aa.habilidade8,
                            aa.habilidade9,
                            aa.habilidade10,
                            aa.habilidade11,
                            aa.habilidade12,
                            aa.competencia1 AS c1,
                            aa.competencia2 AS c2,
                            aa.competencia3 AS c3
                            FROM avaliacao_aluno aa
                                inner join aluno al on al.id = aa.aluno_id
                                inner join avaliacao a on a.id = aa.avaliacao_id
                                inner join turma t on t.id = a.turma_id
                            order by aa.`data`;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW vw_avaliacao");
    }
}
