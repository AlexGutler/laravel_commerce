$(document).ready(function(){

    $(".btn-down-qtd").click(function(){
        var parent = $(this).closest('td');
        var campoId = $(parent).find('input[type="hidden"]');
        var campoQtd = $(parent).find('input[type="text"]');
        //var idProduct = $(parent).find('input[type="hidden"]').val();
        var idProduct = $(campoId).val();

        $.post("/cart/down/"+idProduct, function(data) {
            //usando o jquery para através do botão achar o campo de texto e atribuir o valor total do somatorio

            // para atribuir o total use data.total
            $(campoQtd).val(data.qtd);
        });

    });

    $(".btn-up-qtd").click(function(){
        var parent = $(this).closest('td');
        var campoId = $(parent).find('input[type="hidden"]');
        var campoQtd = $(parent).find('input[type="text"]');
        //var idProduct = $(parent).find('input[type="hidden"]').val();
        var idProduct = $(campoId).val();

        $.post("/cart/add/"+idProduct, function(data) {
            //usando o jquery para através do botão achar o campo de texto e atribuir o valor total do somatorio

            // para atribuir o total use data.total
            $(campoQtd).val(data.qtd);
        });
    });

});