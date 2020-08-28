
$(document).ready(function () {
    /* jquery.mask*/
    $('.cpf').mask('000.000.000-00');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.number').mask('000000000');
    $('.ano').mask('0000');
    $('.cep').mask('00000-000');
    $('.uf').mask('SS');
    $('.telefone').mask('(00) 0000-0000');
    $('.celular').mask('(00) 00000-0000');
    $('.rg').mask('000000000000000');
    $('.money').mask('0.000,00');
    /* jquery.mask*/
});

function valida_cpf(cpf) {
    cpf = cpf.replace('.', '');
    cpf = cpf.replace('.', '');
    cpf = cpf.replace('-', '');
    var cpfc = document.getElementById("inputCPF");
    $("#inputCPF").attr('maxlength', 11);
    $("#inputCPF").attr('type', "number");
    var numeros, digitos, soma, i, resultado, digitos_iguais = 1;
    if (cpf.length < 11) {
        cpfc.value = '';
        return false;
    }
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais) {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--)
            soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            cpfc.value = '';
            return false;
        }
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--)
            soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            cpfc.value = '';
            return false;
        }
        addPontosCPF(cpf);
        return true;
    }
    else {
        cpfc.value = '';
        return false;
    }
}
function addPontosCPF(cpfc) {
    $("#inputCPF").attr('maxlength', 14);
    $("#inputCPF").attr('type', "text");
    $("#inputCPF").val(cpfc.slice(0, 3) + '.' + cpfc.slice(3, 6) + "." + cpfc.slice(6, 9) + '-' + cpfc.slice(9));
}
function addPontosCEP(cep) {
    cep = cep.replace('-', '');
    $("#inputCEP").attr('maxlength', 9);
    $("#inputCEP").attr('type', "text");
    $("#inputCEP").val(cep.slice(0, 5) + "-" + cep.slice(5));
}


var tabelac = document.getElementById("tabela-busca-cliente");
var tabelap = document.getElementById("tabela-busca-produto");
var linhasc = tabelac.getElementsByTagName("tr");
var linhasp = tabelap.getElementsByTagName("tr");
var btnSelecionarCliente = document.getElementById("seleciona-cliente");
var btnSelecionarProduto = document.getElementById("seleciona-produto");
var btnFecharCliente = document.getElementById('fechar-cliente');
var btnFecharProduto = document.getElementById('fechar-produto');


for (var i = 0; i < linhasc.length; i++) {
    var linhac = linhasc[i];
    linhac.addEventListener("click", function () {
        //Adicionar ao atual
        selLinhac(this);
    });
}
for (var i = 0; i < linhasp.length; i++) {
    var linhap = linhasp[i];
    indexProduto = 0;
    linhap.addEventListener("click", function () {
        //Adicionar ao atual
        selLinhap(this);
    });
}

/**
 Caso passe true, você pode selecionar multiplas linhas.
 Caso passe false, você só pode selecionar uma linha por vez.
 **/
function selLinhac(linha) {
//    linha_.removeAttribute('class');
    if (linha.classList[1] == "selecionado") {
        linha.classList.remove('selecionado');
        linha.style.backgroundColor = 'white';
        return false;
    } else {
        var linhas = linha.parentElement.getElementsByTagName("tr");
        var possuiSelecionado = false;
        for (var i = 0; i < linhas.length; i++) {
            if (linha.innerText != linhas[i].innerText) {
                if (linhas[i].classList[1] == "selecionado") {
                    possuiSelecionado = true;
                    return false;
                }
            }
        }
    }
    linha.classList.toggle("selecionado");
    $(".selecionado").css("background-color", "#AAC6F3");
}
function selLinhap(linha) {
//    linha_.removeAttribute('class');
    if (linha.classList[1] == "selecionado") {
        linha.classList.remove('selecionado');
        linha.style.backgroundColor = 'white';
        return false;
    } else {
        var linhas = linha.parentElement.getElementsByTagName("tr");
        var possuiSelecionado = false;
        for (var i = 0; i < linhas.length; i++) {
            if (linha.innerText != linhas[i].innerText) {
                if (linhas[i].classList[1] == "selecionado") {
                    possuiSelecionado = true;
                    return false;
                }
            }
        }
    }
    linha.classList.toggle("selecionado");
    $(".selecionado").css("background-color", "#AAC6F3");
}

btnSelecionarCliente.addEventListener("click", function () {
    var selecionado = tabelac.getElementsByClassName("selecionado");
    //Verificar se eestá selecionado
    if (selecionado.length < 1) {
        alert("Selecione pelo menos uma linha");
        return true;
    }

    var dadosCliente = {
        'id': selecionado[0].getElementsByTagName("td")[0].innerHTML,
        'nome': selecionado[0].getElementsByTagName("td")[1].innerHTML,
        'cpf': selecionado[0].getElementsByTagName("td")[2].innerHTML,
        'cidade': selecionado[0].getElementsByTagName("td")[3].innerHTML,
        'estado': selecionado[0].getElementsByTagName("td")[4].innerHTML
    }
    clientePedido = dadosCliente;
    var dados = JSON.stringify(dadosCliente);
    $.ajax({
        type: 'POST',
        url: 'clienteDoPedido.php',
        data: dados, //x-www-form-urlencoded
        success: dados => {
            document.getElementById('idDadosBuscaCliente').value = selecionado[0].getElementsByTagName("td")[0].innerHTML;
            document.getElementById('dadosBuscaCliente').value = selecionado[0].getElementsByTagName("td")[1].innerHTML;
            $('#tbodyProduto').prepend("<tr><td><input type=\"hidden\" name=\"idcliente\" value=\""+clientePedido['id']+"\"/></td></tr>");
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });

});
var dadosProdutoAdd = null;
var ProdutoSelecionado = null;
btnSelecionarProduto.addEventListener("click", function () {
    ProdutoSelecionado = tabelap.getElementsByClassName("selecionado");
    //Verificar se eestá selecionado
    if (ProdutoSelecionado.length < 1) {
        alert("Selecione pelo menos uma linha");
        return true;
    }
    if (ProdutoSelecionado.length > 2) {
        alert("É permitido selecionar apenas um item");
        return true;
    }
    var dadosProduto = {
        'id': ProdutoSelecionado[0].getElementsByTagName("td")[0].innerHTML,
        'descricao': ProdutoSelecionado[0].getElementsByTagName("td")[1].innerHTML,
        'fabricante': ProdutoSelecionado[0].getElementsByTagName("td")[2].innerHTML
    }
    dadosProdutoAdd = dadosProduto;
    var dados = JSON.stringify(dadosProduto);
    $.ajax({
        type: 'POST',
        url: 'produtoDoPedido.php',
        data: dados, //x-www-form-urlencoded
        success: dados => {
            indexProduto++;
            $('#tbodyProduto').append("<tr><td>"+ dadosProduto['id']+"<input type=\"hidden\" name=\"idproduto"+indexProduto+"\" value=\""+dadosProduto['id']+"\"/></td><td>" + dadosProduto['descricao'] + "</td><td>" + dadosProduto['fabricante'] + "</td><td><input type=\"double\" id=\"preco" + indexProduto + "\" required name=\"preco"+indexProduto+"\" onchange=\"calcularValorTotal()\"></td><td><input type=\"double\" id=\"qntdd" + indexProduto + "\" required name=\"qntdd"+indexProduto+"\" onchange=\"calcularValorTotal()\"></td><td><input type=\"double\" id=\"desconto" + indexProduto + "\" required name=\"desconto"+indexProduto+"\" onchange=\"calcularValorTotal()\"></td><td><a href=\"#\"  class=\"btn btn-sm btn-danger\" data-toggle=\"modal\" data-target=\"#delete-modal-delete-pedido\" data-produto=\"<?php echo $pedido['id']; ?>\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a></td></tr>");
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
});
function calcularValorTotal(){
    var preco, desconto, quantidade, valorCampo;
    var campoValorTotal = $("#inputPrecoTotal");
    valorCampo = 0;
    for (var i = 1; i <= indexProduto; i++) {
        preco = "#preco"+i;
        desconto = "#desconto"+i;
        quantidade = "#qntdd"+i;
        if($(quantidade).val() !== "" && $(preco).val() !== "" && $(desconto).val() !== ""){
            precoTotal = parseFloat($(preco).val()) * parseFloat($(quantidade).val());
            valorCampo += precoTotal -(precoTotal* (parseFloat($(desconto).val()/100)))
        }
    }
    campoValorTotal.val(valorCampo);
}
function EditarValorTotal(index){
    var preco, desconto, quantidade, valorCampo;
    var campoValorTotal = $("#inputPrecoTotaled");
    valorCampo = 0;
    for (var i = 1; i <= index; i++) {
        preco = "#precoed"+i;
        desconto = "#descontoed"+i;
        quantidade = "#qntdded"+i;
        if($(quantidade).val() !== "" && $(preco).val() !== "" && $(desconto).val() !== ""){
            precoTotal = parseFloat($(preco).val()) * parseFloat($(quantidade).val());
            valorCampo += precoTotal -(precoTotal* (parseFloat($(desconto).val()/100)))
        }
    }
    campoValorTotal.val(valorCampo);
}

btnFecharCliente.addEventListener("click", function () {
    $(".trCliente").removeClass("selecionado");
    $(".trCliente").css("background-color", "white");
});
btnFecharProduto.addEventListener("click", function () {
    $(".trProduto").removeClass("selecionado");
    $(".trProduto").css("background-color", "white");
});

function salvarValor(){
    var valorTotal = parseFloat($("#inputPrecoTotal").val());
    $('#tbodyProduto').append("<tr><td><input type=\"hidden\" name=\"valorTotal\" value=\""+valorTotal+"\"/></td></tr>");
}
function editarValor(idproduto){
    var valorTotal = parseFloat($("#inputPrecoTotaled").val());
    $('#tbodyProduto').append("<tr><td><input type=\"hidden\" name=\"valorTotal\" value=\""+valorTotal+"\"/></td></tr>");
    for(var index = 1; index <= idproduto; index++){
        var idpr = "#idproduto" + index;
        $(idpr).removeAttr("disabled");
    }
}
