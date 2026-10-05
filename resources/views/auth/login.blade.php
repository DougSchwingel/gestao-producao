@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <section class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">

        <h1 class="h3 text-center mb-4">Login</h1>

        <form action="/login" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Entrar
            </button>
        </form>

    </section>

    @if ($errors->any())
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div
                id="loginErrorToast"
                class="toast text-bg-danger border-0"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
            >
                <div class="d-flex">
                    <div class="toast-body">
                        E-mail ou senha inválidos.
                    </div>

                    <button
                        type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Fechar"
                    ></button>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toastElement = document.getElementById('loginErrorToast');

                const toast = new bootstrap.Toast(toastElement, {
                    delay: 4000
                });

                toast.show();
            });
        </script>
    @endif
@endsection