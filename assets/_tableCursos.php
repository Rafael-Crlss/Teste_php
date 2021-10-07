<?php

include_once("../Model/conn.php");

?>


<table class="table table-hover table-borderless" style="text-align: center;">
    <thead>
    <tr>
        <!-- <th>#</th> -->
        <th>Titulo Curso</th>
        <th>Descrição</th>
        <th>Alunos</th>    
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    </thead>
    <tbody>
        <?php 

    $sql = "SELECT * FROM CURSO";
    $buscar = mysqli_query($conexao_banco, $sql);

    while($linha =  mysqli_fetch_array($buscar)) {
        ?>
        <tr>
            <!-- <td> <?php echo $linha['ID_CURSO'] ?></td> -->
            <td> <?php echo $linha['TITULO'] ?></td>
            <td> <?php echo $linha['DESCRICAO'] ?></td>
            <td> <button class="btn btn-info">Alunos</button></td>
            <td> <button class="btn btn-warning">Editar</td>
            <td> <button class="btn btn-danger">Excluir</td>
        </tr>
        <?php } ?> 

    </tbody>
</table>