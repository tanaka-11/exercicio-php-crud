<?php
/* SCRIPT de conexão ao servidor do Banco de Dados (database) */

// Parâmetros
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "crud_escola_tanaka";

/* Configurações de conexão API/Driver utilizando o tipo de dado PDO (PHP Data Object)*/

try {
    // Instância/Objeto PDO para conexão
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8",
        $usuario, $senha
    );
    
    // Habilitar a verficação e sinalização de erros (exceções)
    $conexao->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch(Exception $erro){
    // Exception = Classe/Tipo de dados voltado para tratamento de erros
    die("Falha na conexão do servidor: ".$erro->getMessage());
}

