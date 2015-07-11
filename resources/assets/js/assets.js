$(document).ready(function(){

    $(".btn-down-qtd").click(function(){
        var parent = $(this).closest('td');
        var tr = $(parent).closest('tr');
        var campoId = $(parent).find('input[type="hidden"]');
        var campoQtd = $(parent).find('input[type="text"]');
        var qtdAtual = $(campoQtd).val();
        //var idProduct = $(parent).find('input[type="hidden"]').val();
        var idProduct = $(campoId).val();
        if (qtdAtual === 1) {
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

    /* Colocar as máscaras nos campos */
    $("#cpf").mask("999.999.999-99");
    $("#cep").mask("99999-999");
    $("#telefone").mask("(99) 9999-9999");
    $("#celular").mask("(99) 99999-9999");
    $("#nascimento").mask("99/99/9999");
    $("#de").mask("99/9999");
    $("#ate").mask("99/9999");

    /* mostrar ou ocultar o campo de descrição do tipo de endereço Outro */
    $('#nome_endereco').on('change', function(){
        var current = $(this).find(":selected").val();
        var endDesc = $('#nome_endereco_desc');
        endDesc.removeClass('error-input');
        endDesc.next().html('');
        if(current == 4){
            endDesc.removeClass('hide');
        } else {
            endDesc.addClass('hide');
            endDesc.val('');
        }
    });

    /* validar se o campo de descrição do tipo de endereço Outro foi preenchido */
    $('#cadastro-usuario').on('submit', function(){
        var idTipoEndereco = $('#nome_endereco').find(":selected").val();
        if (4 == idTipoEndereco) {
            var desc = $('#nome_endereco_desc');
            var tipoEndereco = desc.val();
            if (tipoEndereco == undefined || tipoEndereco == '' || tipoEndereco == null) {
                desc.addClass('error-input');
                desc.next().html("Este campo é obrigatório!");
                return false;
            }
        }
    });
});