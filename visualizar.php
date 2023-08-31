<?php
require_once "./src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>

<link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>
</div>

    <div class="alunos">
<?php foreach($listaDeAlunos as $aluno) {?>
    <article class="aluno">  
    <p>
        <b>Nome do Aluno: </b><?=$aluno['nomeAluno']?>
    </p>

    <p>
        <b>1ª nota: </b><?=$aluno['primeiraNota']?>
    </p>

    <p>
        <b>2ª nota: </b><?=$aluno['segundaNota']?>
    </p>

    <p>
        <b>Média: </b><?=$aluno['Média']?>
    </p>

    <p>
        <b>Situação: </b>
    </p>

    <br>

    <p>
        <a class="editarAluno" href="">Editar</a>
        <a class="excluirAluno" href="">Excluir</a>
    </p>
    </article>  
<?php } ?>
    </div>

    <p><a href="index.php">Voltar ao início</a></p>


</body>
</html>