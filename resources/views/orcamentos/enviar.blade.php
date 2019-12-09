<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
    <h3> iZi - Orçamento </h3> <br>
        <table border="1">
            <tr>
                <td>
                    <strong>Cliente</strong> - {{ $c_nome }} {{ $c_sobrenome }}
                </td>
             </tr>
            <tr>
                 <td>
                    <strong>Descrição do serviço</strong> - {{ $titulo }}: {{ $descricao }}
                </td>
            </tr>
            <tr>
                <td>
                     <strong>Material</strong> - R$ {{ $material }},00
                 </td>
            </tr>
            <tr>
                <td>
                    <strong>Mão de obra</strong> - R$ {{ $valor }},00
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Serviço terceirizado</strong> - {{ $descservice }}
                </td>
            </tr>
            <tr>
                 <td>
                    <strong>Valor serviço terceirizado</strong> - R$ {{ $parceiro }},00 
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Prazo</strong> - {{ $prazo }} dias
                </td>
            </tr>
            <tr>
                 <td>
                    <strong>Total</strong> - R$ {{ $total }},00
                </td>
            </tr>
        </table>

        <br>

        <strong>Prestador de Serviço: </strong>{{ $u_nome }} {{$u_sobrenome}}
        <br>
        <strong>E-mail</strong>: {{ $u_email }}
        <br>
        <strong>Telefone</strong>: {{ $u_telefone }}

        <p><strong>Aguardo retorno. Obrigado!</p>
    </body>
</html>