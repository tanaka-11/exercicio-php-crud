<?php
function mostraSituacao(PDO $conexao, string $nomeAluno, float $primeiraNota, float $segundaNota){
    $sql = "SELECT 
    nomeAluno = :nomeAluno,
    primeiraNota = :primeiraNota ,
    segundaNota = :segundaNota,
    (primeiraNota + segundaNota) / 2 as media,
    CASE
        WHEN (:primeiraNota + :segundaNota) / 2 >= 7 THEN 'Aprovado'
        WHEN (:primeiraNota + :segundaNota) / 2 >= 5 THEN 'Recuperação'
        ELSE 'Reprovado'
    END as situacao
    FROM alunos";

    try {
        $consulta = $conexao -> prepare($sql);

        $consulta ->bindValue(":nomeAluno", $nomeAluno, PDO::PARAM_STR);

        $consulta ->bindValue(":primeiraNota", $primeiraNota, PDO::PARAM_STR);

        $consulta ->bindValue(":segundaNota", $segundaNota, PDO::PARAM_STR);

    } catch (Exception $erro) {
        die("Erro ao carregar dados da situacao. Tente Novamente".$erro->getMessage());
    }
}
