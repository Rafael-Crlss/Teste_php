function matricular_aluno(e, form) {
    $.ajax({
        type: "POST",
        url: "../Controller/testedevC.php",
        data: $('#' + form).serializeArray(),
        success: function (retorno) {
            alert(retorno);
        }

    });
    e.preventDefault();
    return false;
}
function pesquisar_aluno(e, form) {
    $.ajax({
        type: "POST",
        url: "../Controller/pesquisar_aluno.php",
        data: $('#' + form).serializeArray(),
        success: function (retorno) {
            $("#resultado").html(retorno);
        }

    });
    e.preventDefault();
    return false;
}
function excluirMatricula(e) {

    var idExcluir = $('#idalunoExcluir').val();

    $.ajax({
        type: "POST",
        url: "../Controller/excluirMatricula.php",
        data: { idExcluir: idExcluir },
        success: function (retorno) {
            alert(retorno);
        }
    });
    e.preventDefault();
    return false;
}

function cadastrarCurso(e, form) {
    $.ajax({
        type: "POST",
        url: "../Controller/cadastrarCurso.php",
        data: $('#' + form).serializeArray(),
        success: function (retorno) {
            alert(retorno);
            location.reload();
        }

    });
    e.preventDefault();
    return false;
    $("#tituloCurso").val('');
    $("#descricaoCurso").val('');
}