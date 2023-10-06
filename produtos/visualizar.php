<?php

use ExemploCrudPoo\Produtos;
use ExemploCrudPoo\Utilitarios;

require_once "../vendor/autoload.php";


$produto = new Produtos;

$listaDeProdutos = $produto->lerProdutos();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <div class="container">
        <h1>Produtos | SELECT - <a class="btn" href="../index.php">Home</a> </h1>
        <hr>
        <h2>Lendo e carregando todos os produtos.</h2>
        <p><a class="btn" href="inserir.php">
                Inserir novo produto</a></p>
        <div class="row">
            <?php foreach ($listaDeProdutos as $produto) { ?>
                <div class="col-md-6 cartao">
                    <article class=" p-2">
                        <h3 class="text-center p-2"> <?= $produto["produto"] ?> </h3>
                        <h4> <?= $produto["fabricante"] ?> </h4>
                        <p><b>Preço:</b> <?= Utilitarios::formatarPreco($produto["preco"]) ?> </p>
                        <p><b>Quantidade:</b> <?= $produto["quantidade"] ?> </p>
                        <p><b>Total:</b>
                            <?= Utilitarios::calcularTotal($produto["preco"], $produto["quantidade"]) ?></p>
                        <hr>
                        <p>
                            <a class="btn" href="atualizar.php?id=<?= $produto["id"] ?>">Editar 📝</a> |
                            <a class="excluir btn" href="excluir.php?id=<?= $produto["id"] ?>">Excluir 🗑</a>
                        </p>
                    </article>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="../js/confirma-exclusao.js"></script>

</body>

</html>