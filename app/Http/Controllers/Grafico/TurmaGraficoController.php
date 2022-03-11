<?php

namespace App\Http\Controllers\Grafico;

use App\Http\Controllers\Controller;
use App\Models\VwAvaliacao;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Colors\RandomColor;

class TurmaGraficoController extends Controller
{

    public function getDataGraficosDelineamentoColetivo($id, $avaliacao_id)
    {
        $avaliacao = VwAvaliacao::where('turma_id', $id)->where('avaliacao_id', $avaliacao_id)->orderBy('data')->get();

        $larapexChart = new LarapexChart();
        $chart = $larapexChart->barChart()
            ->setTitle('C1 - Denineamento do problema');
        //->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');
        $itensColor = 0;

        $nfez = [NULL, NULL, NULL, NULL, NULL];
        $insuficiente = [NULL, NULL, NULL, NULL, NULL];
        $adequado = [NULL, NULL, NULL, NULL, NULL];
        $excelente = [NULL, NULL, NULL, NULL, NULL];

        foreach ($avaliacao as $item) {

            $itens = [];

            $itens[] = $item->habilidade1;
            $itens[] = $item->habilidade2;
            $itens[] = $item->habilidade3;
            $itens[] = $item->habilidade4;
            $itens[] = $item->habilidade5;
            for ($i = 0; $i < count($itens); $i++) {

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
        }

        $chart->addData("Não fez", $nfez);
        $chart->addData("Insuficiente", $insuficiente);
        $chart->addData("Adequado", $adequado);
        $chart->addData("Excelente", $excelente);

        $itensColor = RandomColor::many($itensColor, array(
            'hue' => 'orange'
        ));
        $chart->setXAxis(['Compreensão', 'Repres. gráfica', 'Listagem dados', 'Identif.incógnitas', 'Compat. unidades']);
        $chart->setGrid();
        //  $chart->setMarkers($itensColor , 7, 10);
        $chart->setDataLabels(true);
        $chart->setColors(['#ff455f', '#feb019', '#00e396', '#008ffb']);

        return ["chartDelineamentoColetivo" => $chart];
    }

    public function getDataGraficosResolucaodoproblema($id, $avaliacao_id)
    {
        $avaliacao = VwAvaliacao::where('turma_id', $id)->where('avaliacao_id', $avaliacao_id)->orderBy('data')->get();
        $larapexChart = new LarapexChart();
        $chart = $larapexChart->barChart()
            ->setTitle('C2 - Resolução do problema');
        //->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');
        $itensColor = 0;

        $nfez = [NULL, NULL, NULL, NULL, NULL];
        $insuficiente = [NULL, NULL, NULL, NULL, NULL];
        $adequado = [NULL, NULL, NULL, NULL, NULL];
        $excelente = [NULL, NULL, NULL, NULL, NULL];

        foreach ($avaliacao as $item) {

            $itens = [];


            $itens[] = $item->habilidade6;
            $itens[] = $item->habilidade7;
            $itens[] = $item->habilidade8;
            $itens[] = $item->habilidade9;

            for ($i = 0; $i < count($itens); $i++) {

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
        }

        $chart->addData("Não fez", $nfez);
        $chart->addData("Insuficiente", $insuficiente);
        $chart->addData("Adequado", $adequado);
        $chart->addData("Excelente", $excelente);

        $itensColor = RandomColor::many($itensColor, array(
            'hue' => 'orange'
        ));
        $chart->setXAxis(['Análise qualitativa', 'Equação definição', 'Sis. referência', 'Solução']);
        $chart->setGrid();
        //  $chart->setMarkers($itensColor , 7, 10);
        $chart->setDataLabels(true);
        $chart->setColors(['#ff455f', '#feb019', '#00e396', '#008ffb']);

        return ["chartResolucaodoproblema" => $chart];
    }

    public function getDataGraficosAnalisedoresultado($id, $avaliacao_id)
    {
        $avaliacao = VwAvaliacao::where('turma_id', $id)->where('avaliacao_id', $avaliacao_id)->orderBy('data')->get();
        $larapexChart = new LarapexChart();
        $chart = $larapexChart->barChart()
            ->setTitle('C3 - Análise do resultado');
        //->setSubtitle('Notas "Não se aplica" não entram no cálculo da média do aluno');
        $itensColor = 0;

        $nfez = [NULL, NULL, NULL, NULL, NULL];
        $insuficiente = [NULL, NULL, NULL, NULL, NULL];
        $adequado = [NULL, NULL, NULL, NULL, NULL];
        $excelente = [NULL, NULL, NULL, NULL, NULL];

        foreach ($avaliacao as $item) {

            $itens = [];

            $itens[] = $item->habilidade10;
            $itens[] = $item->habilidade11;
            //   $itens[] = $item->habilidade12;

            for ($i = 0; $i < count($itens); $i++) {

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
        }

        $chart->addData("Não fez", $nfez);
        $chart->addData("Insuficiente", $insuficiente);
        $chart->addData("Adequado", $adequado);
        $chart->addData("Excelente", $excelente);

        $itensColor = RandomColor::many($itensColor, array(
            'hue' => 'orange'
        ));
        $chart->setXAxis(['Análise crítiva do resultado', 'Registro dos pontos-chave']);
        $chart->setGrid();
        //  $chart->setMarkers($itensColor , 7, 10);
        $chart->setDataLabels(true);
        $chart->setColors(['#ff455f', '#feb019', '#00e396', '#008ffb']);

        return ["chartAnalisedoresultado" => $chart];
    }

    public function getDataGraficoTurmaBoxPlot($id, $avaliacao_id)
    {
        $avaliacao = VwAvaliacao::where('turma_id', $id)->where('avaliacao_id', $avaliacao_id)->orderBy('data', 'ASC')->get();

        $c1 = [];
        $c2 = [];
        $c3 = [];

        foreach ($avaliacao as $item) {
            $c1[] = $item->c1;
            $c2[] = $item->c2;
            $c3[] = $item->c3;
        }
        sort($c1);
        sort($c2);
        sort($c3);

        $c1_Outlier = max($c1);
        $c2_Outlier = max($c2);
        $c3_Outlier = max($c3);

        $competencias = ['c1' => $c1, 'c2' => $c2, 'c3' => $c3, 'c1_Outlier' => $c1_Outlier, 'c2_Outlier' => $c2_Outlier, 'c3_Outlier' => $c3_Outlier];

        return ["competenciasBoxPlot" => $competencias];
    }
}
