<?php
require_once "./src/funcoes-alunos.php";

$listaDeAlunos = lerAlunos($conexao);
$resultado = []; // Inicialize a variável $resultado como um array vazio

if (isset($_POST['buscar'])) {
    $nomeAluno = filter_input(INPUT_POST, "nomeAluno", FILTER_SANITIZE_SPECIAL_CHARS);

    $resultado = buscarAluno($conexao, $nomeAluno);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Busca de Alunos</title>

    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="containerBuscar">
        <header>
            <h1 class="text-center">Sistema de Busca de Alunos</h1>
            <p class="text-center">Digite o nome do aluno para obter informações</p>
        </header>
        <main>
            <div class="centralizar">

			<form class="" action="buscar.php" method="post">
    		<label for="nomeAluno">Buscar Aluno por Nome:</label>

    		<input type="text" id="nomeAluno" name="nomeAluno" required>
    		<button type="submit" name="buscar">Buscar</button>
			</form>

            </div>

        <?php if (!empty($resultado)) { ?>
                
			<h2 class="text-center">Resultados da Busca:</h2>

            <?php foreach ($resultado as $aluno) { ?>

				<div class="resultadoBusca text-center">
				<p><b>Nome do Aluno:</b> <?= $aluno['nomeAluno'] ?> </p>

				<p><b>1ª Nota:</b> <?= $aluno['primeiraNota'] ?> </p>

				<p><b>2ª Nota:</b> <?= $aluno['segundaNota'] ?> </p>

				<p><b>Média:</b> <?= number_format($aluno['media'], 2) ?> </p>

				<p><b>Situação:</b> <?= $aluno['situacao'] ?> </p>
				</div>
            <?php } ?>

        <?php } elseif (isset($_POST['buscar'])) { ?>
            
			<p>Nenhum aluno encontrado com o nome "<?= $nomeAluno ?>".</p>

        <?php } ?>

        </main>
        <footer>
            <p class="text-center">
                <a href="visualizar.php">Voltar</a>
            </p>
        </footer>
    </div>
</body>
</html>
