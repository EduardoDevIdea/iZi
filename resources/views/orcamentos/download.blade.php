
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
                
                <p><strong>Cliente</strong> - {{ $orcamento->c_nome }} {{ $orcamento->sobrenome }}</p>

                <p><strong>Descrição de serviço</strong> - {{ $orcamento->titulo }} - {{ $orcamento->descricao }}</p>

                <p><strong>Prazo</strong> - {{ $orcamento->prazo }} dias</p>
                
                <p><strong>Total</strong> - Mão de obra + Serviço</p>
        </div>

</body>
</html>
    