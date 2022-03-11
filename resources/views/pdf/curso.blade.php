<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Relatório Cursos</title>

    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h2 scope='row'>Relatório Cursos</h2>
    <ul>
        @forelse ($cursos as $item )
            <ul>{{ $item->id }} - {{ $item->nome }}</ul>
        @empty
        <li scope='row'>Nenhum existem nenhum registro para esta consulta.</li>
        @endforelse
    </ul>

</body>

</html>
