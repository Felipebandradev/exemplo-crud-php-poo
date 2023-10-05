<?php

use ExemploCrudPoo\Produtos;
require_once "../vendor/autoload.php";
$produtos = new Produtos;
$produtos->setId($_GET['id']);
$produtos->excluirProduto();
header("location:visualizar.php");