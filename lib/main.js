function template(obj){
    var temp = '';

    obj.forEach(function(a){
        temp += '<tr>' +
                '<td>'+a.nome+'</td>' +
                '<td>'+a.quantidade+'</td>' +
                '<td>'+a.percentual.toFixed(2)+'</td>' +
                '<td>'+a.valor.toFixed(2)+'</td>' +
                '</tr>';
    });

    return temp;
}

$(document).ready(function(){
    var obj = [];
    var total = 0;
    var totalImposto = 0;
    $('.btn-produto').click(function (e) {
        var id = $(this).data('id');
        var valor = $(this).data('valor');
        var nomeProduto = $(this).data('nome');
        var percentual = ($(this).data('percentual') / 100);
        var percentualA = 1 + percentual;
        totalImposto += (valor * percentual);
        total += (valor * percentualA);

        if(obj[id]){
            obj[id].quantidade++;
            obj[id].valor += (valor * percentualA);
            obj[id].percentual += percentualA;
        }else{
            obj[id] = {
                nome: nomeProduto,
                quantidade: 1,
                percentual: percentualA,
                valor: (valor * percentualA)
            }
        }

        $('#listagem').html(template(obj));
        $('.total.geral .valor').html(total.toFixed(2));
        $('.total.imposto .valor').html(totalImposto.toFixed(2));
    });

});