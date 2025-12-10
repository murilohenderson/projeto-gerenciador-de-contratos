<x-layout title="Entrar">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-10">

                <h2 class="mb-4 text-primary text-center">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Acesso ao Sistema
                </h2>

                <form action="{{ route('login') }}" method="post" class="bg-white shadow-lg p-4 rounded-3 border">
                    @csrf

                    <p class="text-secondary text-center mb-4">
                        Preencha seus dados para entrar.
                    </p>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" required class="form-control" placeholder="seu@email.com" value="{{ old('email') }}" autofocus>
                        </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" required class="form-control" placeholder="********" autocomplete="current-password">
                        </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Lembrar-me
                        </label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Entrar
                        </button>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-1">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Esqueceu sua senha?</a>
                        </p>
                        <p>
                            Não tem uma conta? 
                            <a href="{{ route('register') }}" class="text-decoration-none">Cadastre-se</a>
                        </p>
                    </div>

                </form>
                </div>
        </div>
    </div>
</x-layout>