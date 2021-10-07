<?php 

include_once('../Model/conn.php');

$nome_pesquisar = $_POST['nome_pesquisar'];
$email_pesquisar = $_POST['email_pesquisar'];
$materia_pesquisar = $_POST['materia_pesquisar'];
 
if (!empty($nome_pesquisar) OR !empty($email_pesquisar) OR !empty($materia_pesquisar)) {    
    $sql = "SELECT ID_ALUNO, NOME_ALUNO, EMAIL_ALUNO, DATA_NASCIMENTO FROM alunos WHERE NOME_ALUNO LIKE '%$nome_pesquisar%' OR EMAIL_ALUNO LIKE '%$email_pesquisar%';";
    $pesquisar = mysqli_query($conexao_banco, $sql);
    if($pesquisar) {
        ?>
        <div class="col-md-12">
       
       <div class="card mt-3 mx-3 px-3 mb-3">
           <div class="card-header">
               <h4 class="card-title">Resultado</h4>
           </div>
             <div >
                 <table class="table table-hover table-borderless" style="text-align: center;">
                     <thead>
                     <tr>
                         <!-- <th>#</th> -->
                         <th>Nome Aluno</th>
                         <th>E-mail Aluno</th>
                         <th>Data Nascimento</th>
                         <th>Editar</th>
                         <th>Excluir</th>
                     </tr>
                     </thead>
                     <tbody>
                         <?php while ($linha = mysqli_fetch_array($pesquisar)) {
                             
                             $dataNascimento = date_create($linha['DATA_NASCIMENTO']);
                            
                             ?>  
                                                 
                         <tr>
                            <!-- <td><?php echo $linha['ID_ALUNO'] ?></td> -->
                            <td><?php echo $linha['NOME_ALUNO'] ?></td>
                             <td><?php echo $linha['EMAIL_ALUNO'] ?></td>
                             <td><?php echo date_format($dataNascimento, 'd-m-Y'); ?></td>
                             
                             <td><button data-toggle="modal" data-target="#modalEditarMatricula" class="btn btn-warning" data-whatever_idaluno="<?php echo $linha['ID_ALUNO']?>" data-whatever_nome_aluno="<?php echo $linha['NOME_ALUNO']?>" data-whatever_email="<?php echo $linha['EMAIL_ALUNO']?>" data-whatever_dataNascimento="<?php echo $linha['DATA_NASCIMENTO'];?>"> Editar</button></td>
                             <td><button data-toggle="modal" data-target="#modalExluirMatricula" class="btn btn-danger" data-whatever_idaluno="<?php echo $linha['ID_ALUNO']?>"> Excluir</button></td>
                         </tr>
                        <?php } ?>
                     </tbody>
                 </table>
             </div>
       </div>           
   </div>
    <?php
    }
} else {
    echo 'vazio';
}

?>