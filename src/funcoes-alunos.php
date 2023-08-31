<?php
require_once "conecta.php";

function lerAlunos (PDO $conexao):array {
    $sql = "SELECT *, 
     (primeiraNota + segundaNota) / 2 as Média
    FROM alunos 
    ORDER BY nomeAluno";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $erro) {
        die("Falha na conexão do servidor: ".$erro->getMessage());
    }
    return $resultado;
}