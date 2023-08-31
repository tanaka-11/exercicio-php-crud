<?php
require_once "conecta.php";

function lerAlunos (PDO $conexao):array {
    $sql = "SELECT nomeAluno,
    primeiraNota,
    segundaNota,
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



function inserirAluno(PDO $conexao, string $nomeAluno, float $primeiraNota, float $segundaNota):void {
    $sql = "INSERT INTO alunos(nomeAluno, primeiraNota, segundaNota) VALUES (:nomeAluno, :primeiraNota, :segundaNota)";
    try {
        $consulta = $conexao -> prepare($sql);

        $consulta ->bindValue(":nomeAluno", $nomeAluno, PDO::PARAM_STR);

        $consulta ->bindValue(":primeiraNota", $primeiraNota, PDO::PARAM_STR);

        $consulta ->bindValue(":segundaNota", $segundaNota, PDO::PARAM_STR);

        $consulta -> execute();
        
    } catch (Exception $erro) {
        die("Erro ao cadastrar aluno: ".$erro->getMessage());
    }
}