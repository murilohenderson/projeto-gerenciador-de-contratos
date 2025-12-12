// resources/views/contratos/site.blade.php

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contrato - {{ $contrato->titulo }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Detalhes do Contrato: {{ $contrato->titulo }}</h1>
    </header>

    <main>
        <section class="informacoes-basicas">
            <h2>Informações Básicas</h2>
            <p><strong>Nº do Contrato:</strong> {{ $contrato->numero_contrato }}</p>
            <p><strong>Status:</strong> {{ $contrato->status }}</p>
            <p><strong>Data de Início:</strong> {{ \Carbon\Carbon::parse($contrato->data_inicio)->format('d/m/Y') }}</p>
            <p><strong>Data de Fim:</strong> {{ \Carbon\Carbon::parse($contrato->data_fim)->format('d/m/Y') }}</p>
        </section>

        <section class="descricao-completa">
            <h2>Descrição Detalhada</h2>
            <p>{{ $contrato->descricao }}</p>
        </section>

        {{-- Exemplo de como acessar um relacionamento (se você o carregou no Controller) --}}
        {{-- @if($contrato->cliente)
            <section class="informacoes-cliente">
                <h2>Cliente</h2>
                <p><strong>Nome:</strong> {{ $contrato->cliente->nome }}</p>
            </section>
        @endif --}}
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Seu Gerenciador de Contratos</p>
    </footer>
</body>
</html>