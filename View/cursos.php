
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
        <form id="cadastrar_curso" method="post">
                <div class="card mx-3 px-3 ">
                    <div class="card-header">
                        <h4 class="card-title">Cadastrar Curso</h4>
                    </div>
                    <div class="content mt-3">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Titulo do Curso</label>
                                    <input type="text" class="form-control" name="tituloCurso" id="tituloCurso" placeholder="Insira o nome do curso" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Descrição do Curso</label>
                                    <textarea type="text" class="form-control" name="descricaoCurso" id="descricaoCurso" placeholder="Informe a descrição do curso"></textarea>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 py-3">
                                <input type="hidden" value="matricular_aluno" name="exec" id="exec">
                                <button type="button" class="btn btn-warning" onclick="cadastrarCurso(event, 'cadastrar_curso');">Cadastrar Curso</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12">
       
            <div class="card mt-3 mx-3 px-3 mb-3">
                <div class="card-header">
                    <h4 class="card-title">Pesquisar</h4>
                </div>
            <div class="row mt-3 mb-3">
            <p id="_table"> <?php include_once('../assets/_tableCursos.php') ?></p>

            </div>  
            </div>
             
        </div>
    </div>
    <!-- <div class="row" id="resultado">
        
    </div> -->
    </div>
    

   

    <script type="text/javascript" src="../assets/js/teste_dev.js"></script>
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>