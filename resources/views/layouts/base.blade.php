<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iZi - @yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Icones Font Awesome - Account Eduardo Gomes -->
    <script src="https://kit.fontawesome.com/829d5c5582.js" crossorigin="anonymous"></script>

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3" style="background-color: #F2F2F2">
        <a class="navbar-brand ml-4" href="{{ url('/index')}}">
            <img src="{{ asset('imagens/izimarcatransp.png') }}" class="rounded float-left" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-4">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black;">
                        Olá, {{ Auth::user()->nome }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">Ajustes</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar-->

    <!-- CONTENT -->
    @yield('content')
    
</body>
</html>