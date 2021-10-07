<?php 

include_once('../Model/conn.php');

$no_aluno = $_POST['no_aluno'];
$email_aluno = $_POST['email_aluno'];
$dt_nascimento_aluno = $_POST['dt_nascimento_aluno'];

 
if (!empty($no_aluno) AND !empty($email_aluno) AND !empty($dt_nascimento_aluno)) {
    $sql_inserir = "INSERT INTO `alunos`( `NOME_ALUNO`, `EMAIL_ALUNO`, `DATA_NASCIMENTO`) VALUES ('$no_aluno','$email_aluno','$dt_nascimento_aluno')";
    $inserir = mysqli_query($conexao_banco, $sql_inserir);
    if ($inserir) {
    ?>
        Aluno Cadastrado !
    <?php
    } else {
    ?>
        Erro ao Cadastrar Aluno !
    <?php
    }
} else {
    ?>
    Compos Vazios !
<?php
}

?>