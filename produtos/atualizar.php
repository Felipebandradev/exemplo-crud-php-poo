<?php

use ExemploCrudPoo\Fabricante;
use ExemploCrudPoo\Produtos;
require_once "../vendor/autoload.php";

$fabricante = new Fabricante;
$produtos = new Produtos;
 $produtos->setId($_GET['id']);

$produto = $produtos->lerUmProduto();


$listaDeFabricantes = $fabricante->lerFabricantes();


if(isset($_POST['atualizar'])){
    $produtos->setNome($_POST['nome']);
    
    $produtos->setPreco($_POST['preco']);

    $produtos->setQuantidade($_POST['quantidade']);

    $produtos->setFabricanteId($_POST['fabricante']);


    $produtos->setDescricao($_POST['descricao']);

    $produtos->atualizarProduto();

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fundo-formulario">
    <div class="container">
        <h1>Produtos | SELECT/UPDATE</h1>
        <hr>

            <h3 class="text-center"><?=$produto['nome']?></h3>
   
            <form action="" method="post" class=" formulario row g-3">
                <p class=" col-md-12">
                    <label class="form-label" for="nome">Nome:</label>
                    <input class="form-control" value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
                </p>
                <p class="col-md-6">
                    <label class="form-label" for="preco">Preço:</label>
                    <input class="form-control" value="<?=$produto['preco']?>"
                    type="number" min="10" max="10000" step="0.01"
                     name="preco" id="preco" required>
                </p>
                <p class="col-md-6">
                    <label class="form-label" for="quantidade">Quantidade:</label>
                    <input class="form-control" value="<?=$produto['quantidade']?>"
                    type="number" min="1" max="100"
                     name="quantidade" id="quantidade" required>
                </p>
                <p class="col-md-12" >
                    <label class="form-label" for="fabricante">Fabricante:</label>
                    <select class="form-select" name="fabricante" id="fabricante" required>
                        <option value=""></option>
            
                        <?php foreach( $listaDeFabricantes as $fabricante ) { ?>
                            <option <?php if($produto["fabricante_id"] === $fabricante["id"]) echo " selected "; ?>
                            value="<?=$fabricante['id']?>">
                                <?=$fabricante['nome']?>
                            </option>
                        <?php } ?>
                    </select>
                </p>
                <p class="col-md-12">
                    <label class="form-label" for="descricao">Descrição:</label> <br>
                    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
                </p>
                <button class="btn" type="submit" name="atualizar">Atualizar produto</button>
            </form>


        <hr>
        <p><a class="btn" href="visualizar.php">Voltar</a></p>
    </div>
    
</body>
</html>