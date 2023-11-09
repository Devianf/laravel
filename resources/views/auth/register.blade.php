@extends('layouts.auth_app')
<!doctype html>
<html lang="en">

<head>
    <title>Register HBA</title>
    <!-- Meta tags requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/hba_mini_ico.jpg') }}">


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/estilos.css')}}">

</head>

<body>

<section class="h-100" style="background-image: url('assets/degradate2.jpg'); background-size: cover; background-repeat: no-repeat;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{asset('assets/logo2.png')}}" style="width: 300px;" alt="logo">
                                        <br>
                                        <br>
                                        <h3 class="mt-1 mb-5 pb-1"><strong>Registrarse</strong></h3>
                                    </div>

                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <h5 style="color: gray; margin-top: -20px;">Ingresa los siguientes datos:</h5>

                                        <div class="form-outline mb-4">
                                            <label for="name" class="form-label"><strong>{{ __('Nombre:') }}</strong></label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Ingresa tu nombre completo" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="email" class="form-label"><strong>{{ __('Correo:') }}</strong></label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Ingresa tu correo" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password" class="form-label"><strong>{{ __('Contraseña:') }}</strong></label>

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ingresa tu contraseña" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password-confirm" class="form-label"><strong>{{ __('Confirmar Contraseña:') }}</strong></label>

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">
                                                    {{ __('Registrarse') }}
                                                </button>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Ir a Login</p>
                                            <a href="{{route('login')}}" class="btn btn-outline-danger">Login</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div style="display: flex; justify-content: center; align-items: flex-start; height: 420px; margin-left: 20px;">
                                    <img src="{{ asset('assets/hba.jpg') }}" alt="Acerca de Nosotros" style="width:400%; max-width: 400px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>