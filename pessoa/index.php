<!doctype html>
<html lang="pt-br">
    <head>
        <title>MC - Pessoa</title>
        <?php include '../head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include '../navbar.php'; ?>  
            <div class="row justify-content-center text-center">
                <h3>Cadastro de Pessoa</h3>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">                        
                        <div class="card-body">

                            <div class="row d-flex justify-content-center mb-3">
                                <div class="col-10">
                                    <input class="form-control" type="search" id="buscaPes" placeholder="Pesquisar por documento, nome, local ou município">
                                </div>
                            </div>

                            <form action="salvarPessoa.php" id="cadPessoa">
                                <div class="row mb-2">
                                    <input type="hidden" id="ID" name="ID">
                                    <div class="col-3">
                                        <label for="cpf-cnpj" class="form-label">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio-cpf-cnpj" id="radio-cpf" value="F" checked>
                                                <label class="form-check-label" for="radio-cpf">CPF</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radio-cpf-cnpj" id="radio-cnpj" value="J">
                                                <label class="form-check-label" for="radio-cnpj">CNPJ</label>
                                            </div>
                                        </label>
                                        <input type="text" class="form-control" id="cpf-cnpj" name="cpf-cnpj" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="ie" class="form-label">Inscrição Estadual</label>
                                        <input type="text" class="form-control" id="ie" name="ie">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-11">
                                        <label for="razao-social" class="form-label">Nome ou Razão social</label>
                                        <input type="text" class="form-control MAIUSCULA" id="razao-social" name="razao-social" minlength="2" maxlength="60" required>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-11">
                                        <label for="nome-fantasia" class="form-label">Local ou Nome Fantasia</label>
                                        <input type="text" class="form-control MAIUSCULA" id="nome-fantasia" name="nome-fantasia" minlength="2" maxlength="60" required>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label class="form-label">Dados Bancários</label>
                                        <textarea class="form-control" rows="3" maxlength="100" id="dados-ban" name="dados-ban"></textarea>
                                    </div>
                                </div>

                                <!--********** MUNICIPIO **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted">
                                        Município
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row d-flex justify-content-center mb-3">
                                    <div class="col-6">
                                        <input class="form-control form-control-lg" type="text" id="buscaMun" placeholder="Pesquisar por nome do município">
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mb-2">
                                    <input type="hidden" id="cod-mun" name="cod-mun">
                                    <div class="col-5">
                                        <input type="text" class="form-control readonly" id="nome-mun" required>
                                    </div>
                                    <div class="col-1">
                                        <input type="text" class="form-control" id="uf" readonly>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-sm btn-success" form="cadPessoa" id="btnSalvar">
                                <i class="bi-check2-circle"></i>
                                Salvar
                            </button>
                            <button type="button" class="btn btn-sm btn-danger justify-content-start" id="btnCancelar">
                                <i class="bi-x-circle"></i>
                                Cancelar
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row justify-content-end fixed-bottom pe-3">
                <div class="col-3" id="alertas">
                </div>
            </div>

            <p class="text-muted mt-2">© 2023 - Paulo Henrique</p>
        </div>
        <?php include '../js.php'; ?>
        <script>
            $(document).ready(function () {
                //LIMPAR
                function limparForm() {
                    $('#buscaPes, #ID, #cpf-cnpj, #ie, #razao-social, #nome-fantasia, #dados-ban, #buscaMun, #cod-mun, #nome-mun, #uf').val('');
                    $('#radio-cpf').click();
                }

                $('#btnCancelar').click(function () {
                    limparForm();
                });
                //MASCARAS               
                $('#ie').mask('00999999999999', {reverse: true, clearIfNotMatch: true});
                $('#cpf-cnpj').mask('000.000.000-00');
                $('input[name="radio-cpf-cnpj"]').change(function () {
                    $('#cpf-cnpj').val('');
                    if ($(this).val() == 'F') {
                        $('#cpf-cnpj').mask('000.000.000-00');
                    } else {
                        $('#cpf-cnpj').mask('00.000.000/0000-00');
                    }
                });
                //VALIDACAO CPF OU CNPJ
                $('#cpf-cnpj').blur(function () {
                    let valor = $(this).val();
                    switch (valor.length) {
                        case 14:
                            //CPF
                            if (!validarCPF(valor)) {
                                $(this).val('');
                                addAlerta('erro', 'CPF inválido!');
                            }
                            break;
                        case 18:
                            //CNPJ
                            if (!validarCNPJ(valor)) {
                                $(this).val('');
                                addAlerta('erro', 'CNPJ inválido!');
                            }
                            break;
                        default:
                            $(this).val('');
                            break;
                    }
                });
                //FORMULARIO PESSOA
                $('#cadPessoa').submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(), // serializes the form's elements.
                        success: function (data) {
                            switch (data) {
                                case 'I':
                                    addAlerta('ok', 'Pessoa <strong>cadastrada</strong> com sucesso!');
                                    limparForm();
                                    break;
                                case 'EI':
                                    addAlerta('erro', 'Pessoa já cadastrada!');
                                    break;
                                case 'A':
                                    addAlerta('ok', 'Pessoa <strong>alterada</strong> com sucesso!');
                                    limparForm();
                                    break;
                                case 'EA':
                                    addAlerta('erro', 'Pessoa !');
                                    break;
                            }
                        }
                    });

                });

            });
        </script>        
        <script type="module">
            import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";
            //*********************AUTOCOMPLETE MUNICIPIO*********************
            const om = {
                onSelectItem: (item) => {
                    $('#buscaMun').val('');
                    $('#cod-mun').val(item.value);
                    $('#nome-mun').val(item.nome);
                    $('#uf').val(item.uf);
                },
                maximumItems: 8,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum Município Encontrado!',
                fullWidth: true,
                updateOnSelect: false,
                //SERVER
                server: 'acMunicipio.php',
                liveServer: true,
                serverMethod: 'POST'
            };
            new Autocomplete($('#buscaMun')[0], om);

            //*********************AUTOCOMPLETE PESSOA*********************
            const op = {
                onSelectItem: (i) => {
                    $('#buscaPes').val('');
                    $('#ID').val(i.value);
                    i.tipo == 'F' ? $('#radio-cpf').click() : $('#radio-cnpj').click();
                    $('#cpf-cnpj').val(i.cpfcnpj).trigger('input');
                    $('#ie').val(i.ie).trigger('input');
                    $('#razao-social').val(i.razao);
                    $('#nome-fantasia').val(i.fant);
                    $('#dados-ban').val(i.dban);
                    $('#cod-mun').val(i.cod);
                    $('#nome-mun').val(i.nome);
                    $('#uf').val(i.uf);
                },
                maximumItems: 10,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhuma Pessoa Encontrada!',
                fullWidth: true,
                //SERVER
                server: 'acPessoa.php',
                liveServer: true,
                serverMethod: 'POST',
                showAllSuggestions: true
            };
            new Autocomplete($('#buscaPes')[0], op);
        </script>
    </body>
</html> 