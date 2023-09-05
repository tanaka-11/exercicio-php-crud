<?php
require_once "./src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);

if(isset($_POST['inserir'])){
	$nomeAluno = filter_input(INPUT_POST, "nomeAluno", FILTER_SANITIZE_SPECIAL_CHARS);

	$primeiraNota = filter_input(INPUT_POST, "primeiraNota",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	$segundaNota = filter_input(INPUT_POST, "segundaNota",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	inserirAluno($conexao, $nomeAluno, $primeiraNota, $segundaNota);

	header("location:visualizar.php");
}
?>



<!-- Começo HTML -->
<!DOCTYPE html>

<html lang="pt-br">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistema de Cadastro</title>

<link href="css/style.css" rel="stylesheet">

</head>

<div class="containerCadastro">
	<body>

	<header>	
		<h1 class="text-center">Sistema de Cadastro</h1>
    		
    	<p class="text-center">Utilize o formulário abaixo para cadastrar as nota de um aluno.</p>	
	</header>

<main>	
	<div class="centralizar">
	<!-- Começo formulário -->
		<form class="" action="#" method="post">
			<p>
				<b>
				<label for="nome">Nome</label>
				</b>

				<br>
			
				<input type="text" name="nomeAluno" id="nome" required>
			</p>

        
			<p> 
				<b>
				<label for="primeira">Primeira nota</label>
				</b>

				<br>

				<input type="number" name="primeiraNota" id="primeiraNota" step="0.01" min="0.00" max="10.00" required>
			</p>
		
	    
			<p>
				<b>
				<label for="segunda">Segunda nota</label>
				</b>

				<br>
			
				<input type="number" name="segundaNota" id="segundaNota" step="0.01" min="0.00" max="10.00" required>
			</p>
		
	    	
			<button class="botaoInserir" type="submit" name="inserir">Cadastrar notas</button>
		
		</form>
	</div>
</main>

	<footer>
    	<p class="text-center">
			<a href="index.php">Voltar</a>
		</p>
	</footer>

	</body>
</div>
</html>
