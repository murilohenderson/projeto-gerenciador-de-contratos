<x-layout title="Contratos">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm mb-5">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('contratos.index') }}">
                <i class="bi bi-file-earmark-text-fill me-2"></i>Gestão de Contratos
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-outline-secondar" aria-current="page" href="{{ route('contratos.index') }}">Início</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    <a href="{{-- route('usuarios.login') --}}" class="btn btn-outline-secondary">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                    </a>
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                        Cadastre-se
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container"> @session('mensagem.sucesso')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('mensagem.sucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endsession

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h2 fw-bold text-dark mb-0">Listagem de Contratos</h2>
            <a href="{{ route('contratos.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i> Adicionar Novo
            </a>
        </div>

        <div class="card shadow-sm border-0">

            <ul class="list-group list-group-flush rounded">
                @forelse ($contratos as $contrato)
                <li class="list-group-item list-group-item-action p-4">

                    <div class="d-flex justify-content-between align-items-start">
                        <div class="me-4 flex-grow-1">

                            <span class="badge bg-light text-secondary border mb-2">
                                <i class="bi bi-hash"></i> {{ $contrato->numero_contrato ?? 'S/N' }}
                            </span>
                            <a href="{{ route('contratosinfo.index', $contrato) }}">
                                <h3 class="h5 mb-2 text-dark fw-bold">{{ $contrato->nome }}</h3>
                            </a>
                            <div class="text-secondary small mb-3 text-break lh-sm">
                                {{ Str::limit($contrato->descricao, 150) }}
                            </div>

                            <div class="badge bg-success bg-opacity-10 text-success border border-success fw-normal px-3 py-2">
                                Valor: <span class="fw-bold">R$ {{ number_format($contrato->valor, 2, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-end flex-shrink-0 ms-2 border-start ps-4">

                            <div class="text-end small text-secondary mb-3">
                                <p class="mb-1">
                                    <span class="text-muted">Vigência:</span> <br>
                                    <strong class="text-dark">{{ date('d/m/Y', strtotime($contrato->data_vigencia)) }}</strong>
                                </p>
                                <p class="mb-0">
                                    <span class="text-muted">Assinatura:</span> <br>
                                    <strong class="text-dark">{{ date('d/m/Y', strtotime($contrato->data_assinatura)) }}</strong>
                                </p>
                            </div>

                            <div class="btn-group shadow-sm" role="group">
                                <a href="{{ route('contratos.edit', $contrato->id) }}"
                                    class="btn btn-sm btn-outline-primary"
                                    title="Editar Contrato">
                                    <i class="bi bi-pencil-square">Editar</i>
                                </a>
                                <form action="{{ route('contratos.destroy', $contrato) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este contrato?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Excluir Contrato">
                                        <i class="bi bi-trash">Excluir</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                {{-- Conteúdo a ser exibido SE o array $contratos estiver vazio --}}
                <div class="card-body py-5 text-center text-muted">
                    <i class="bi bi-folder-x display-4 mb-3 d-block"></i>
                    <p class="h5">Nenhum contrato cadastrado ainda.</p>
                    <p class="small">Comece adicionando um novo contrato ao sistema.</p>
                </div>
                @endforelse
            </ul>

        </div>
    </div>
</x-layout>