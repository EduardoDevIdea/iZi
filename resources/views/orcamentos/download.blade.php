
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
                
                <p><strong>Cliente</strong> - {{ $orcamento->c_nome }} {{ $orcamento->c_sobrenome }}</p>

                <p><strong>Descrição de serviço</strong> - {{ $orcamento->titulo }}: {{ $orcamento->descricao }}</p>

                <p><strong>Serviço terceirizado</strong> - R${{ $orcamento->parceiro }},00: {{ $orcamento->descservice }}</p>

                <p><strong>Mão de obra</strong> - R${{ $orcamento->valor }},00</p>

                <p><strong>Prazo</strong> - {{ $orcamento->prazo }} dias</p>
                
                <p><strong>Total</strong> - R$ {{ $orcamento->total}}, 00</p>
        </div>

</body>
</html>
    