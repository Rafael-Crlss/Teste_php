<?php
    require_once "../Model/conexao.php"; 
    // require_once("../autoload.php");
    class TestedevM{
        
        
        public $parametro;
        public $conn;
        function __construct(){
            $this->conn = new Conexao();

        }

        function pesquisar_aluno(){

            $no_aluno    = $this->parametro['no_aluno'];
            $email_aluno = $this->parametro['email_aluno'];
            $cd_curso    = $this->parametro['cd_curso'];
            if(!$no_aluno && !$email_aluno && !$cd_curso){
                $comando="SELECT * FROM alunos WHERE 1";
            }else{
                $comando="  SELECT
                              alu.ID_ALUNO
                            , alu.NOME_ALUNO
                            , alu.EMAIL_ALUNO
                            , alu.DATA_NASCIMENTO
                            , cso.TITULO
                            FROM alunos AS alu
                            INNER JOIN curso_has_alunos AS cha ON alu.ID_ALUNO = cha.alunos_ID_ALUNO
                            INNER JOIN curso AS cso ON cha.CURSO_ID_CURSO = cso.ID_CURSO
                            WHERE 1";
            }

            if($no_aluno){
                $comando .=" AND alu.NOME_ALUNO = '$no_aluno'";
            }elseif($email_aluno){
                 $comando.=" AND alu.EMAIL_ALUNO LIKE '%$email_aluno%' ";
            }elseif($cd_curso){
                 $comando .=" AND cso.ID_CURSO = '$cd_curso'";
            }else{
               
            }
                $comando .=" ORDER BY ID_ALUNO ASC";
            
            $tal = $this->conn->rodar_script($comando);

            return $tal;
            
        }

        function pesquisar_curso(){

            $comando="SELECT * FROM curso";
            
            $tal = $this->conn->rodar_script($comando);

            return $tal;
        
        }


        function cadastrar_aluno(){

            $no_aluno = $this->parametro['no_aluno'];
            $email_aluno = $this->parametro['email_aluno'];
            $dt_nascimento_aluno = $this->parametro['dt_nascimento_aluno'];

            $comando="INSERT INTO alunos (NOME_ALUNO, EMAIL_ALUNO, DATA_NASCIMENTO) VALUES ('$no_aluno','$email_aluno','$dt_nascimento_aluno')";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function cadastrar_curso(){

            $no_curso        = $this->parametro['no_curso'];
            $descricao_curso = $this->parametro['descricao_curso'];

            $comando="INSERT INTO curso (TITULO, DESCRICAO) VALUES ('$no_curso','$descricao_curso')";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function matricular_aluno(){

            $cd_curso = $this->parametro['cd_curso'];
            $id_aluno = $this->parametro['id_aluno'];

            $comando="INSERT INTO curso_has_alunos (CURSO_ID_CURSO, alunos_ID_ALUNO) VALUES ('$cd_curso','$id_aluno')";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function editar_curso(){

            $cd_curso        = $this->parametro['cd_curso'];
            $no_curso        = $this->parametro['no_curso'];
            $descricao_curso = $this->parametro['descricao_curso'];

            $comando=" UPDATE curso SET TITULO = '$no_curso' , DESCRICAO = '$descricao_curso' WHERE  ID_CURSO = '$cd_curso' ";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function editar_aluno(){

            $id_aluno            = $this->parametro['id_aluno'];
            $no_aluno            = $this->parametro['no_aluno'];
            $email_aluno         = $this->parametro['email_aluno'];
            $dt_nascimento_aluno = $this->parametro['dt_nascimento_aluno'];

            $comando=" UPDATE alunos SET NOME_ALUNO = '$no_aluno' , EMAIL_ALUNO = '$email_aluno' , DATA_NASCIMENTO = '$dt_nascimento_aluno' WHERE ID_ALUNO = '$id_aluno' ";
            
            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function excluir_curso(){

            $cd_curso = $this->parametro['cd_curso'];

            $comando=" DELETE FROM curso WHERE ID_CURSO = '$cd_curso' ";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function excluir_aluno(){

            $id_aluno = $this->parametro['id_aluno'];

            $comando=" DELETE FROM alunos WHERE ID_ALUNO = ' $id_aluno' ";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function listar_curso(){
            //lista o curso e seus alunos
            $comando="  SELECT 
                          cso.TITULO
                        , cso.DESCRICAO
                        , alu.NOME_ALUNO
                        FROM curso AS cso
                        INNER JOIN curso_has_alunos AS cha ON cso.ID_CURSO = cha.CURSO_ID_CURSO
                        INNER JOIN alunos AS alu ON cha.alunos_ID_ALUNO = alu.ID_ALUNO
                        WHERE cso.ID_CURSO = 1 ";
            $comando .=" ORDER BY ID_ALUNO ASC ";

            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function combo_curso(){

            $comando="SELECT ID_CURSO, TITULO FROM curso";
            
            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }

        function combo_aluno(){

            $comando="SELECT ID_ALUNO, NOME_ALUNO FROM alunos";
            
            $tal = $this->conn->rodar_script($comando);

            return $tal;
        }
    }

?>