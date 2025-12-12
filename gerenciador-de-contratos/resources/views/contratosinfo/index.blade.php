<x-layout title="Detalhes do Contrato">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-5">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('contratos.index') }}">
                <i class="bi bi-file-earmark-text-fill me-2"></i>Gestão de Contratos
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('contratos.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Voltar
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        
        {{-- Cabeçalho da página de detalhes --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h2 fw-bold text-dark mb-0">Detalhes do Contrato</h2>
            
            {{-- Botões de Ação --}}
            <div class="btn-group">
                <a href="{{ route('contratos.edit', $contrato->id) }}" class="btn btn-outline-primary">
                    <i class="bi bi-pencil-square me-1"></i> Editar
                </a>
                
                {{-- Formulário de exclusão (opcional nesta tela) --}}
                <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" onsubmit="return confirm('Tem certeza?');" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ms-2">
                        <i class="bi bi-trash me-1"></i> Excluir
                    </button>
                </form>
            </div>
        </div>

        {{-- Card com as informações --}}
        <div class="card shadow-sm border-0 p-4">
            
            <div class="row">
                <div class="col-md-8">
                    <span class="badge bg-light text-secondary border mb-2">
                        <i class="bi bi-hash"></i> {{ $contrato->numero_contrato ?? 'S/N' }}
                    </span>
                    <h3 class="display-6 fw-bold text-primary mb-3">{{ $contrato->nome }}</h3>
                    
                    <h5 class="text-muted mt-4">Descrição</h5>
                    <p class="lead fs-6 text-break" style="white-space: pre-wrap;">{{ $contrato->descricao }}</p>
                </div>

                <div class="col-md-4 border-start ps-md-4">
                    <div class="card bg-light border-0 p-3 mb-3">
                        <small class="text-uppercase text-muted fw-bold">Valor do Contrato</small>
                        <div class="fs-3 fw-bold text-success">
                            R$ {{ number_format($contrato->valor, 2, ',', '.') }}
                        </div>
                    </div>

                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-calendar-check text-primary me-2"></i>
                            <span class="text-muted">Data de Assinatura:</span><br>
                            <strong>{{ date('d/m/Y', strtotime($contrato->data_assinatura)) }}</strong>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-calendar-event text-primary me-2"></i>
                            <span class="text-muted">Vigência até:</span><br>
                            <strong>{{ date('d/m/Y', strtotime($contrato->data_vigencia)) }}</strong>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-clock-history text-primary me-2"></i>
                            <span class="text-muted">Criado em:</span><br>
                            <small>{{ $contrato->created_at->format('d/m/Y H:i') }}</small>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-layout>