<?php
    require_once("../../autoload.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste Dev</title>

    <link href="../../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="mx-5 px-5">
    <?php include_once("../../assets/_include.php");?>

    <div class="row mt-3">
        <div class="col-md-12">
            <form id="formulario_matricula" method="post">
                <div class="card mx-3 px-3">
                    <div class="card-header">
                        <h4 class="card-title">Cadastrar Aluno</h4>
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
                                <input type="hidden" value="cadastrar_aluno" name="exec" id="exec">
                                <button type="button" class="btn btn-warning" onclick="cadastrar_aluno(event, 'formulario_matricula');">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <form id="formulario_pesquisar_aluno" method="post">
                <div class="card mx-3 px-3">
                    <div class="card-header">
                        <h4 class="card-title">Pesquisar Aluno</h4>
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
                                    <label>Curso</label>
                                    <select class="form-control" name='cd_curso' id="cd_curso" placeholder="Insira o nome do curso">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 py-3">
                                <input type="hidden" value="pesquisar_aluno" name="exec" id="exec">
                                <button type="button" class="btn btn-warning" onclick="pesquisar_aluno(event, 'formulario_pesquisar_aluno');">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card mx-3 px-3">
                        <div id="retorno"></div>
                    </div>
                </div>
            </div>

            <div class="modal" id="MyWindowModal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="MyWindowModalTitle">Modal title</h5>
                            <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body" id="MyWindowModalConteudo"></div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn-primary" data-dismiss="modal">Voltar</button> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="../../assets/js/teste_dev.js"></script>
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/bootstap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <script>
        desabilitar_campos_carregamento('formulario_pesquisar_aluno');
        $.when(combo_curso()).done(function(a1){
            habilitar_campos_carregamento('formulario_pesquisar_aluno');
        });
    </script>

</body>
</html>