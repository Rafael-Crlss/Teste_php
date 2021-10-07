<?php 


include_once("../Model/conn.php");

$tituloCurso = $_POST['tituloCurso'];
$descricaoCurso = $_POST['descricaoCurso'];

if(!empty($tituloCurso) AND !(empty($descricaoCurso))) {
    $sql = "INSERT INTO `curso`( `TITULO`, `DESCRICAO`) VALUES ('$tituloCurso','$descricaoCurso');";
    $executar = mysqli_query($conexao_banco, $sql);
    if($executar) {
        echo "Curso Cadastrado com Sucesso !";
    } else {
        echo "Erro ao cadastra o curso !";
    }
} else {
    echo 'Informações vazias !';
}
