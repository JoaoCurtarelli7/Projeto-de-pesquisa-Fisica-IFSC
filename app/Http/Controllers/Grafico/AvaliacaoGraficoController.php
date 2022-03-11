<?php

namespace App\Http\Controllers\Grafico;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\AvaliacaoAluno;
use App\Models\VwAvaliacao;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Colors\RandomColor;
use function PHPUnit\Framework\isNull;

class AvaliacaoGraficoController extends Controller
{
    public function getGrafTempo($id)
    {
        $avaliacoes = AvaliacaoAluno::where('aluno_id', $id)->get();
        $dataAV = [];
        $nota_final = [];

        foreach ($avaliacoes as $item) {
            $dataAV[] = date('d/m/Y', strtotime($item->data));
            $nota_final[] = $item->nota_final;
        }
        $larapexChart = new LarapexChart;

        $chartTempo = $larapexChart->lineChart()
            ->setTitle('Desempenho ao longo do tempo')
            ->setSubtitle('Nota Final');

        $chartTempo->addData("Data", $nota_final);
        $chartTempo->setColors(['#ffc63b', '#ff6384']);
        $chartTempo->setXAxis($dataAV);
        $chartTempo->setGrid();

        return ["chartTempo" => $chartTempo];

    }

    public function getGraficosDelineamento($id)
    {
        $avaliacao = VwAvaliacao::where('aluno_id', $id)->orderBy('data')->get();
        $larapexChart = new LarapexChart;

        $chartDelineamento = $larapexChart->barChart()
            ->setTitle('C1 - Delineamento do problema');
        //    ->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');
        $itensColor = 0;

        foreach ($avaliacao as $item) {
            $data = date('d/m/Y', strtotime($item->data));

            $chartDelineamento->addData($item->tipo_resolucao . " - " . $data, [
                $item->habilidade1, $item->habilidade2,
                $item->habilidade3, $item->habilidade4,
                $item->habilidade5,
            ]);

            $itensColor += 1;
        }
        $itensColor = RandomColor::many($itensColor, array(
            'hue' => 'orange',
        ));
        $chartDelineamento->setXAxis(['Compreensão', 'Repres. gráfica', 'Listagem dados', 'Identif.incógnitas', 'Compat. unidades']);
        $chartDelineamento->setGrid();
        //  $chartResolucao->setDataLabels(true);
        // $chartResolucao->setColors($itensColor);

        return ["chartDelineamento" => $chartDelineamento];
    }

    public function getGraficosResolucao($id)
    {
        $avaliacao = VwAvaliacao::where('aluno_id', $id)->orderBy('data')->get();
        $larapexChart = new LarapexChart;

        $chartResolucao = $larapexChart->barChart()
            ->setTitle('C2 - Resolução do problema');
        //    ->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');
        $itensColor = 0;

        foreach ($avaliacao as $item) {
            $data = date('d/m/Y', strtotime($item->data));

            $chartResolucao->addData($item->tipo_resolucao . " - " . $data, [

                $item->habilidade6,
                $item->habilidade7,
                $item->habilidade8,
                $item->habilidade9,
            ]);

            $itensColor += 1;
        }
        $itensColor = RandomColor::many($itensColor, array(
            'hue' => 'orange',
        ));
        $chartResolucao->setXAxis(['Análise qualitativa', 'Equação definição', 'Sis. referência', 'Solução']);
        $chartResolucao->setGrid();
        //  $chartResolucao->setDataLabels(true);
        // $chartResolucao->setColors($itensColor);

        return ["chartResolucao" => $chartResolucao];
    }

    public function getGraficosAnalise($id)
    {
        $avaliacao = VwAvaliacao::where('aluno_id', $id)->orderBy('data')->get();
        $larapexChart = new LarapexChart;

        $chartAnalise = $larapexChart->barChart()->setTitle('C3 - Análise do resultado');
        $itensColor = 0;

        foreach ($avaliacao as $item) {
            $data = date('d/m/Y', strtotime($item->data));

            $chartAnalise->addData($item->tipo_resolucao . " - " . $data, [

                $item->habilidade10,
                $item->habilidade11,
                //   $item->habilidade12,
            ]);

            $itensColor += 1;
        }
        $itensColor = RandomColor::many($itensColor, array(
            'hue' => 'orange',
        ));
        $chartAnalise->setXAxis(['Análise crítiva do resultado', 'Registro dos pontos-chave']);
        $chartAnalise->setGrid();


        return ["chartAnalise" => $chartAnalise];
    }

    public function getGraficosDesempenhoIndividual($id)
    {

        $avaliacoes = AvaliacaoAluno::where('aluno_id', $id)->get();

        $itens = [];
        $soma = [];
        $divisor = [];
        foreach ($avaliacoes as $item) {

            $itens[0] = $item->habilidade1;
            $itens[1] = $item->habilidade2;
            $itens[2] = $item->habilidade3;
            $itens[3] = $item->habilidade4;
            $itens[4] = $item->habilidade5;
            $itens[5] = $item->habilidade6;
            $itens[6] = $item->habilidade7;
            $itens[7] = $item->habilidade8;
            $itens[8] = $item->habilidade9;
            $itens[9] = $item->habilidade10;
            $itens[10] = $item->habilidade11;
            //  $itens[11] = $item->habilidade12;
            $itens[12] = $item->competencia1;
            $itens[13] = $item->competencia2;
            $itens[14] = $item->competencia3;
        }
        for ($i = 0; $i <= 14; $i++) {
            if (!is_null($itens[$i])) {
                $soma[] += $itens[$i];
                $divisor[] += 1;
            }

            if ($divisor[$i] != 0 || !isNull($divisor[$i])) {
                $itens[$i] = $soma[$i] / $divisor[$i];
            } else {
                $itens[$i] = $soma[$i];
            }
        }

        $larapexChart = new LarapexChart;

        $chartMediasHab = $larapexChart->barChart()
            ->setTitle('Nota média por habilidade');
        //    ->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');
        $habArray = [];
        for ($i = 1; $i <= 11; $i++) {
            $habArray[] = $itens[$i];
        }
        $chartMediasHab->addData('Notas na Habilidade ', $habArray);
        $chartMediasHab->setXAxis(['H1', 'H2', 'H3', 'H4', 'H6', 'H7', 'H8', 'H9', 'H10', 'H11']);
        $chartMediasHab->setGrid();
        $chartMediasHab->setColors(['#ffc73c', '#f5746f']);

        $chartMediasComp = $larapexChart->barChart()
            ->setTitle('Médias do aluno por competência')
            ->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');

        $compArray = [];
        for ($i = 12; $i <= 14; $i++) {
            $compArray[] = $itens[$i];
        }
        $chartMediasComp->addData('Notas na Competência ', $compArray);
        //  $chartMediasComp->setColors(['#ffc63b', '#ff6384']);
        $chartMediasComp->setXAxis(['C1', 'C2', 'C3']);
        $chartMediasComp->setGrid();

        return ["chartMediasHab" => $chartMediasHab, "chartMediasComp" => $chartMediasComp];
    }

    public function getGraficosHabilidadeCompetencia($id)
    {
        $alunos = Aluno::where('id', $id)->get();

        $nfez = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null];
        $insuficiente = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null];
        $adequado = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null];
        $excelente = [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null];

        foreach ($alunos as $item) {
            $avaliacao = AvaliacaoAluno::where('aluno_id', $item->id)->get();

            foreach ($avaliacao as $prova) {

                $itens = [];

                $itens[1] = $prova->habilidade1;
                $itens[2] = $prova->habilidade2;
                $itens[3] = $prova->habilidade3;
                $itens[4] = $prova->habilidade4;
                $itens[5] = $prova->habilidade5;
                $itens[6] = $prova->habilidade6;
                $itens[7] = $prova->habilidade7;
                $itens[8] = $prova->habilidade8;
                $itens[9] = $prova->habilidade9;
                $itens[10] = $prova->habilidade10;
                $itens[11] = $prova->habilidade11;
                // $itens[12] = $prova->habilidade12;
                $itens[13] = $prova->competencia1;
                $itens[14] = $prova->competencia2;
                $itens[15] = $prova->competencia3;

                for ($i = 1; $i <= 15; $i++) {

                    if ($i <= 11) {
                        if ($itens[$i] >= 0 && $itens[$i] < 3 && is_numeric($itens[$i])) {
                            $nfez[$i] += 1;
                        } elseif ($itens[$i] >= 3 && $itens[$i] < 7 && is_numeric($itens[$i])) {
                            $insuficiente[$i] += 1;
                        } elseif ($itens[$i] >= 7 && $itens[$i] < 10 && is_numeric($itens[$i])) {
                            $adequado[$i] += 1;
                        } elseif ($itens[$i] == 10 && is_numeric($itens[$i])) {
                            $excelente[$i] += 1;
                        }
                    }
                    if ($i >= 13) {
                        if ($itens[$i] >= 0 && $itens[$i] < 30 && is_numeric($itens[$i])) {
                            $nfez[$i] += 1;
                        } elseif ($itens[$i] >= 30 && $itens[$i] < 70 && is_numeric($itens[$i])) {
                            $insuficiente[$i] += 1;
                        } elseif ($itens[$i] >= 70 && $itens[$i] < 100 && is_numeric($itens[$i])) {
                            $adequado[$i] += 1;
                        } elseif ($itens[$i] == 100 && is_numeric($itens[$i])) {
                            $excelente[$i] += 1;
                        }
                    }
                }
            }
        }

        $total = [];
        for ($i = 1; $i <= 15; $i++) {

            if (empty($nfez[$i]) && empty($insuficiente[$i]) && empty($adequado[$i]) && empty($excelente[$i])) {
                $total[$i] = null;
            } else {
                $total[$i] = $nfez[$i] + $insuficiente[$i] + $adequado[$i] + $excelente[$i];
            }

            if (empty($total[$i])) {
                $nfez[$i] == null;
                $insuficiente[$i] == null;
                $adequado[$i] == null;
                $excelente[$i] == null;
            } else {
                $nfez[$i] = $nfez[$i] * 100 / $total[$i];
                $insuficiente[$i] = $insuficiente[$i] * 100 / $total[$i];
                $adequado[$i] = $adequado[$i] * 100 / $total[$i];
                $excelente[$i] = $excelente[$i] * 100 / $total[$i];
            }
        }

        $larapexChart = new LarapexChart;

        $graficos = [];
        for ($i = 1; $i <= 15; $i++) {

            if ($i <= 12) {
                $label = 'Notas na Habilidade ' . $i;
            } else {
                $label = 'Notas na Competência ' . $i;
            }

            $graficos[$i] = $larapexChart->pieChart()
                ->setTitle($label)
                ->addData([$nfez[$i], $insuficiente[$i], $adequado[$i], $excelente[$i]])
                ->setLabels(['Não Fez', 'Insuficiente', 'Adequado', 'Excelente']);
        }

        return [
            'graficos' => $graficos,
        ];
    }
}
