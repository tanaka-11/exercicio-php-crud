<?php
require_once "./src/funcoes-alunos.php";
$listaDeAlunos = lerAlunos($conexao);

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

    <header class="text-center headerBusca">
            <h1>Sistema de Busca de Alunos</h1>
            <p>Digite o nome do aluno para obter informações</p>
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
		<div id="mensagem" class="resultadoBusca">    
			<h2 class="text-center">Resultados da Busca</h2>

            <?php foreach ($resultado as $aluno) { ?>
				
				<!-- PHP mudança de cor -->
				<?php
					$situacaoCores = [
					'Aprovado' => 'lightgreen',
					'Reprovado' => '#f23131',
					'Recuperação' => 'orange',
				];

				$cor = $situacaoCores[$aluno['situacao']] ?? 'white';
				?>
				<!-- Termino PHP de mudança de cor -->
				
				<p>
					<b>Nome - </b><?= $aluno['nomeAluno']?>
				</p>

				<p style="color: <?=$cor?>;">
					<b>Situação - </b><?=$aluno['situacao']?>
				</p>

				<p>
					<b>1ª Nota - </b> <?= $aluno['primeiraNota'] ?> 
				</p>

				<p>
					<b>2ª Nota - </b> <?= $aluno['segundaNota'] ?> 
				</p>

				<p>
					<b>Média - </b> <?= number_format($aluno['media'], 2) ?> 
				</p>
			
			<?php } ?>
			
			<button id="botao" onclick="esconderMensagem()">OK</button>
		</div>		

		<?php } elseif (isset($_POST['buscar'])) { ?>
			<div id="mensagem" class="resultadoBusca">  
				<p class="text-center">Nenhum aluno encontrado com o nome
					<b><?=$nomeAluno?></b>
				</p>

				<button id="botao" onclick="esconderMensagem()">OK</button>
			</div>
        	<?php } ?>
    </main>

        <footer>
            <p class="text-center">
                <a href="visualizar.php">Voltar</a>
            </p>
        </footer>
</div>

<script src="./js/esconder-mensagem.js"></script>

</body>
</html>
