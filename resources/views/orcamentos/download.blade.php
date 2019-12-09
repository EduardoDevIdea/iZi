
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h3> iZi - Orçamento </h3> <br>
            <table border="1">
                <tr>
                    <td>
                        <strong>Cliente</strong> - {{ $orcamento->c_nome }} {{ $orcamento->c_sobrenome }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Descrição do serviço</strong> - {{ $orcamento->titulo }}: {{ $orcamento->descricao }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Material</strong> - R$ {{ $orcamento->material }},00
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Mão de obra</strong> - R$ {{ $orcamento->valor }},00
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Serviço terceirizado</strong> - {{ $orcamento->descservice }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Valor serviço terceirizado</strong> - R$ {{ $orcamento->parceiro }},00 
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Prazo</strong> - {{ $orcamento->prazo }} dias
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Total</strong> - R$ {{ $orcamento->total }},00
                    </td>
                </tr>
            </table>

            <br>

            <strong>Prestador de Serviço: </strong>{{ $orcamento->u_nome }} {{$orcamento->u_sobrenome}}
            <br>
            <strong>E-mail</strong>: {{ $orcamento->u_email }}
            <br>
            <strong>Telefone</strong>: {{ $orcamento->u_telefone }}

            <p><strong>Aguardo retorno. Obrigado!</p>
    </div>

</body>
</html>
    