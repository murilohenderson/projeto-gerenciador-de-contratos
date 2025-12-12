<x-layout title="Novo Contrato">
    
    {{-- A navegação (navbar) deve estar fora da tag <x-layout> se for um componente padrão, 
         ou então dentro do componente, mas a estrutura fornecida não a inclui. --}}

    <div class="container py-5">

        <h2 class="mb-4 text-primary">
            {{ isset($contrato) ? 'Editar Contrato' : 'Novo Contrato' }}
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
                    <option value="ativo" @isset($contrato) {{ $contrato->status == 'ativo' ? 'selected' : '' }} @else selected @endisset>Ativo</option>
                    <option value="em_andamento" @isset($contrato) {{ $contrato->status == 'em_andamento' ? 'selected' : '' }} @endisset>Em Andamento</option>
                    <option value="pendente" @isset($contrato) {{ $contrato->status == 'pendente' ? 'selected' : '' }} @endisset>Pendente/Rascunho</option>
                    <option value="suspenso" @isset($contrato) {{ $contrato->status == 'suspenso' ? 'selected' : '' }} @endisset>Suspenso</option>
                    <option value="encerrado" @isset($contrato) {{ $contrato->status == 'encerrado' ? 'selected' : '' }} @endisset>Encerrado</option>
                    <option value="cancelado" @isset($contrato) {{ $contrato->status == 'cancelado' ? 'selected' : '' }} @endisset>Cancelado</option>
                </select>
            </div>

            <hr>

            <div class="col-12 text-end mt-4">
                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
                <span class="me-2"></span>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> {{ isset($contrato) ? 'Salvar Alterações' : 'Salvar Contrato' }}
                </button>
            </div>
        </form>
    </div>
</x-layout>