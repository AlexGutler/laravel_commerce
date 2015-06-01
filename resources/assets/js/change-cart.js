$(document).ready(function(){

    $(".btn-down-qtd").click(function(){
        var parent = $(this).closest('td');
        var tr = $(parent).closest('tr');
        var campoId = $(parent).find('input[type="hidden"]');
        var campoQtd = $(parent).find('input[type="text"]');
        var qtdAtual = $(campoQtd).val();
        //var idProduct = $(parent).find('input[type="hidden"]').val();
        var idProduct = $(campoId).val();
        if (qtdAtual == 1) {
            tr.fadeOut('slow',function(){ $(this).remove(); });
        }
        $.get("/cart/down/"+idProduct, function(data) {
            //usando o jquery para através do botão achar o campo de texto e atribuir o valor total do somatorio
            var obj = jQuery.parseJSON(data);
            // para atribuir o total use data.total
            $(campoQtd).val(obj.qtd);
        });

    });

    $(".btn-up-qtd").click(function(){
        var parent = $(this).closest('td');
        var campoId = $(parent).find('input[type="hidden"]');
        var campoQtd = $(parent).find('input[type="text"]');
        //var idProduct = $(parent).find('input[type="hidden"]').val();
        var idProduct = $(campoId).val();

        $.get("/cart/up/"+idProduct, function(data) {
            //usando o jquery para através do botão achar o campo de texto e atribuir o valor total do somatorio
            //alert(data);

            // convert o jSon no formato JavaScript
            var obj = jQuery.parseJSON(data);

            //alert(obj);
            //alert(obj.qtd);
            // para atribuir o total use data.total
            $(campoQtd).val(obj.qtd);
        });
    });

});