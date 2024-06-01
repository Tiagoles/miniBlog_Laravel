<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <title>MiniBlog - {{ $title }}</title>

</head>

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show w-full h-18 text-center bg-rose-600 py-10 hideMessages">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('success'))
    <div id="successMessage"
        class="alert alert-success alert-dismissible fade show w-full text-center py-10 hideMessages" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('logoutMsg'))
    <div class="w-full h-18 text-center py-10 hideMessages alert alert-success alert-dismissible fade show">
        {{ session('logoutMsg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<body data-bs-theme="dark">
    <nav>
        @if (Auth::check())
            @php
                $user = Auth::user();
            @endphp
            <div class="d-flex justify-content-end">
                @include('components.moonAndEye')
                <div class="btn-group" id="container-dopdrown-profile">
                    <button type="button" class="btn dropdown-toggle-split " data-bs-toggle="dropdown"
                        aria-expanded="false" id="button-dropdown-bottom-get">
                        @if (empty($user->photo_profile))
                            <img src="{{ asset('/img/icons/posts/do-utilizador.png') }}" alt="Foto de perfil">
                        @else
                            <img src="{{ asset("storage/img/profile_photos/{$user->photo_profile}") }}"
                                alt="Foto de perfil">
                        @endif
                        <span class="visually-hidden"></span>
                    </button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('app.home') }}">Início</a></li>
                        <li><a class="dropdown-item" href="{{ route('app.about') }}">Sobre</a></li>
                        <li><a class="dropdown-item" href="{{ route('edit.user') }}">Perfil</a></li>
                        <li>
                            <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#addPosteUpdate">
                                Adicionar publicação
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout.user') }}">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        @elseif (Auth::guest())
            <ul class="nav d-flex justify-content-end">
                @include('components.moonAndEye')
                <li class="nav-item rounded-md px-2 my-2 mx-1">
                    <a class="nav-link" href="{{ route('/') }}">Início</a>
                </li>
                <li class="nav-item rounded-md px-2 my-2 mx-1 ">
                    <a class="nav-link" href="{{ route('login.view') }}">Entrar</a>
                </li>
                <li class="nav-item rounded-md px-2 my-2 mx-1 ">
                    <a class="nav-link" href="{{ route('register.view') }}">Registrar</a>
                </li>
            </ul>
        @endif
    </nav>
    @include('components.modalAddpostAndUpdate')
