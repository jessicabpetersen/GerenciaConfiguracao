/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function valida_cpf(cpf) {
    cpf = cpf.replace('.', '')
    cpf = cpf.replace('.', '')
    cpf = cpf.replace('-', '')
    var cpfc = document.getElementById("inputCPF");
    $("#inputCPF").attr('maxlength', 11);
    $("#inputCPF").attr('type', "number");
    var numeros, digitos, soma, i, resultado, digitos_iguais = 1;
    if (cpf.length < 11) {
        cpfc.value = '';
        return false
    }
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1))
        {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais)
    {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--)
            soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)){
            cpfc.value = '';
            return false;
        }
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--)
            soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)){
            cpfc.value = '';
            return false;
        }
        addPontosCPF(cpf);
        return true;
    } else{
        cpfc.value = '';
        return false;
    }
}
function addPontosCPF(cpfc) {
    $("#inputCPF").attr('maxlength', 14);
    $("#inputCPF").attr('type', "text");
    $("#inputCPF").val(cpfc.slice(0, 3) + '.' + cpfc.slice(3, 6) + "." + cpfc.slice(6, 9) + '-' + cpfc.slice(9));
}
function addPontosCEP(cep){
    cep = cep.replace('-', '')
     $("#inputCEP").attr('maxlength', 9);
    $("#inputCEP").attr('type', "text");
    $("#inputCEP").val(cep.slice(0,5)+"-"+cep.slice(5));
}
