
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste Dev</title>

    <link href="../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">

    <?php include_once('../assets/_include.php'); ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <form id="formulario_matricula" method="post">
                <div class="card mx-3 px-3 ">
                    <div class="card-header">
                        <h4 class="card-title">Matricular Aluno</h4>
                    </div>
                    <div class="content mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome do Aluno</label>
                                    <input type="text" class="form-control" name="no_aluno" id="no_aluno" placeholder="Insira o nome do aluno" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email do Aluno</label>
                                    <input type="text" class="form-control" name="email_aluno" id="email_aluno" placeholder="Insira o email do aluno" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data de nascimento</label>
                                    <input type="date" class="form-control" name="dt_nascimento_aluno" id="dt_nascimento_aluno" placeholder="Insira o nome do aluno">
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 py-3">
                                <input type="hidden" value="matricular_aluno" name="exec" id="exec">
                                <button type="button" class="btn btn-warning" onclick="matricular_aluno(event, 'formulario_matricula');">Matricular</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
        <form id="formulario_pesquisa" method="post">
            <div class="card mt-3 mx-3 px-3 mb-3">
                <div class="card-header">
                    <h4 class="card-title">Pesquisar</h4>
                </div>
            <div class="row mt-3 mb-3">
                <div class="col-md-4">
                <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome_pesquisar" id="nome_pesquisar" placeholder="Insira o nome">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email_pesquisar" id="email_pesquisar" placeholder="Insira o e-mail">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Materia</label>
                        <select class="form-control" name='materia_pesquisar' id="materia_pesquisar" placeholder="Informe o curso">
                            <option>Escolha um Curso</option>
                            <option>Química</option>
                            <option>Física</option>
                            <option>Biologia</option>
                            <option>Matemática</option>
                            <option>Filosofia</option>
                            <option>Ciência da Computação</option>
                            <option>Engenharia de Software</option>
                            <option>Letras</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 py-3">
                    <!-- <input type="hidden" value="matricular_aluno" name="exec" id="exec"> -->
                    <button type="button" class="btn btn-warning" onclick="pesquisar_aluno(event, 'formulario_pesquisa');">Pesquisar</button>
                </div>
            </div>        
            </div>
        </form>        
        </div>
    </div>
    <div class="row" id="resultado">
        
    </div>
    </div>
    

    <div class="modal fade" id="modalEditarMatricula">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ffc107">
                    <h4 class="modal-title">Editar Matricula</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="idaluno" id="id_aluno">
                        <div class="row">
                            <div class="col-6">
                                <label for=""><strong>Nome Completo</strong></label>
                                <input class="form-control" type="text" name="nome_aluno" id="nome_aluno">
                            </div>
                            <div class="col-6">
                            <label for=""><strong>E-mail</strong></label>
                            <input  class="form-control" type="text" name="email_aluno" id="email_aluno">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                            <label for=""><strong>Data Nascimento</strong></label>
                            <input class="form-control" type="date" name="dataNascimento_aluno" id="dataNascimento_aluno">
                            </div>
                            <div class="col-6">
                            <label for=""><strong>Curso</strong></label>
                            <select class="form-control" name='curso_aluno' id="curso_aluno" placeholder="Insira o nome do curso">
                                       <?php
                                            include '..\Model\conn.php';
                                            $sql = "SELECT TITULO FROM curso";
                                            
                                            $busca = mysqli_query($conexao_banco, $sql);
                                            var_dump($busca);
                                             while ($linha = mysqli_fetch_array($busca)) {
                                                    echo "<option>". $linha['TITULO'] . "</option>";
                                             } ?>
                                    </select>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="color: black">Cancelar</button>
                            <button type="submit" id="editar_matricula" class="btn btn-warning" style="color: black">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalExluirMatricula">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #dc3545">
                    <h4 class="modal-title" style="color: #fff">Excluir Matricula</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST">
                        <input type="hidden" name="idalunoExcluir" id="idalunoExcluir">
                        <h5>Tem certeza ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="color: black">Não</button>
                        <button type="submit" class="btn btn-danger" id="excluir_matricula" onclick="excluirMatricula();" style="color: #fff">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../assets/js/teste_dev.js"></script>
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('#modalEditarMatricula').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget) // Botão que acionou o modal
            var idaluno = button.data('whatever_idaluno');
            var nome_completo = button.data('whatever_nome_aluno');
            var email = button.data('whatever_email');
            var data_nascimento = button.data('whatever_dataNascimento');
            // var curso = button.data('whatever_curso');
            console.log(idaluno);
            var modal = $(this)
            modal.find('#idaluno').val(idaluno);
            modal.find('#nome_aluno').val(nome_completo);
            modal.find('#email_aluno').val(email);
            modal.find('#dataNascimento_aluno').val(data_nascimento);
            // modal.find('#curso_aluno').val(curso);
        })
    </script>
    <script type="text/javascript">
        $('#modalExluirMatricula').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget) // Botão que acionou o modal
            var idaluno = button.data('whatever_idaluno');

            console.log(idaluno);
            var modal = $(this)
            modal.find('#idalunoExcluir').val(idaluno);

        })
    </script>
</body>
</html>