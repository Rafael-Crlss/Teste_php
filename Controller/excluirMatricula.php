<?php 

include_once('../Model/conn.php');

$idMatricula = $_POST['idExcluir'];

if(!empty($idMatricula)) {

    $sql = "DELETE FROM `aluno` WHERE ID_ALUNO = $idMatricula";
    $executar = mysqli_query($conexao_banco, $sql);

    if($executar) {
        echo "Matricula Excluida !";
    } else {
        echo 'Não foi possivel excluir esta matricula !';
    }
} else {
    echo 'Id Vazio';
}