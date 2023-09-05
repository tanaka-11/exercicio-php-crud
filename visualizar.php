<?php
require_once "./src/funcoes-alunos.php";

$listaDeAlunos = lerAlunos($conexao);
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Lista de Alunos - Visualização</title>

<link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="containerVisualizar text-center">
        <h1>Lista de Alunos</h1>

        <div class="button-inserir-aluno">
        <p>
            <a href="inserir.php">Inserir novo aluno</a>
        </p>

        <p>
            <a href="buscar.php">Buscar dados do Aluno</a>
        </p>
        </div>
    </div>

    <div class="alunos">
<?php foreach($listaDeAlunos as $aluno) {?>
    
    <article class="aluno">  
    <p>
        <b>Nome do Aluno : </b><?=$aluno['nomeAluno']?>
    </p>

    <p>
        <b>1ª nota : </b><?=$aluno['primeiraNota']?>
    </p>

    <p>
        <b>2ª nota : </b><?=$aluno['segundaNota']?>
    </p>

    <p>
        <b>Média : </b><?=number_format($aluno['media'], 2)?>
    </p>

    <!-- PHP para mudança de cores -->
    <?php
    $situacaoCores = [
    'Aprovado' => 'lightgreen',
    'Reprovado' => '#f23131',
    'Recuperação' => 'orange',
    ];

    $cor = $situacaoCores[$aluno['situacao']] ?? 'white';
    ?>
    <!-- Termino PHP de mudança de cor -->

    <p style="color: <?= $cor ?>;">
        <b>Situação: </b>
        <?= $aluno['situacao'] ?>
    </p>

    <br>

    <section class="edicaoAluno">

        <a class="editarAluno" href="atualizar.php?id=<?=$aluno['id']?>"> Editar </a> |

        <a class="excluir excluirAluno" href="deletar.php?id=<?=$aluno['id']?>"> Excluir</a>

    </section>

    </article>  
<?php } ?>
</div>
    
    <footer class="text-center">
        <p>
            <a href="index.php">Voltar</a>
        </p>
    </footer>    

    <script src="./js/confirma-exclusao.js"></script>
</body>
</html>