<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iZi - Cadastro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Icones Font Awesome - Account Eduardo Gomes -->
    <script src="https://kit.fontawesome.com/829d5c5582.js" crossorigin="anonymous"></script>

</head>
<body class="bg-dark">
    
    <div class="container" style="margin-top: 20px;">

        <div class="container">
            <div class="row justify-content-center" style="color: white; margin-bottom: -1.5rem;">
                <h1 class="display-1">iZi</h1>
            </div>
            <div class="row justify-content-center" style="color: white;">
                <h5>Orçamento fácil</h5>
            </div>
        </div>
        
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">

                <!-- CARD -->
                <div class="card mx-auto" style="width: 63%;">
                    <div class="card-header text-center">
                        Cadastre-se para ter acesso a todas as ferramentas<!--{{ __('Register') }}-->
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- CARD BODY -->
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6"> 
                                    <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sobrenome" class="col-md-4 col-form-label text-md-right">{{ __('Sobrenome') }}</label>

                                <div class="col-md-6"> 
                                    <input id="sobrenome" type="text" class="form-control @error('sobrenome') is-invalid @enderror" name="sobrenome" value="{{ old('sobrenome') }}" required autocomplete="sobrenome" autofocus>
                                    @error('sobrenome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-6"> 
                                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>
                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Mín. 8 caracteres" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <!-- END CARD BODY -->

                        <!-- CARD FOOTER -->
                        <div class="card-footer text-center" style="margin-top: -1rem;">
                            <button type="submit" class="btn btn-primary" style="width: 70%;">
                                Confirmar<!--{{ __('Register') }}-->
                            </button>
                        </div>
                        <!-- END CARD FOOTER -->

                    </form>
                
                </div>
                <!-- END CARD -->   
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row d-flex flex-row-reverse" style="color: white;">
            <a href="{{ url('/') }}" class="mr-4" style="color: white;" title="Voltar"><i class="fas fa-arrow-circle-left fa-3x"></i></a>
        </div>
    </div>
        

    

</body>
</html>