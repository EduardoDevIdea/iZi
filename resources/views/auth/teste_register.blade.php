<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iZi</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Icones Font Awesome - Account Eduardo Gomes -->
    <script src="https://kit.fontawesome.com/829d5c5582.js" crossorigin="anonymous"></script>

</head>
<body class="bg-dark">
    
    <div class="container" style="margin-top: 50px;">

        <div class="row justify-content-center">
            <p style=" font-size: 80px; color: white;">iZi</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-6" style="widht:">
                <div class="card">
                    <div class="card-header text-center">
                        Cadastre-se para ter acesso a todas as ferramentas<!--{{ __('Register') }}-->
                    </div>

                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group container-fluid">
                        <label for="name" style="margin-bottom: 1px;">{{ __('Nome') }}</label>
                        <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" style="width: 50%;" required autocomplete="nome" autofocus>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group container-fluid">
                        <label for="sobrenome" style="margin-bottom: 1px;">{{ __('Sobrenome') }}</label>
                        <input id="sobrenome" type="text" class="form-control @error('sobrenome') is-invalid @enderror" name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus>
                        @error('sobrenome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group container-fluid">
                        <label for="name" style="margin-bottom: 1px;">{{ __('Telefone') }}</label>
                        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}"  style="width: 50%" required autocomplete="telefone" autofocus>
                        @error('telefone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group container-fluid">
                        <label for="email" style="margin-bottom: 1px;">{{ __('E-Mail') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group container-fluid">
                        <label for="password" style="margin-bottom: 1px;">{{ __('Senha') }}</label>
                        <input id="password" type="password" class="form-control" name="password" style="width: 50%;" min="8" required autocomplete="new-password">
                        
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group container-fluid">
                        <label for="password-confirm" style="margin-bottom: 1px;">{{ __('Confirme a senha') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="width: 50%;" min="8" required autocomplete="new-password">
                    </div>
                </div>                

                <div class="form-row">
                    <div class="form-group mb-0 container-fluid text-center">
                        <button type="submit" class="btn btn-primary" style="width: 40%;">
                            Confirmar<!--{{ __('Register') }}-->
                        </button>
                    </div>
                </div>    

            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>