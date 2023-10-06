<?php
use ExemploCrudPoo\Produtos;
use ExemploCrudPoo\Fabricante;
require_once "../vendor/autoload.php";

$produto = new Produtos;
$fabricantes = new Fabricante;
$listaDeFabricantes = $fabricantes->lerFabricantes();

if(isset($_POST['inserir'])){
     $produto->setNome($_POST['nome']);
    
    $produto->setPreco($_POST['preco']);

    $produto->setQuantidade($_POST['quantidade']);

    $produto->setFabricanteId($_POST['fabricante']);

    $produto->setDescricao($_POST['descricao']);

    $produto->inserirProduto();

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fundo-formulario">
    <div class="container">
        <h1>Produtos | INSERT</h1>
        <hr>
        <form action="" method="post"  class=" formulario row g-3">
            <p class=" col-md-12">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control" type="text" name="nome" id="nome" required>
            </p>
            <p class="col-md-6">
                <label class="form-label" for="preco">Preço:</label>
                <input class="form-control" type="number" min="10" max="10000" step="0.01"
                 name="preco" id="preco" required>
            </p>
            <p class="col-md-6">
                <label class="form-label" for="quantidade">Quantidade:</label>
                <input class="form-control" type="number" min="1" max="100"
                 name="quantidade" id="quantidade" required>
            </p>
            <p class=" col-md-12">
                <label class="form-label" for="fabricante">Fabricante:</label>
                <select class="form-select" name="fabricante" id="fabricante" required>
                    <option value=""></option>
        
                    <?php foreach($listaDeFabricantes as $fabricante) { ?>
                    <option value="<?=$fabricante['id']?>">
                        <?=$fabricante['nome']?>
                    </option>
                    <?php } ?>
                </select>
            </p>
            <p class=" col-md-12">
                <label class="form-label" for="descricao">Descrição:</label> <br>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="3"></textarea>
            </p>
            <button class="btn" type="submit" name="inserir">Inserir produto</button>
        </form>
        <hr>
        <p><a class="btn" href="visualizar.php">Voltar</a></p>
    </div>
    
</body>
</html>