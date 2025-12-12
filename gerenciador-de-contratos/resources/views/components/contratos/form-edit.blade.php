<x-layout title="Editar Contrato">

    <div class="container py-5">

        <h2 class="mb-4 text-primary">
            Editar Contrato Nº {{ $contrato->numero_contrato }}
        </h2>

        <form action="{{ $action }}" method="POST" class="row g-3 bg-white shadow-sm p-4 rounded">
            @csrf

            @isset($contrato)
            @method('PUT')
            @endisset

            <div class="col-md-6">
                <label for="nome" class="form-label">Nome do Contrato</label>
                <input type="text" name="nome" id="nome" required class="form-control" placeholder="Ex: Contrato de Prestação de Serviços" value="{{ $contrato->nome ?? '' }}">
            </div>

            <div class="col-md-6">
                <label for="numero_contrato" class="form-label">Número do Contrato</label>
                <input type="text" name="numero_contrato" id="numero_contrato" class="form-control" placeholder="Ex: CTR 05/25" value="{{ $contrato->numero_contrato ?? '' }}">
            </div>

            <div class="col-12 mb-3">
                <label for="valor" class="form-label">Valor do Contrato (R$)</label>
                <input type="number" name="valor" id="valor" required class="form-control" step="0.01" placeholder="Ex: 1500.00" value="{{ $contrato->valor ?? '' }}">
            </div>

            <hr>

            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4" required class="form-control" placeholder="Detalhes do objeto do contrato...">{{ $contrato->descricao ?? "" }}</textarea>
            </div>

            <div class="col-md-4">
                <label for="data_assinatura" class="form-label">Data de assinatura</label>
                <input type="date" name="data_assinatura" id="data_assinatura" required class="form-control" value="{{ $contrato->data_assinatura ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="data_vigencia" class="form-label">Data de vigência</label>
                <input type="date" name="data_vigencia" id="data_vigencia" required class="form-control" value="{{ $contrato->data_vigencia ?? '' }}">
            </div>

            <div class="col-md-4 mb-4">
                <label for="status" class="form-label">Status do Contrato</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="" disabled>Selecione o status...</option>

                    <option value="ativo" {{ ($contrato->status ?? '') == 'ativo' ? 'selected' : '' }}>Ativo</option>

                    <option value="em_andamento" {{ ($contrato->status ?? '') == 'em_andamento' ? 'selected' : '' }}>Em Andamento</option>

                    <option value="pendente" {{ ($contrato->status ?? '') == 'pendente' ? 'selected' : '' }}>Pendente/Rascunho</option>

                    <option value="suspenso" {{ ($contrato->status ?? '') == 'suspenso' ? 'selected' : '' }}>Suspenso</option>

                    <option value="encerrado" {{ ($contrato->status ?? '') == 'encerrado' ? 'selected' : '' }}>Encerrado</option>

                    <option value="cancelado" {{ ($contrato->status ?? '') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>

                    <option value="rascunho" {{ ($contrato->status ?? '') == 'rascunho' ? 'selected' : '' }}>Rascunho</option>
                </select>
            </div>

            <hr>

            <div class="col-12 text-end mt-4">
                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
                <span class="me-2"></span>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Salvar Contrato
                </button>
            </div>
        </form>
    </div>
</x-layout>