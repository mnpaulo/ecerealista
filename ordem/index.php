<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Emissão de Ordem</title>
        <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <!-- Bootstrap Icons CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <!-- Bootstrap DatePicker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css">
        <!-- Utilidades -->
        <style>
            @media (min-width: 1200px) {
                .container{
                    /* largura maxima do container */
                    max-width: 600px;
                }
            }

            .MAIUSCULA {
                text-transform: uppercase;
            }
        </style>
        <link rel="stylesheet" href="utilidade.css">
    </head>
    <body>
        <div class="container mt-2">
            <h2 class="text-center">Gerador de Ordem</h2>


            <form method="POST" action="gerarPDF.php">

                <!-- Emissor -->
                <div class="row">
                    <div class="col-auto text-muted">
                        Emissor
                    </div>
                    <div class="col"><hr></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <label for="Emissor" class="form-label">Empresa</label>
                        <select class="form-select" name="Emissor" id="Emissor">                            
                            <option>MABOL</option>
                            <option>NORTE E SUL</option>
                        </select>
                    </div> 
                    <div class="col-6">
                        <label for="Numero" class="form-label"><b>Número</b></label>
                        <input type="text" class="form-control naozero px-2" name="Numero" id="Numero" maxlength="9" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="Data" class="form-label">Data</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" name="Data" id="Data" readonly>
                            <button class="btn btn-outline-dark" type="button">
                                <i class="bi-calendar3"></i>
                            </button>                                    
                        </div>
                    </div>
                </div>
                <!-- Embarque -->
                <div class="row">
                    <div class="col-auto text-muted">
                        Embarque
                    </div>
                    <div class="col"><hr></div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <label for="LocalEmb" class="form-label"><b>Local</b></label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="LocalEmb" id="LocalEmb" maxlength="25" required>
                    </div>
                    <div class="col-6">
                        <label for="MunicipioEmb" class="form-label"><b>Município</b></label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="MunicipioEmb" id="MunicipioEmb" maxlength="23" required>
                    </div>
                </div>

                <!-- Descarga -->
                <div class="row">
                    <div class="col-auto text-muted">
                        Descarga
                    </div>
                    <div class="col"><hr></div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="LocalDes" class="form-label">Local</label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="LocalDes" id="LocalDes" maxlength="25">
                    </div>
                    <div class="col-5">
                        <label for="MunicipioDes" class="form-label">Município</label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="MunicipioDes" id="MunicipioDes" maxlength="23">
                    </div>
                    <div class="col-2">
                        <label for="UF" class="form-label">UF</label>
                        <select class="form-select" name="UFDes" id="UFDes">    
                            <option></option>
                            <option>MS</option>
                            <option>SP</option>
                            <option>PR</option>
                            <option>SC</option>
                            <option>RS</option>
                        </select>
                    </div> 
                </div>

                <!-- Caminhão -->
                <div class="row">
                    <div class="col-auto text-muted">
                        Caminhão
                    </div>
                    <div class="col"><hr></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="Placa" class="form-label"><b>Cavalo</b></label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="Placa" id="Placa" required>
                    </div>
                    <div class="col-3">
                        <label for="Placa1" class="form-label">Carreta 1</label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="Placa1" id="Placa1">
                    </div>
                    <div class="col-3">
                        <label for="Placa2" class="form-label">Carreta 2</label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="Placa2" id="Placa2">
                    </div>
                    <div class="col-3">
                        <label for="Placa3" class="form-label">Carreta 3</label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="Placa3" id="Placa3">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9">
                        <label for="Motorista" class="form-label"><b>Motorista</b></label>
                        <input type="text" class="form-control MAIUSCULA px-2" name="Motorista" id="Motorista" maxlength="30" required>
                    </div>
                    <div class="col-3">
                        <label for="CPF" class="form-label">CPF</label>
                        <input type="text" class="form-control px-2" name="CPF" id="CPF">
                    </div>
                </div>

                <!-- Produto -->
                <div class="row">
                    <div class="col"><hr></div>
                </div>
                <div class="row mb-3">
                    <div class="col-10">
                        <label for="Produto" class="form-label">Produto</label>
                        <select class="form-select" name="Produto" id="Produto">
                            <option>MILHO DEBULHADO</option>
                            <option>SOJA EM GRAO</option>
                            <option>RESIDUO DE MILHO</option>
                        </select>
                    </div> 
                    <div class="col-2">
                        <label for="TON" class="form-label">TON</label>
                        <input type="text" class="form-control px-2" name="TON" id="TON">
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-danger">Download <i class="bi-file-pdf"></i></button>

            </form>

            <p class="text-muted mt-3">© 2023 - Paulo Henrique</p>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <!-- Bootstrap DatePicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>    
        <script src="https://unpkg.com/bootstrap-datepicker@1.10.0/dist/locales/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
        <!-- jQuery Mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <!-- Alertas -->
        <script src="alert.js"></script>
        <!-- AutoComplete Busca Contrato -->
        <script>
            $(document).ready(function () {
                //AJAX Form
                $('#formff').submit(function (e) {
                    if ($('#formff').valid()) {
                        e.preventDefault();
                        return; // <-- here
                    }
                    //---------------^---------------
                    e.preventDefault();
                    var firstname = $('#First_name').val(),
                            lastname = $('#last_name').val(),
                            username = $('#reg_username').val(),
                            password = $('#password').val(),
                            email = $('#email').val();
                    $.ajax({
                        type: "POST",
                        url: "doRegister.php",
                        data: "first_name=" + firstname + "&last_name=" + lastname + "&username=" + username + "&password=" + password + "&email=" + email,
                        success: function (html) {
                            console.log(html);
                        }
                    });
                    return false;

                });
                //Datepicker
                $('#datepicker').datepicker({
                    startDate: "0d",
                    maxViewMode: 2,
                    language: "pt-BR",
                    daysOfWeekHighlighted: "0",
                    autoclose: true,
                    container: '#datepicker',
                    orientation: 'bottom',
                    todayHighlight: true
                });
                function setDataHoje() {
                    const d = new Date();
                    let data = ('0' + d.getDate()).slice(-2) + '/' +
                            ('0' + (d.getMonth() + 1)).slice(-2) + '/' +
                            d.getFullYear();
                    $('#datepicker').datepicker('update', data);
                }
                setDataHoje();
                //Transforma caracter em maiuscula ao digitar
                $('.MAIUSCULA').keyup(function () {
                    $(this).val($(this).val().toUpperCase());
                });
                //Não permite valor 0 ao sair do campo
                $('.naozero').blur(function () {
                    if ($(this).val() == 0) {
                        $(this).val('');
                    }
                });

                $('#Numero').mask('999999990', {reverse: true});
                $('#Placa, #Placa1, #Placa2, #Placa3').mask('SSS-0A00');
                $('#CPF').mask('000.000.000-00', {reverse: true});
                $('#TON').mask('90', {reverse: true});

                //Select empresa emissora
                $.getJSON('numero.json', function (r) {
                    $('#Numero').val(r.numero);
                });
            });
        </script>
    </body>
</html> 