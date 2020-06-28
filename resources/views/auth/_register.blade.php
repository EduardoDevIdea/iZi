<!-- Modal disparada quando clica em "Cadastrar-se" na view home -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">

    <!-- Modal Content -->
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"> Cadastre-se e tenha acesso a todas as ferramentas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body w-100">
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
    <!-- End Modal Content -->

    </div>
</div>
<!-- Fim Modal -->