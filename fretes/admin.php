<?php
//iniciar a sessao
session_start();
//verificar se a pessoa está logada
if (!isset($_SESSION['usuario'])) {
    //se nao estiver, envio para o login.php
    header("Location:login.php");
}
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mabol Cereais - Fretes Admin</title>
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <!-- Bootstrap Icons CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Bootstrap DatePicker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css">
        <!-- Utilidades -->
        <link rel="stylesheet" href="../css/util.css">
        <style>
            .centro {
                position: absolute;
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }

            #tabEmbData tr {
                cursor: pointer;
            }
        </style>
    </head>
    <body>        
        <div class="container pt-4">
            <div class="row">

                <div class="col-4">

                    <div class="card">
                        <div class="card-body pt-1 pb-0">

                            <div class="d-flex justify-content-center mb-2" id="data"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <tbody class="table-group-divider" id="tabEmbData">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmaExc">
                                <i class="bi-stop-fill me-1"></i>
                                Excluir embarques do dia selecionado
                            </button>
                        </div>
                    </div>                                    

                </div>

                <div class="col-8">

                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" role="tab" data-bs-toggle="tab" data-bs-target="#aba-frete">Fretes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="tab" data-bs-toggle="tab" data-bs-target="#aba-embarque">Embarques</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade show active" id="aba-frete" role="tabpanel">

                            <div class="card mb-3">
                                <div class="card-header text-center py-0">
                                    <h4>Cadastro de Frete</h4>
                                </div>
                                <div class="card-body"> 
                                    <form id="FormEmbFre">

                                        <div class="row d-flex justify-content-center mb-1">
                                            <div class="col-8">                            
                                                <input type="text" class="form-control" 
                                                       id="PesEmbFre" 
                                                       placeholder="Pesquisar por local de embarque ou nome do município" 
                                                       autocomplete="off">                                          
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-2 d-flex align-items-end">
                                                <input type="text" class="form-control" id="CodEmbFre" readonly>
                                            </div> 
                                            <div class="col-7">
                                                <label for="LocalEmbFre" class="form-label">Local</label>
                                                <input type="text" class="form-control px-1" id="LocalEmbFre" readonly>                               
                                            </div>
                                        </div>
                                        <div class="row mt-2 d-flex justify-content-center">
                                            <div class="col-7">
                                                <label for="MunEmbFre" class="form-label">Município</label>
                                                <input type="text" class="form-control px-1" id="MunEmbFre" readonly>                               
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row d-flex justify-content-center mb-1">
                                            <div class="col-6">                            
                                                <input type="text" class="form-control" 
                                                       id="PesMunFre" 
                                                       placeholder="Pesquisar Município por nome" 
                                                       autocomplete="off">                                          
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="hidden" id="CodMunFre">
                                            <div class="col-7">
                                                <label for="Local" class="form-label">Nome</label>
                                                <input type="text" class="form-control px-1" id="MunFre" readonly>                               
                                            </div>
                                            <div class="col-1">
                                                <label for="Local" class="form-label">UF</label>
                                                <input type="text" class="form-control px-1" id="UF" readonly>                               
                                            </div>
                                            <div class="col-3">
                                                <label for="Valor" class="form-label">Valor</label>
                                                <div class="input-group">
                                                    <span class="input-group-text px-1">R$</span>
                                                    <input type="text" class="form-control naozero px-1" id="Valor" maxlength="3">
                                                    <span class="input-group-text px-1">,00/TON</span>
                                                </div>
                                            </div>
                                            <div class="col-1 d-flex align-items-end justify-content-center">
                                                <button type="button" class="btn btn-outline-success" id="btnAddFrete"><i class="bi-floppy-fill"></i></button>
                                            </div>
                                        </div> 

                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th scope="col" class="col-10">Município</th>
                                                        <th scope="col" class="col-1">Valor</th>
                                                        <th scope="col" class="col-1"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-group-divider" id="TabFretesEmb">
                                                </tbody>
                                            </table>
                                        </div>

                                    </form>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-success" form="FormEmbFre">
                                        <i class="bi-floppy2 me-1"></i>
                                        Salvar
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary" id="btnNovoFormEmbFre">
                                        <i class="bi-plus-lg me-1"></i>
                                        Novo
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="aba-embarque" role="tabpanel">

                            <div class="card">
                                <div class="card-header text-center py-0">
                                    <h4>Cadastro de Embarque</h4>
                                </div>
                                <div class="card-body">
                                    <form action="salvarEmbarque.php" id="FormEmb">

                                        <div class="row mb-1">
                                            <div class="col-2">
                                                <input type="text" class="form-control" id="CodEmb" name="CodEmb" readonly>
                                            </div> 
                                            <div class="col-8 px-0">                            
                                                <input type="text" class="form-control" 
                                                       id="PesEmb" 
                                                       placeholder="Pesquisar por local de embarque ou nome do município" 
                                                       autocomplete="off">                                          
                                            </div>
                                        </div> 

                                        <div class="row mb-2">
                                            <div class="col-7">
                                                <label for="Local" class="form-label">Local</label>
                                                <input type="text" class="form-control MAIUSCULA px-1" id="Local" name="Local" maxlength="30" required>                               
                                            </div>

                                            <div class="col-3">
                                                <label for="Produto" class="form-label">Produto</label>
                                                <select class="form-select ps-1" id="Produto" name="Produto">
                                                    <option value="53218">MILHO DEBULHADO</option>
                                                    <option value="17625">SOJA EM GRAO</option>
                                                </select>
                                            </div> 

                                            <div class="col-2">
                                                <label for="Saldo" class="form-label">Saldo</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control px-2" id="Saldo" name="Saldo" maxlength="4">
                                                    <span class="input-group-text px-1">TON</span>
                                                </div>
                                            </div>                                            
                                        </div> 
                                        <div class="row mb-3">
                                            <div class="col-7">
                                                <label for="Local" class="form-label">Observação</label>
                                                <input type="text" class="form-control MAIUSCULA px-1" id="Obs" name="Obs" maxlength="30">                               
                                            </div>
                                        </div>

                                        <div class="row d-flex justify-content-center">
                                            <input type="hidden" id="CodMun" name="CodMun">
                                            <div class="col-8">                            
                                                <input type="text" class="form-control" 
                                                       id="PesMunEmb" 
                                                       placeholder="Pesquisar Município do MS por nome" 
                                                       autocomplete="off" 
                                                       required>                                          
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <button type="submit" class="btn btn-sm btn-success" form="FormEmb">
                                        <i class="bi-floppy2 me-1"></i>
                                        Salvar
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" id="btnExcEmb">
                                        <i class="bi-trash-fill me-1"></i>
                                        Excluir
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>   
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <!-- Bootstrap DatePicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>    
        <script src="https://unpkg.com/bootstrap-datepicker@1.10.0/dist/locales/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
        <!-- jQuery Mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <!-- Alertas -->
        <script src="../js/alert.js"></script>
        <!-- Utilidades -->
        <script src="../js/util.js"></script>
        <!-- JAVASCRIPT DA PAGINA -->
        <script>
            $(document).ready(function () {
                function limparCadastroFrete() {
                    $('#PesEmbFre, #CodEmbFre, #LocalEmbFre, #MunEmbFre, #PesMunFre, #CodMunFre, #MunFre, #UF, #Valor').val('');
                    $('#TabFretesEmb').html('');
                }
                //Transforma o caracter em maiuscula ao digitar
                $('.MAIUSCULA').keyup(function () {
                    $(this).val($(this).val().toUpperCase());
                });
                //MASCARAS
                $('#Valor').mask('990', {reverse: true});
                $('#Saldo').mask('9990', {reverse: true});
                //DATEPICKER DATA DO FRETE                   
                $('#data').datepicker({
                    language: "pt-BR",
                    todayBtn: "linked",
                    endDate: "+10d",
                    maxViewMode: 2,
                    daysOfWeekHighlighted: "0",
                    todayHighlight: true
                }).on('changeDate', function (e) {
                    let dataS = e.date.toLocaleDateString('pt-BR');
                    $('#tabEmbData').hide(500).html('');
                    $.ajax({
                        type: 'POST',
                        url: 'buscaEmbData.php',
                        data: 'data=' + dataS,
                        dataType: "json",
                        success: function (data) {
                            if (data.length > 0) {
                                for (let x in data) {
                                    $('#tabEmbData').append('<tr class="editarEmb"><td class="d-none">' + data[x].codigo + '</td><td>' + data[x].local + '</td></tr>').hide().fadeIn(300);
                                }
                            } else {
                                addAlerta('erro', 'O dia ' + dataS + ' não tem embarques!');
                            }
                        }
                    });
                    limparCadastroFrete();
                });
                setDataHoje('#data');
                //BOTAO EXCLUIR FRETE DA TABELA
                $(document).on('click', '.btnexcluir', function () {
                    $(this).closest('tr').remove();
                    addAlerta('info', 'Frete excluído com sucesso!');
                });
                //SELECIONAR EMBARQUE NA TABELA DO DIA
                $(document).on('click', '.editarEmb', function () {
                    limparCadastroFrete();
                    let cod = $(this).find('td:nth-child(1)').text();
                    let data = conDataUTCparaBR($('#data').datepicker('getDate'));
                    $.ajax({
                        type: 'POST',
                        url: 'buscaFreteData.php',
                        data: 'id=' + cod + '&data=' + data,
                        dataType: "json",
                        success: function (data) {
                            $('#CodEmbFre').val(cod);
                            $('#LocalEmbFre').val(data.local);
                            $('#MunEmbFre').val(data.nomemun);
                            for (let x in data.fretes) {
                                let tr = '<tr>\n\
                                            <td class=\"d-none\">' + data.fretes[x].cod + '</td>\n\
                                            <td>' + data.fretes[x].nome + ' - ' + data.fretes[x].uf + '</td>\n\
                                            <td class=\"text-center\">' + data.fretes[x].valor + '</td>\n\
                                            <td><button type=\"button\" class=\"btn btn-outline-danger btn-sm float-end btnexcluir\"><i class=\"bi-trash-fill\"></i></button></td>\n\
                                          </tr>';
                                $('#TabFretesEmb').append(tr);
                            }

                        }
                    });
                });
                // BOTAO NOVO CADASTRO DE EMBARQUES
                $('#btnNovoFormEmbFre').click(function () {
                    limparCadastroFrete();
                });
                // BOTAO EXCLUIR EMBARQUES DO DIS SELECIONADO
                $('#btnExcEmbDia').click(function () {
                    let data = conDataUTCparaBR($('#data').datepicker('getDate'));
                    $.ajax({
                        type: 'POST',
                        url: 'excluirEmbDia.php',
                        data: 'dia=' + data,
                        success: function (r) {
                            if (r === 'ok') {
                                limparCadastroFrete();
                                addAlerta('ok', 'Todos embarques do dia ' + data + ' foram excluidos!');
                            } else {
                                addAlerta('erro', 'O dia ' + data + ' não tem embarques para excluir!');
                            }
                        }
                    });
                });
                //BOTAO ADICIONAR FRETE A TABELA
                $('#btnAddFrete').click(function () {
                    if (!$('#CodMunFre').val()) {
                        addAlerta('erro', 'Nenhum município selecionado!');
                    } else {
                        let valor = $('#Valor').val();
                        switch (valor) {
                            case 0:
                                addAlerta('erro', 'O valor do frete não pode ser 0!');
                                break;
                            case '':
                                addAlerta('erro', 'Coloque um valor para o frete!');
                                break;
                            default:
                                let cod_fretes = [];
                                $('#TabFretesEmb tr td:nth-child(1)').each(function () {
                                    cod_fretes.push($(this).text());
                                });
                                if (jQuery.inArray($('#CodMunFre').val(), cod_fretes) !== -1) {
                                    addAlerta('erro', 'Município de destino já adicionado!');
                                } else {
                                    let tr = '<tr>\n\
                                                <td class=\"d-none\">' + $('#CodMunFre').val() + '</td>\n\
                                                <td>' + $('#MunFre').val() + ' - ' + $('#UF').val() + '</td>\n\
                                                <td class=\"text-center\">' + valor + '</td>\n\
                                                <td><button type=\"button\" class=\"btn btn-outline-danger btn-sm float-end btnexcluir\"><i class=\"bi-trash-fill\"></i></button></td>\n\
                                              </tr>';
                                    $('#TabFretesEmb').append(tr);
                                    addAlerta('ok', 'Frete adicionado com sucesso!');
                                    $('#CodMunFre, #MunFre, #UF, #Valor').val('');
                                }
                                break;
                        }
                    }
                });
                //BOTAO SALVAR EMBARQUE
                $('#FormEmbFre').submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form

                    let idemb = $('#CodEmbFre').val();
                    let dia = conDataUTCparaBR($('#data').datepicker('getDate'));
                    if (idemb === '') {
                        addAlerta('erro', 'Nenhum embarque selecionado para salvar!');
                    } else if ($('#TabFretesEmb tr').length === 0) {
                        addAlerta('erro', 'Nenhum destino selecionado para salvar!');
                    } else {

                        let dest = [];
                        $('#TabFretesEmb tr').each(function () {
                            dest.push([$(this).find('td').eq(0).text(), $(this).find('td').eq(2).text()]);
                        });
                        const form = {
                            data: dia,
                            idemb: idemb,
                            fretes: dest
                        };
                        $.ajax({
                            type: 'POST',
                            url: 'salvarFretes.php',
                            data: JSON.stringify(form),
                            contentType: 'application/json; charset=UTF-8',
                            success: function () {

                                const d = new Date();
                                let data = ('0' + d.getDate()).slice(-2) + '/' +
                                        ('0' + (d.getMonth() + 1)).slice(-2) + '/' +
                                        d.getFullYear() + ' ' +
                                        d.getHours() + ':' + d.getMinutes();
                                $.ajax({
                                    type: 'POST',
                                    url: 'atualizaJSONData.php',
                                    data: 'data=' + data
                                });

                                limparCadastroFrete();
                                setData('#data', $('#data').datepicker('getDate'));
                                addAlerta('ok', 'Fretes do dia ' + dia + ' atualizados com sucesso!');
                            }
                        });

                    }
                });
                //BOTAO SALVAR EMBARQUE
                $('#FormEmb').submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form

                    var form = $(this);
                    var actionUrl = form.attr('action');
                    $.ajax({
                        type: 'POST',
                        url: actionUrl,
                        data: form.serialize(),
                        success: function (data) {
                            switch (data) {
                                case 'A':
                                    addAlerta('ok', 'Embarque atualizado com sucesso!');
                                    break;
                                case 'I':
                                    addAlerta('ok', 'Embarque adicionado com sucesso!');
                                    break;
                            }
                        }
                    });
                    $('#CodEmb, #Local, #Saldo, #CodMun, #PesMunEmb, #Obs').val('');
                    $('#Produto').val('53218').change();

                });
                //BOTAO EXCLUIR EMBARQUE
                $('#btnExcEmb').click(function () {
                    if (!$('#CodEmb').val()) {
                        addAlerta('erro', 'Nenhum embarque selecionado para excluir!');
                    } else {
                        alert('sim');
                    }
                });

                function BuscaEmbarques(ativo, termo) {
                    $('#tabEmb tr').remove();
                    $.ajax({
                        url: 'buscaEmbarques.php',
                        type: 'POST',
                        data: {
                            ativo: ativo,
                            termo: termo
                        },
                        success: function (data) {
                            $('#tabEmb').append(data);
                        },
                        error: function (error) {
                            console.log("Error:");
                            console.log(error);
                        }
                    });
                }

                function BuscaFrete(id) {

                }

                //                    let cod_fretes = [];
                //                    $('#TabFretesEmb tr td:nth-child(1)').each(function () {
                //                        cod_fretes.push($(this).text());
                //                    });

            });
        </script>
        <!-- CODIGO DO AUTOCOMPLETE -->
        <script type="module">
            import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";

            const EmbFre = {
                onSelectItem: (item) => {
                    $('#PesEmbFre').val('');
                    $('#CodEmbFre').val(item.value);
                    $('#LocalEmbFre').val(item.local);
                    $('#MunEmbFre').val(item.nomemun);
                },
                maximumItems: 7,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum local de embarque Encontrado!',
                liveServer: true,
                fullWidth: true,
                valueField: 'value',
                labelField: 'label',
                server: '../embarque/autocomEmbarque.php',
                serverMethod: 'POST'
            };
            new Autocomplete($('#PesEmbFre')[0], EmbFre);

            const optMunEmb = {
                onSelectItem: (item) => {
                    $('#CodMun').val(item.value);
                },
                maximumItems: 5,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum Município do MS Encontrado!',
                liveServer: true,
                fullWidth: true,
                server: '../municipio/autocomMunicipio.php',
                serverMethod: 'POST',
                serverParams: '{"uf": "MS"}'
            };
            new Autocomplete($('#PesMunEmb')[0], optMunEmb);

            const optFrete = {
                onSelectItem: (item) => {
                    $('#PesMunFre').val('');
                    $('#Valor').focus();
                    $('#CodMunFre').val(item.value);
                    $('#MunFre').val(item.nome);
                    $('#UF').val(item.uf);
                },
                maximumItems: 5,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum Município Encontrado!',
                liveServer: true,
                fullWidth: true,
                valueField: 'value',
                labelField: 'label',
                server: '../municipio/autocomMunicipio.php',
                serverMethod: 'POST'
            };
            new Autocomplete($('#PesMunFre')[0], optFrete);

            const optEmb = {
                onSelectItem: (item) => {
                    $('#PesEmb').val('');
                    $('#CodEmb').val(item.value);
                    $('#Local').val(item.local);
                    $('#Produto').val(item.produto).change();
                    $('#Saldo').val(item.saldo);
                    $('#Obs').val(item.obs);
                    $('#CodMun').val(item.codmun);
                    $('#PesMunEmb').val(item.nomemun);
                },
                maximumItems: 7,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum local de embarque Encontrado!',
                liveServer: true,
                fullWidth: true,
                valueField: 'value',
                labelField: 'label',
                server: '../embarque/autocomEmbarque.php',
                serverMethod: 'POST'
            };
            new Autocomplete($('#PesEmb')[0], optEmb);
        </script>
        <div class="modal fade" id="confirmaExc" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        Tem certeza que deseja excluir?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="btnExcEmbDia">Sim</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end fixed-bottom pe-3">
            <div class="col-3" id="alertas">
            </div>
        </div>
    </body>
</html> 