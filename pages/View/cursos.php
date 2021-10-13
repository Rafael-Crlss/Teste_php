<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste Dev</title>
        
        <link href="../../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="../../assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
    </head>
    <body class="mx-5 px-5">
        <?php include_once('../../assets/_include.php'); ?>
 
        <div class="row mt-3">
            <div class="col-md-12">
            <form id="formulario_cadastrar_curso" method="post">
                    <div class="card mx-3 px-3 ">
                        <div class="card-header">
                            <h4 class="card-title">Cadastrar Curso</h4>
                        </div>
                        <div class="content mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo do Curso</label>
                                        <input type="text" class="form-control" name="no_curso" id="no_curso" placeholder="Insira o nome do curso" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descrição do Curso</label>
                                        <textarea type="text" rows="1" class="form-control" name="descricao_curso" id="descricao_curso" placeholder="Informe a descrição do curso"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 py-3">
                                    <input type="hidden" value="cadastrar_curso" name="exec" id="exec">
                                    <button type="button" class="btn btn-warning" onclick="cadastrar_curso(event, 'formulario_cadastrar_curso');">Cadastrar Curso</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div> 

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card mx-3 px-3">
                    <div class="card-header">
                        <h4 class="card-title">Pesquisar Curso</h4>
                    </div>
                    <div id="retorno"></div>
                </div>
            </div>
        </div>

            <div class="modal" id="MyWindowModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
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


    

   
    <script type="text/javascript" src="../../assets/js/teste_dev.js"></script>
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/bootstap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <script>
        pesquisar_curso();
    </script>

</body>
</html>