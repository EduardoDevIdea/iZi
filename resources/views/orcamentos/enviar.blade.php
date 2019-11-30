<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p><strong>Orçamento</strong> {{ $orcamento->titulo }}</p>
    <p><strong>Descrição de Serviço:</strong> {{ $orcamento->descricao }}</p>
    <p><strong>Prazo:</strong> {{ $orcamento->prazo }}</p>
    <p><strong>Total:</strong> {{ $orcamento->total }}</p>
    <p><strong>Aguardo retorno de recebimento através do telefone. Obrigado!</p>
</body>
</html>