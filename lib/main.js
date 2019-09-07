var obj = [];

function template(obj){
    var temp = '';


    var total_imposto = 0;
    var total = 0;

    obj.forEach(function(a, i){
        temp += '<tr>' +
                '<td>'+a.nome+'</td>' +
                '<td>'+a.quantidade+'</td>' +
                '<td>'+a.percentual.toFixed(2)+'</td>' +
                '<td>'+a.valor.toFixed(2)+'</td>' +
                '<td><a class="waves-effect waves-light btn-flat btn-small" id="remove_'+i+'" data-id="'+i+'">' +
                '<i class="material-icons">remove</i></a></td>' +
                '</tr>';

        total_imposto += a.percentual;
        total += (a.valor + a.percentual);

        $(document).ready(function () {
            $('#remove_'+i).unbind();

            $('#remove_'+i).bind( "click", function() {
                var id = $(this).data('id');
                delete obj[id];

                $('#listagem').html(template(obj));
            });
        })
    });
    temp += '<tr>' +
        '<td colspan="4">Total impostos</td>' +
        '<td>'+total_imposto.toFixed(2)+'</td>' +
        '</tr>';
    temp += '<tr>' +
        '<td colspan="4">Total geral</td>' +
        '<td>'+total.toFixed(2)+'</td>' +
        '</tr>';

    return temp;
}

$(document).ready(function(){
    $('.btn-produto').click(function (e) {
        var id = $(this).data('id');
        var valor = $(this).data('valor');
        var nomeProduto = $(this).data('nome');
        var percentual = ($(this).data('percentual') / 100);

        if(obj[id]){
            obj[id].quantidade++;
            obj[id].valor += valor;
            obj[id].percentual += (valor * percentual);
        }else{
            obj[id] = {
                nome: nomeProduto,
                quantidade: 1,
                percentual: (valor * percentual),
                valor: valor
            }
        }

        $('#listagem').html(template(obj));
    });
});