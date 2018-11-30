$(document).ready(function () {

    //mascaras
    $("#telefone").mask("(99) 9999-99999");
    $("#cep").mask("99999-999");


    //habilita select cidade ao selecionar um estado
    $("#estado").change(function () {
        $('#cidade').prop('disabled', false);

        })

});


