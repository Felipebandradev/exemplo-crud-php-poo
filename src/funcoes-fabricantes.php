<?php
require_once "conecta.php";











function excluirFabricante(PDO $conexao, int $id):void {
    $sql = "DELETE FROM fabricantes WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao excluir: ".$erro->getMessage());
    }
} 

