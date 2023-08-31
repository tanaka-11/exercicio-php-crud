<?php
require_once "./src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);

if(isset($_POST['inserir'])){
	$nomeAluno = filter_input(INPUT_POST, "nomeAluno", FILTER_SANITIZE_SPECIAL_CHARS);

	$primeiraNota = filter_input(INPUT_POST, "primeiraNota",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	$segundaNota = filter_input(INPUT_POST, "segundaNota",FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	inserirAluno($nomeAluno, $primeiraNota, $segundaNota);

	header("location:visualizar.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="cadastro-aluno">
	<h1>Cadastrar um novo aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para cadastrar um novo aluno.</p>

	<form action="#" method="post">
	    <p><label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome" required></p>
        
      <p><label for="primeira">Primeira nota:</label>
	    <input type="number" name="primeiraNota" id="primeiraNota" step="0.01" min="0.00" max="10.00" required></p>
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" name="segundaNota" id="segundaNota" step="0.01" min="0.00" max="10.00" required></p>
	    
      <button type="submit" name="inserir">Cadastrar aluno</button>
	</form>

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>
</div>

</body>
</html>