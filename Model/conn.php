<?php

    $servername = "localhost";
    $database = "dev_teste";
    $username = "root";
    $password = "";

    $conexao_banco = mysqli_connect($servername,$username,$password,$database) or die("Não foi possivel se conectar com o banco"); 
    
?>
