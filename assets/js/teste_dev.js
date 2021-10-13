function pesquisar_aluno(e, form){
    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: $('#'+form).serializeArray(),
        success: function(retorno){
            $("#retorno").html(retorno);
        }
        
    });
    e.preventDefault();
    return false;
}

function pesquisar_curso(){

    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: "exec=pesquisar_curso",
        success: function(retorno){
            $("#retorno").html(retorno);
        }
        
    });

}

function cadastrar_curso(e, form){
    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: $("#"+form).serializeArray(),
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Curso Cadastrado Com Sucesso');
                pesquisar_curso();
                limpar_campos_form('formulario_cadastrar_curso');
            }else{
                alert('Falha ao Cadastrar Curso');
            }
        }
    });
    e.preventDefault();
    return false;
}

function cadastrar_aluno(e, form){
    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: $("#"+form).serializeArray(),
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Aluno Cadastrado Com Sucesso');
                limpar_campos_form('formulario_matricula');
            }else{
                alert('Falha ao Cadastrar Aluno');
            }
        }
    });
    e.preventDefault();
    return false;
}

function matricular_aluno(e, form){

    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: $("#"+form).serializeArray(),
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Aluno Matriculado Com Sucesso');
            }else{
                alert('Aluno já Matriculado no Curso');
            }

        }
    });
    e.preventDefault();
    return false;
}

function editar_curso(e, form){

    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: $("#"+form).serializeArray(),
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Curso Editado Com Sucesso');
            }else{
                alert('Falha ao Editar o Curso');
            }
        }
    });
    e.preventDefault();
    return false;
}

function editar_aluno(e, form){

    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: $("#"+form).serializeArray(),
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Aluno Editado Com Sucesso');
            }else{
                alert('Falha ao Editar o Aluno');
            }
        }
    });
    e.preventDefault();
    return false;
}

function excluir_curso(id_curso){
    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: "exec=excluir_curso&cd_curso="+id_curso,
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Curso Excluido Com Sucesso');
                pesquisar_curso();
            }else{
                alert('Falha ao excluir o Curso');
            }
        }
    });
    e.preventDefault();
    return false;
}

function excluir_aluno(id_aluno){
    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: "exec=excluir_aluno&id_aluno="+id_aluno,
        success: function(resultado){
            if(resultado == 'vazio'){
                alert('Aluno Excluido Com Sucesso');
            }else{
                alert('Falha ao excluir o Aluno');
            }
        }
    });
    e.preventDefault();
    return false;
}

function combo_curso(){

    $.ajax({
        type    : "POST",
        url:  "../../Controller/testedevC.php",
        dataType: "JSON",
        data    : "exec=combo_curso",
        async   : false,
        success : function(retorno){
 
            var options = "<option value=''>Escolha um Curso</option>";

            for(var i=0;i<$(retorno).length;i++){
                options += "<option value='"+ retorno[i][0] +"'>"+ retorno[i][1] +"</option>";
            }
            $('#cd_curso').html(options);
        }
    });
}

function combo_aluno(){

    $.ajax({
        type    : "POST",
        url:  "../../Controller/testedevC.php",
        dataType: "JSON",
        data    : "exec=combo_aluno",
        async   : false,
        success : function(retorno){

            var options = "<option value=''>Selecione um Aluno</option>";

            for(var i=0;i<$(retorno).length;i++){
                options += "<option value='"+ retorno[i][0] +"'>"+ retorno[i][1] +"</option>";
            }
            $('#id_aluno').html(options);
        }
    });
}

function modal_matricular_aluno(id_curso){

    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: "exec=modal_matricular_aluno&id_curso="+id_curso,
        success: function(resultado){
            resultado = JSON.parse(resultado);
            ShowModalCustomizado(resultado[0], "Matricular Aluno", resultado[1]);
        }
    });
}


function modal_editar_aluno(id_aluno){
alert(id_aluno);
    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: "exec=modal_editar_aluno&id_aluno="+id_aluno,
        success: function(resultado){
            console.log(resultado);
            resultado = JSON.parse(resultado);
            ShowModalCustomizado(resultado[0], "Editar Aluno", resultado[1]);
        }
    });

}

function modal_editar_curso(id_curso){

    $.ajax({
        type: "POST",
        url:  "../../Controller/testedevC.php",
        data: "exec=modal_editar_curso&id_curso="+id_curso,
        success: function(resultado){
            resultado = JSON.parse(resultado);
            ShowModalCustomizado(resultado[0], "Editar Curso", resultado[1]);
        }
    });
}

function ShowModalCustomizado(HConteudo, HTitle, HFooter){

    $("#MyWindowModalConteudo").html(HConteudo);

    $("#MyWindowModalTitle").html(HTitle);

    $("#MyWindowModal").modal({
        keyboard: true,
        show: true,
        showClose: false,
        escapeClose: true
    });

    // HFooter += '<button type="button" class="btn btn-danger" data-dismiss="modal">Voltar</button>';
    $(".modal-footer").html(HFooter);
}

function limpar_campos_form(form){
    $("#"+form).each(function(){
        $(this).find(':input:not(:hidden, select)').val("").trigger('change');
    });
}

function desabilitar_campos_carregamento(form){
    $("#"+form).each(function(){
        $(this).find('select, button').attr('disabled','disabled');
    });
}

function habilitar_campos_carregamento(form){
    $("#"+form).each(function(){
        $(this).find('select, button').removeAttr('disabled');
    });
}