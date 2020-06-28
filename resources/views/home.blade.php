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
<body>
    
    <!-- NAVBAR  -->
    <nav class="navbar navbar-expand-lg py-3 navbar-light bg-light">
        <a class="navbar-brand ml-4" href="#"> <b>iZi</b></a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-5">
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#sobre">Sobre</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">Pagamento</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#parceiros">Parceiros</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#contato">Contato</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-4">
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#entrar">Entrar</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="{{ url('/register') }}">Cadastre-se</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- FIM NAVBAR -->

    <!-- SEÇÃO RESUMO E ÁREA PARA LOGAR -->
    <section id="entrar" class="bg-dark text-white p-5">
        <div class="container">
            <div class="row p-5">

                <!--COLUNA 1-->
                <div class="col-6 text-center">
                    <h1 class="display-1">iZi</h1>
                    <h3>Orçamento fácil</h3>
                    <p>
                        Uma forma simples de fazer orçamentos <br>
                        Cadastre seus clientes <br>
                        Envie e gerencie seus orçamentos <br>
                    </p>
                </div>
                <!-- FIM COLUNA 1 -->

                <!-- COLUNA 2 -->
                <div class="col-6 text-center">

                    <!-- CARD -->
                    <div class="card text-dark">

                        <div class="card-header">
                            <h4>Acessar</h4>
                        </div>

                        <div class="card-body pb-4">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="container w-75 pb-2">
                                    <div class="row">
                                        Login
                                    </div>
                                    <div class="row pb-3">
                                        <input id="email" type="email" name="email" class="form-control rounded w-100 @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" placeholder="e-mail" autofocus required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        Senha
                                    </div>
                                    <div class="row pb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="row">
                                        <input type="submit" value="Entrar" class="btn btn-primary mx-auto w-50">
                                    </div>
                                </div>
                                <a href="">Esqueceu a senha?</a>
                            </form>
                    
                        </div>

                       <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ url('/register') }}" class="btn btn-outline-secondary">Cadastre-se</a>
                            </li>
                       </ul>
                       
                    </div>
                    <!-- FIM CARD -->

                </div>
                <!-- FIM COLUNA 2 -->
            </div>
        </div>
    </section>
    <!-- FIM SEÇÃO RESUMO E ÁREA PARA LOGAR -->

    <!-- SEÇAO SOBRE -->
    <section id="sobre" class="p-5">

        <div class="container">

            <div class="row">

                <div class="col text-justify">
                    <h1 class="p-4 text-center"><i class="far fa-lightbulb" style="font-size: 40px; margin-right: 10px"></i><strong>Sobre</strong></h1>
                    <h4> <strong> iZi - Orçamento Fácil </strong> é uma ferramenta para elaborar orçamentos com praticidade. <br><br>
                        Ela surgiu para que você possa, em um único sistema, cadastrar clientes,
                        fazer e enviar os orçamentos, receber pagamento e acompanhar os prazos dos serviços. <br><br>
                        Tenha em um único lugar o que você precisa para gerenciar orçamentos e os dados dos clientes.
                    </h4>
                </div>

                <div class="col text-center">
                    <div class="container">
                        <h1 class="p-4"><i class="fas fa-users" style="font-size: 50px; margin-right: 10px"></i><strong>Clientes</strong></h1>
                        <ul class="text-left">
                            <li><h4>Cadastre clientes</h4></li>
                            <li><h4>Envie orçamento para e-mail</h4></li>
                            <li><h4>Gerencie os dados dos clientes</h3></li>
                            <li><h4>Agende visitas</h4></li>
                            <li><h4>Os clientes podem pagar pelo site</h4></li>
                        </ul>
                    </div>
                </div>

                <div class="col text-center">
                    <div class="container">
                        <h1 class="p-4"><i class="far fa-file-alt" style="font-size: 50px; margin-right: 10px"></i><strong>Orçamentos</strong></h1>
                        <ul class="text-left">
                            <li><h4>Elabore orçamentos</h4></li>
                            <li><h4>Envie para o cliente</h4></li>
                            <li><h4>Imprima se quiser</h4></li>
                            <li><h4>Salve uma cópia no computador</h4></li>
                            <li><h4>Marque como aprovado ou reprovado</h4></li>
                            <li><h4>Gerencie os orçamentos</h4></li>
                            <li><h4>Acompanhe os prazos dos serviços</h4></li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- FIM SEÇAO SOBRE -->

    <!-- SEÇÃO PARCEIROS -->
    <section id="parceiros" class="p-5">

        <hr>

        <div class="container mw-100 pt-3">

            <div class="col text-center">
                <h2><strong>Seja nosso parceiro</strong></h2>
                <i class="far fa-handshake" style="font-size: 50px"></i><!-- Icone FontAwesome Maos Dadas -->
                <h5>
                    Seus produtos são utilizados por Microempreendedores, Prestadores de Serviços, 
                    Trabalhadores Autonomos? <br>
                    Anuncie seus produtos para eles. <br>
                    <a href="#">Saiba como</a> 
                </h5>
            </div>
    
        </div>

    </section>
    <!-- FIM SEÇÃO PARCEIROS -->

    <!-- SEÇÃO CONTATO -->
    <section id="contato" style="background-color: #D8D8D8">

        <div class="container pt-5 pb-2">

            <div class="row">

                <div class="col"></div>

                <div class="col text-center">

                    <!--DIV CONTATOS -->
                    <div class="text-center border border-dark rounded pt-1">
                        <h5><i class="fas fa-phone-alt" style="font-size: 25px; margin-right: 10px"></i>(71) 0000 - 0000</h5>
                        <h5><i class="fas fa-envelope" style="font-size: 25px; margin-right: 10px"></i>izi.websystem@gmail.com</h5>
                    </div>
                    <!-- FIM DIV CONTATOS-->

                    <br><i class="fas fa-map-marker-alt" style="font-size: 30px; margin-right: 10px"></i>
                    <h5>Salvador - Ba</h5>

                </div>

                <div class="col border border-dark">
                    <div class="container ">
                        <ul class="text-right">
                            <li>Sobre</li>
                            <li>Pagamento</li>
                            <li>Parceiro</li>
                            <li>Entrar</li>
                            <li>Cadastrar-se</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- FIM SEÇÃO CONTATO -->

    <!-- RODAPÉ -->
    <footer class="bg-dark p-4 text-center" style="color: white">
        <i class="far fa-copyright" style="margin-right: 5px"></i>2020 iZi - Orçamento Fácil. Todos os direitos reservados <br>
        Desenvolvido por Eduardo Gomes
    </footer>
    <!-- FIM RODAPÉ -->

</body>
</html>