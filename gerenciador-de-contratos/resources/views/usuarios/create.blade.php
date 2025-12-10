<x-layout title="Novo Usuário">

    <div class="container py-5">

        <h2 class="mb-4 text-primary">
            <i class="bi bi-person-plus-fill me-2"></i>Novo Usuário
        </h2>

        <form action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" method="post" class="row g-3 bg-white shadow-sm p-4 rounded">
            @csrf

            @isset($usuario)
                @method('PUT')
            @endisset

            <h5 class="text-secondary mb-0 border-bottom pb-2">Dados Pessoais</h5>

            <div class="col-md-6">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" name="nome" id="nome" required class="form-control" placeholder="Ex: João da Silva" value="{{ $usuario->name ?? '' }}">
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" required class="form-control" placeholder="Ex: joao@empresa.com" value="{{ $usuario->email ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="000.000.000-00" maxlength="14" value="{{ $usuario->cpf ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="telefone" class="form-label">Telefone / Celular</label>
                <input type="tel" name="telefone" id="telefone" class="form-control" placeholder="(00) 00000-0000" value="{{ $usuario->telefone ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $usuario->data_nascimento ?? '' }}">
            </div>

            <h5 class="text-secondary mb-0 border-bottom pb-2 mt-4">Endereço</h5>

            <div class="col-md-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" name="cep" id="cep" class="form-control" placeholder="00000-000" value="{{ $usuario->cep ?? '' }}">
            </div>

            <div class="col-md-7">
                <label for="logradouro" class="form-label">Rua / Logradouro</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Ex: Av. Paulista" value="{{ $usuario->logradouro ?? '' }}">
            </div>

            <div class="col-md-2">
                <label for="numero" class="form-label">Número</label>
                <input type="text" name="numero" id="numero" class="form-control" placeholder="123" value="{{ $usuario->numero ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" name="bairro" id="bairro" class="form-control" value="{{ $usuario->bairro ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="{{ $usuario->cidade ?? '' }}">
            </div>

            <div class="col-md-4">
                <label for="estado" class="form-label">Estado (UF)</label>
                <select name="estado" id="estado" class="form-select">
                    <option value="" selected disabled>Selecione...</option>
                    <option value="CE" {{ (isset($usuario) && $usuario->estado == 'CE') ? 'selected' : '' }}>Ceará</option>
                    <option value="PA" {{ (isset($usuario) && $usuario->estado == 'PA') ? 'selected' : '' }}>Pará</option>
                    <option value="SP" {{ (isset($usuario) && $usuario->estado == 'SP') ? 'selected' : '' }}>São Paulo</option>
                    <option value="RJ" {{ (isset($usuario) && $usuario->estado == 'RJ') ? 'selected' : '' }}>Rio de Janeiro</option>
                    <option value="MG" {{ (isset($usuario) && $usuario->estado == 'MG') ? 'selected' : '' }}>Minas Gerais</option>
                </select>
            </div>

            <h5 class="text-secondary mb-0 border-bottom pb-2 mt-4">Segurança</h5>

            <div class="col-md-6">
                <label for="password" class="form-label">Senha {{ isset($usuario) ? '(Deixe em branco para manter)' : '' }}</label>
                <input type="password" name="password" id="password" {{ isset($usuario) ? '' : 'required' }} class="form-control" autocomplete="new-password">
            </div>

            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" {{ isset($usuario) ? '' : 'required' }} class="form-control" autocomplete="new-password">
            </div>

            <hr class="mt-4">

            <div class="col-12 text-end">
                <a href="{{ route('contratos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
                <span class="me-2"></span>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-2"></i> Salvar Usuário
                </button>
            </div>
        </form>
    </div>
</x-layout>