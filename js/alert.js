function addAlerta(tipo, msg) {

    let icone;
    let cor;
    switch (tipo) {
        case 'erro':
            icone = 'x-circle-fill';
            cor = 'danger'; //vermelho
            break;

        case 'aviso':
            icone = 'exclamation-triangle-fill';
            cor = 'warning'; //amarelo
            break;

        case 'info':
            icone = 'info-circle-fill';
            cor = 'primary'; //azul
            break;

        case 'ok':
            icone = 'check-square-fill';
            cor = 'success'; //verde
            break;
    }

    let div = '<div class=\"alert alert-' + cor + ' alert-dismissible fade show\" role=\"alert\">\n\
                    <i class=\"bi-' + icone + '\"></i> ' + msg + '<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>\n\
               </div>';

    $('#alertas').append(div);

    $('.alert').delay(2000).slideUp(200, function () {
        $(this).alert('close');
    });

}