<?php
require_once "./src/funcoes-alunos.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$dadosDoAluno = lerUmAluno($conexao, $id);

$situacao = lerAlunos($conexao);

if(isset($_POST['deletar'])){
    deletarAluno($conexao, $id);
    header("location:visualizar.php");
}
?>

<!-- Começo HTML -->
<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Exclusão de Alunos</title>

<link href="css/style.css" rel="stylesheet">

</head>

<div class="containerCadastro">
	<body>

	<header>	
		<h1 class="text-center">Sistema de Exclusão</h1>
    		
    	<p class="text-center">Tem certeza que quer deletar o aluno abaixo?</p>	
	</header>

	<div class="centralizar">
	<!-- Começo formulário -->
		<form class="" action="#" method="post">
        
        <input type="hidden" name="id" value="<?=$dadosDoAluno['id']?>">

        <p>
            <label for="nome">Nome:</label>

	        <input value="<?=$dadosDoAluno['nomeAluno']?>" type="text" name="nomeAluno" id="nomeAluno" readonly disabled>
        </p>
                   
    
        <p>
            <label for="primeira">Primeira nota:</label>
            
	        <input value="<?=$dadosDoAluno['primeiraNota']?>" name="primeiraNota" type="number" id="primeiraNota" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>
	    
	    <p>
            <label for="segunda">Segunda nota:</label>

	        <input value="<?=$dadosDoAluno['segundaNota']?>" name="segundaNota" type="number" id="segunda" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
            <label for="media">Média:</label>

            <input value="<?=number_format($dadosDoAluno['media'], 2)?>" name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" readonly disabled>
        </p>

        <p>
            <label for="situacao">Situação:</label>

			<input value="<?=$dadosDoAluno['situacao']?>" type="text" name="situacao" id="situacao" readonly disabled>
		
        </p>
	    
	    	
		<button class="botaoDeletar" type="submit" name="deletar">Deletar Aluno</button>
		
		</form>
	</div>

	<footer>
    	<p class="text-center">
			<a href="index.php">Voltar</a>
		</p>
	</footer>

	</body>
</div>
</html>
