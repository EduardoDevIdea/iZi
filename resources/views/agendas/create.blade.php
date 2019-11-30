@extends('layouts.app')

@section('title', 'Agendamento')

@section('content')

    <div class="container">

    @if(session('agenda'))
        <script>
            window.alert( "{{ session('agenda') }}" );
        </script>
    @endif

    <h2>Agendamento de visita</h2><br><br>

        <form action="{{ route('agendas.store') }}" method="POST"> 
            @csrf

            <table>
                <tr>
                    <td>
                        <strong><h4>Lembrete </h4></strong><textarea name="lembrete" placeholder="Motivo e local da visita"></textarea>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>Dia da visita: </strong><input type="date" name="dia"> <!-- Ver maneira de restringir data para no mínimo a data de hoje-->
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>Lembrar em: </strong> <input type="date" name="alerta"> <!-- Ver maneira de restringir data para no mínimo a data de hoje-->
                    </td>
                </tr>
            </table>

            <br>

            <p><input type="submit" value="Salvar"></p>

        </form>

        <p><strong><a href="/list_agenda">Listar agendamentos</a></strong></p>

        <p> <strong> <a href="{{ url('/index') }}"> Home </a> </strong> </p>


    </div>

@endsection