<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório Professor Disciplina</title>

    <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
<h1>Professor: {{ $professor_nome }}</h1>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Disciplina</th>
    </tr>
    </thead>
    <tbody>
    @forelse($disciplinas ?? '' as $key => $itens)
        <tr>
            <th scope='row'>{{ ( $key +1 ) }}</th>
            <td>{{ $itens }}</td>
        </tr>
    @empty
        <tr>
            <th scope='row'>Nenhum existem nenhum registro para esta consulta.</th>
    @endforelse
    </tbody>
</table>
<h5>Página 1</h5>
<div class="page-break"></div>
</body>
</html>
