//Transforma o caracter em maiuscula
$('.MAIUSCULA').keyup(function () {
    $(this).val($(this).val().toUpperCase());
});
//Campo readonly que permite somente tab
$('.readonly').on('keydown paste focus mousedown', function (e) {
    if (e.keyCode != 9) { //permitir tecla TAB (9)
        e.preventDefault();
    }
});
// NÃO PERMITE VALOR 0 AO SAIR DO CAMPO
$('.naozero').blur(function () {
    if ($(this).val().replace(/\D/g, '') == 0) {
        $(this).val('');
    }
});
// COMPLETA CENTAVOS COM ,00 SE VAZIO
$('.dinheiro').blur(function () {
    let campo = $(this).val();
    if (!campo.includes(',') && $(this).val().replace(/\D/g, '') != 0) {
        $(this).val(campo + ',00');
    }
});
// SETA DATA DE HOJE NO DATEPICKER PASSADO NA VARIAVEL dp
function setDataHoje(dp) {
    const d = new Date();
    let data = ('0' + d.getDate()).slice(-2) + '/' +
            ('0' + (d.getMonth() + 1)).slice(-2) + '/' +
            d.getFullYear();
    $(dp).datepicker('setDate', data);
}
// SETA DATA PASSADA NA VARIAVEL d, NO DATEPICKER PASSADO NA VARIAVEL dp
function setData(dp, da) {
    let data = ('0' + da.getDate()).slice(-2) + '/' +
            ('0' + (da.getMonth() + 1)).slice(-2) + '/' +
            da.getFullYear();
    $(dp).datepicker('setDate', data);
}
// CONVERTER DATA UTC PARA BR DD/MM/YYYY
function conDataUTCparaBR(data) {
    const d = data;
    return ('0' + d.getDate()).slice(-2) + '/' +
            ('0' + (d.getMonth() + 1)).slice(-2) + '/' +
            d.getFullYear();
}
//********** VALIDAR CPF **********
function validarCPF(cpf) {
    //remove todos os digitos que nao forem numeros
    cpf = cpf.replace(/[^\d]+/g, '');

    //invalido se estiver vazio
    if (cpf == '')
        return false;

    //invalido se nao tiver 14 digitos
    if (cpf.length != 11)
        return false;

    //invalido se for sequencial com mesmo numero de 1 a 9
    if (
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999" ||
            cpf == "01234567890")
        return false;

    add = 0;
    for (i = 0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}
//********** VALIDAR CNPJ **********
function validarCNPJ(cnpj) {
    //remove todos os digitos que nao forem numeros
    cnpj = cnpj.replace(/[^\d]+/g, '');

    //invalido se estiver vazio
    if (cnpj == '')
        return false;

    //invalido se nao tiver 14 digitos
    if (cnpj.length != 14)
        return false;

    //invalido se for sequencial com mesmo numero de 1 a 9
    if (
            cnpj == "00000000000000" ||
            cnpj == "11111111111111" ||
            cnpj == "22222222222222" ||
            cnpj == "33333333333333" ||
            cnpj == "44444444444444" ||
            cnpj == "55555555555555" ||
            cnpj == "66666666666666" ||
            cnpj == "77777777777777" ||
            cnpj == "88888888888888" ||
            cnpj == "99999999999999" ||
            cnpj == "01234567890123")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
        return false;

    return true;
}