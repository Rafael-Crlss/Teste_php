<?php
require_once "../Model/testedevM.php"; 
require_once("../autoload.php");


class TestedevC{
    private $objeto;

    function __construct(){
        $this->objeto = new TestedevM();
        
        $exec = trim($_POST['exec']);
        $this->$exec();
    }

    public function pesquisar_aluno(){
 
        $this->objeto->parametro['no_aluno']            = (!empty($_POST['no_aluno'])) ? $_POST['no_aluno'] :'';
        $this->objeto->parametro['email_aluno']         = (!empty($_POST['email_aluno'])) ? $_POST['email_aluno'] :'';
        $this->objeto->parametro['cd_curso']            = (!empty($_POST['cd_curso'])) ? $_POST['cd_curso'] :'';

        $retorno = $this->objeto->pesquisar_aluno();

        $tabela="";
        if($retorno != 'vazio'){
            $tabela.="<table class='table table-hover'>";
                $tabela.="<thead class='text-warning'>";
                    $tabela.="<tr>";
                        $tabela.="<th>Aluno</th>";
                        $tabela.="<th>Email</th>";
                        $tabela.="<th>Data de Nascimento</th>";
                        $tabela.="<th>Editar Aluno</th>";
                        $tabela.="<th>Excluir Aluno</th>";
                    $tabela.="</tr>";
                $tabela.="</thead>";
                $tabela.="<tbody>";
    
                foreach($retorno as $linha){
                    $date = new DateTime($linha['DATA_NASCIMENTO']);
                    $date1 = $date->format('d-m-Y');

                    $data ="";
    
                    $tabela.="<tr>";
                        $tabela.="<td>" . $linha['NOME_ALUNO']      . "</td>";
                        $tabela.="<td>" . $linha['EMAIL_ALUNO']     . "</td>";
                        $tabela.="<td>" . $date1                    . "</td>";
                        $tabela.="<td class='px-4'><i class='fa fa-edit' onclick='modal_editar_aluno(".$linha['ID_ALUNO'].");'></i></td>";
                        $tabela.="<td class='px-4'><i class='fa fa-remove' onclick='excluir_aluno(".$linha['ID_ALUNO'].");'></i></td>";
                    $tabela.="</tr>";
                }
                $tabela.="</tbody>";
            $tabela.="</table>";
        }else{
            $tabela .="<div class='row'>";
                $tabela .="<div class='col-md-12'>";
                    $tabela.="<div class='card-header'>";
                        $tabela.="<h5>Nenhum Item Encontrado</h5>";
                    $tabela.="</div>";
                $tabela.="</div>";
            $tabela.="</div>";
        }
        echo $tabela;

    }

    public function pesquisar_curso(){
 
        $retorno = $this->objeto->pesquisar_curso();

        if($retorno != 'vazio'){
            $tabela="";
            $tabela.="<table class='table table-hover'>";
                $tabela.="<thead class='text-warning'>";
                    $tabela.="<tr>";
                        $tabela.="<th>Curso</th>";
                        $tabela.="<th>Descrição</th>";
                        $tabela.="<th>Matricular Aluno</th>";
                        $tabela.="<th>Editar Curso</th>";
                        $tabela.="<th>Excluir Curso</th>";
                    $tabela.="</tr>";
                $tabela.="</thead>";
                $tabela.="<tbody>";
    
                foreach($retorno as $linha){
    
                    $tabela.="<tr>";
                        $tabela.="<td>" . $linha['TITULO']      . "</td>";
                        $tabela.="<td>" . $linha['DESCRICAO']   . "</td>";
                        $tabela.="<td class='px-4'><i class='fa fa-id-card-o' onclick='modal_matricular_aluno(".$linha['ID_CURSO'].");'></i></td>";
                        $tabela.="<td class='px-4'><i class='fa fa-edit' onclick='modal_editar_curso(".$linha['ID_CURSO'].");'></i></td>";
                        $tabela.="<td class='px-4'><i class='fa fa-remove' onclick='excluir_curso(".$linha['ID_CURSO'].");'></i></td>";
                    $tabela.="</tr>";
                }
                $tabela.="</tbody>";
            $tabela.="</table>";
        }else{
            $tabela .="<div class='row'>";
                $tabela .="<div class='col-md-12'>";
                    $tabela.="<div class='card-header'>";
                        $tabela.="<h5>Nenhum Item Encontrado</h5>";
                    $tabela.="</div>";
                $tabela.="</div>";
            $tabela.="</div>";
        }
        echo $tabela;
    }

    public function cadastrar_aluno(){

        $var = (!empty($_POST['dt_nascimento_aluno'])) ? $_POST['dt_nascimento_aluno'] :'';
 
        $this->objeto->parametro['no_aluno']            = (!empty($_POST['no_aluno'])) ? $_POST['no_aluno'] :'';
        $this->objeto->parametro['email_aluno']         = (!empty($_POST['email_aluno'])) ? $_POST['email_aluno'] :'';
        $this->objeto->parametro['dt_nascimento_aluno'] = $var;


        $retorno = $this->objeto->cadastrar_aluno();
        
        echo $retorno;
    }

    public function cadastrar_curso(){
 
        $this->objeto->parametro['no_curso']           = (!empty($_POST['no_curso'])) ? $_POST['no_curso'] :'';
        $this->objeto->parametro['descricao_curso']    = (!empty($_POST['descricao_curso'])) ? $_POST['descricao_curso'] :'';

        $retorno = $this->objeto->cadastrar_curso();
        
        echo $retorno;
    }

    public function matricular_aluno(){
 
        $this->objeto->parametro['cd_curso'] = (!empty($_POST['cd_curso'])) ? $_POST['cd_curso'] :'';
        $this->objeto->parametro['id_aluno'] = (!empty($_POST['id_aluno'])) ? $_POST['id_aluno'] :'';

        $retorno = $this->objeto->matricular_aluno();
        
        echo $retorno;
    }

    public function editar_curso(){

        $this->objeto->parametro['cd_curso']           = (!empty($_POST['cd_curso'])) ? $_POST['cd_curso'] :'';        
        $this->objeto->parametro['no_curso']           = (!empty($_POST['no_curso'])) ? $_POST['no_curso'] :'';
        $this->objeto->parametro['descricao_curso']    = (!empty($_POST['descricao_curso'])) ? $_POST['descricao_curso'] :'';

        $retorno = $this->objeto->editar_curso();
        
        echo $retorno;
    }

    public function editar_aluno(){

        $this->objeto->parametro['id_aluno']            = (!empty($_POST['id_aluno'])) ? $_POST['id_aluno'] :'';        
        $this->objeto->parametro['no_aluno']            = (!empty($_POST['no_aluno'])) ? $_POST['no_aluno'] :'';
        $this->objeto->parametro['email_aluno']         = (!empty($_POST['email_aluno'])) ? $_POST['email_aluno'] :'';
        $this->objeto->parametro['dt_nascimento_aluno'] = (!empty($_POST['de_nascimento_aluno'])) ? $_POST['de_nascimento_aluno'] :'';

        $retorno = $this->objeto->editar_aluno();
        
        echo $retorno;
    }

    public function excluir_curso(){

        $this->objeto->parametro['cd_curso']  = (!empty($_POST['cd_curso'])) ? $_POST['cd_curso'] :'';        

        $retorno = $this->objeto->excluir_curso();
        
        echo $retorno;
    }

    public function excluir_aluno(){

        $this->objeto->parametro['id_aluno']  = (!empty($_POST['id_aluno'])) ? $_POST['id_aluno'] :'';        

        $retorno = $this->objeto->excluir_aluno();
        
        echo $retorno;
    }


    public function combo_curso(){

        $array = $this->objeto->combo_curso();

        echo json_encode($array);
    }
    public function combo_aluno(){

        $array = $this->objeto->combo_aluno();

        echo json_encode($array);
    }

    public function modal_matricular_aluno(){
        $var = (!empty($_POST['id_curso'])) ? $_POST['id_curso'] : "";
        $corpo="";
        $corpo.="<form id='formulario-matricular_aluno'>";
            $corpo.="<div class='row'>";
                $corpo.="<div class='col-md-12'>";
                    $corpo.="<div class='form-group'>";
                        $corpo.="<label>Lista de Alunos</label>";
                        $corpo.="<select class='form-control' name='id_aluno' id='id_aluno'></select>";
                    $corpo.="</div>";
                $corpo.="</div>";
                $corpo.="<input type='hidden' value=".$var." name='cd_curso' id='cd_curso'>";
                $corpo.="<input type='hidden' value='matricular_aluno' name='exec' id='exec'>";
            $corpo.="</div>";
        $corpo.="</form>";
        $corpo.="<script type='text/javascript' src='../../assets/js/teste_dev.js'></script>";
        $corpo.="<script>combo_aluno();</script>";


        $rodape ="";
        $rodape .="<button type='button' class='btn btn-warning' onclick='matricular_aluno(event, \"formulario-matricular_aluno\");' data-dismiss='modal'>Matricular</button>";

        $array = array($corpo, $rodape);
        echo json_encode($array);
    }

    public function modal_editar_curso(){
        $var = (!empty($_POST['id_curso'])) ? $_POST['id_curso'] : "";
        $corpo="";
        $corpo.="<form id='formulario_editar_curso'>";
            $corpo.="<div class='row'>";
                $corpo.="<div class='col-md-12'>";
                    $corpo.="<div class='form-group'>";
                        $corpo.="<label>Nome do Curso</label>";
                        $corpo.="<input type='text' class='form-control' name='no_curso' id='no_curso'>";
                    $corpo.="</div>";
                $corpo.="</div>";
            $corpo.="</div>";
            $corpo.="<div class='row'>";
                $corpo.="<div class='col-md-12'>";
                    $corpo.="<div class='form-group'>";
                        $corpo.="<label>Descrição de curso</label>";
                        $corpo.="<textarea type='text' class='form-control' name='descricao_curso' id='descricao_curso'></textarea>";
                    $corpo.="</div>";
                $corpo.="</div>";
            $corpo.="</div>";
            $corpo.="<input type='hidden' value=".$var." name='cd_curso' id='cd_curso'>";
            $corpo.="<input type='hidden' value='editar_curso' name='exec' id='exec'>";
        $corpo.="</form>";
        // $corpo.="<script type='text/javascript' src='../../assets/js/teste_dev.js'></script>";

        $rodape ="";
        $rodape .="<button type='button' class='btn btn-warning' onclick='editar_curso(event, \"formulario_editar_curso\");' data-dismiss='modal'>Editar Curso</button>";

        $array = array($corpo, $rodape);
        echo json_encode($array);
    }

    public function modal_editar_aluno(){

        $id_aluno = (!empty($_POST['id_aluno'])) ? $_POST['id_aluno'] : "";
        $corpo="";
        $corpo.="<form id='formulario_editar_aluno'>";
            $corpo.="<div class='row'>";
                $corpo.="<div class='col-md-6'>";
                    $corpo.="<div class='form-group'>";
                        $corpo.="<label>Nome do aluno</label>";
                        $corpo.="<input type='text' class='form-control' name='no_aluno' id='no_aluno'>";
                    $corpo.="</div>";
                $corpo.="</div>";
            
                $corpo.="<div class='col-md-6'>";
                    $corpo.="<div class='form-group'>";
                        $corpo.="<label>Data de Nascimento</label>";
                        $corpo.="<input type='date' class='form-control' name='dt_nascimento_aluno' id='dt_nascimento_aluno'>";
                    $corpo.="</div>";
                $corpo.="</div>";    
            $corpo.="</div>";
            $corpo.="<div class='row'>";
                $corpo.="<div class='col-md-12'>";
                    $corpo.="<div class='form-group'>";
                        $corpo.="<label>Email do Aluno</label>";
                        $corpo.="<input type='text' class='form-control' name='email_aluno' id='email_aluno'>";
                    $corpo.="</div>";
                $corpo.="</div>";
            $corpo.="</div>";

            $corpo.="<input type='hidden' value=".$id_aluno." name='id_aluno' id='id_aluno'>";
            $corpo.="<input type='hidden' value='editar_aluno' name='exec' id='exec'>";
        $corpo.="</form>";

        $rodape ="";
        $rodape .="<button type='button' class='btn btn-warning' onclick='editar_aluno(event, \"formulario_editar_aluno\");' data-dismiss='modal'>Editar Aluno</button>";

        $array = array($corpo, $rodape);
        echo json_encode($array);
    }
}
new TestedevC();
