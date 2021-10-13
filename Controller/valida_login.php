<?php

session_start();

include_once '..\Model\conn.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM USUARIO WHERE NOME_USUARIO = '$usuario'";

$sql_valida_usuario = mysqli_query($conexao_banco, $sql);

$resultado = mysqli_fetch_assoc($sql_valida_usuario);


if (isset($resultado) && password_verify($senha, $resultado['SENHA'])) {

        $_SESSION['sessaoUsuario'] = $resultado['NOME_COMPLETO'];
        header("Location: ../pages/View/matricular_aluno.php");
    
} else {
    header("Location: ../pages/View/index.php");
    $_SESSION['erro_login'] = "<div class='alert alert-danger' style='text-align: center';>Usuário ou senha <strong>inválidos</strong> !</div>";
}

// $senha = password_hash($senha, PASSWORD_BCRYPT);