<?php
require_once "./src/funcoes-alunos.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$dadosDoAluno = lerUmAluno($conexao, $id);

if(isset($_POST['atualizar-dados'])) {

    $nomeAluno = filter_input(INPUT_POST, "nomeAluno", FILTER_SANITIZE_SPECIAL_CHARS);

    $primeiraNota = filter_input(INPUT_POST, "primeiraNota", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $segundaNota = filter_input(INPUT_POST, "segundaNota", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    atualizarAluno($conexao, $id, $nomeAluno, $primeiraNota, $segundaNota);

    header("location:visualizar.php");
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados do Aluno</title>

<link href="css/style.css" rel="stylesheet">

</head>

<body>
<div class="containerAtualizar">
    <h1 class="text-center">Atualizar dados do aluno </h1>
    		
    <h2 class="text-center">Utilize o formulário abaixo para atualizar os dados do aluno.</h2>

    <form action="#" method="post">

        <input type="hidden" name="id" value="<?=$dadosDoAluno['id']?>">    
    
	    <p>
            <label for="nome">Nome</label>

	        <input value="<?=$dadosDoAluno['nomeAluno']?>" type="text" name="nomeAluno" id="nomeAluno" required>
        </p>
        
        <p>
            <label for="primeira">Primeira nota</label>
            
	        <input value="<?=$dadosDoAluno['primeiraNota']?>" name="primeiraNota" type="number" id="primeiraNota" step="0.01" min="0.00" max="10.00" required>
        </p>
	    
	    <p>
            <label for="segunda">Segunda nota</label>

	        <input value="<?=$dadosDoAluno['segundaNota']?>" name="segundaNota" type="number" id="segunda" step="0.01" min="0.00" max="10.00" required>
        </p>

        <p>
            <label for="media">Média</label>

            <input value="<?=number_format($dadosDoAluno['media'], 2)?>" name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
            <label for="situacao">Situação</label>

	        <input value="<?=($dadosDoAluno['situacao'])?>" type="text" name="situacao" id="situacao" readonly disabled>
        </p>
	    
        <button name="atualizar-dados">Atualizar dados do aluno</button>
        
	</form>    
</div>
    
    <footer class="text-center">
        <p>
            <a href="visualizar.php">Voltar</a>
        </p>
    </footer>

</body>
</html>