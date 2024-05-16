<!doctype html>
<html lang="pt-br">
    <head>
        <title>Caminhão</title>
        <?php include '../head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include '../navbar.php'; ?>  
            <div class="row justify-content-center text-center">
                <h3>Cadastro de Caminhão</h3>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">                        
                        <div class="card-body">

                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-8">
                                    <input class="form-control" type="search" id="buscaCam" placeholder="Pesquisar por placa do cavalo">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col"><hr></div>
                            </div>

                            <form action="salvarCaminhao.php" id="cadCaminhao">

                                <div class="row">
                                    <div class="col-2 pe-0">
                                        <label class="form-label">Placa do Cavalo</label>
                                        <input type="text" class="form-control MAIUSCULA" id="cavalo" name="cavalo" required>
                                    </div>
                                    <div class="col-2 pe-0">
                                        <label class="form-label">Placa do Reboque 1</label>
                                        <input type="text" class="form-control MAIUSCULA" id="reboque1" name="reboque1">
                                    </div>
                                    <div class="col-2 pe-0">
                                        <label class="form-label">Placa do Reboque 2</label>
                                        <input type="text" class="form-control MAIUSCULA" id="reboque2" name="reboque2">
                                    </div>
                                    <div class="col-2 pe-0">
                                        <label class="form-label">Placa do Reboque 3</label>
                                        <input type="text" class="form-control MAIUSCULA" id="reboque3" name="reboque3">
                                    </div>
                                    <div class="col-1 pe-0">
                                        <label class="form-label">Peso</label>
                                        <input type="number" class="form-control" min="1" max="99" id="peso" name="peso" required>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label">Tipo de Caminhão</label>
                                        <select class="form-select" id="tipo" name="tipo"></select>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-sm btn-success" form="cadCaminhao" id="btnSalvar">
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
                //BOTAO LIMPAR
                $('#btnCancelar').click(function () {
                    $('#cavalo, #reboque1, #reboque2, #reboque3').val('');
                    $('#tipo').val('QE').change();
                });
                //MASCARAS
                $('#cavalo, #reboque1, #reboque2, #reboque3').mask('SSS-0A00', {clearIfNotMatch: true});
                //SELECT TIPO DE CAMINHAO DO ARQUIVO tipo_caminhao.json
                $.getJSON('../cfg/tipo_caminhao.json', function (r) {
                    let options;
                    $.each(r, function (i, it) {
                        options += '<option value="' + it.cod + '">' + it.tipo + '</option>';
                    });
                    $('#tipo').append(options);
                    $('#tipo').val('QE').change();
                });
                $('#tipo').change(function () {
                    let sel = this.value;
                    $.getJSON('../cfg/tipo_caminhao.json', function (r) {
                        $('#peso').val(r.find(x => x.cod == sel).ton);
                    });
                });

                //FORMULARIO CAMINHAO
                $('#cadCaminhao').submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(), // serializes the form's elements.
                        success: function (data) {
                            switch (data) {
                                case 'I':
                                    addAlerta('ok', 'Caminhão <strong>cadastrado</strong> com sucesso!');
                                    $('#cavalo, #reboque1, #reboque2, #reboque3').val('');
                                    $('#tipo').val('QE').change();
                                    break;
                                case 'A':
                                    addAlerta('ok', 'Caminhão <strong>alterado</strong> com sucesso!');
                                    $('#cavalo, #reboque1, #reboque2, #reboque3').val('');
                                    $('#tipo').val('QE').change();
                                    break;
                                default:
                                    addAlerta('erro', data);
                                    break;
                            }
                        }
                    });
                });

            });
        </script>        
        <script type="module">
            import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";
            //*********************AUTOCOMPLETE CAMINHAO*********************
            const oc = {
                onSelectItem: (i) => {
                    $('#buscaCam').val('');

                    $('#cavalo').val(i.value).trigger('input');
                    $('#reboque1').val(i.reb1).trigger('input');
                    $('#reboque2').val(i.reb2).trigger('input');
                    $('#reboque3').val(i.reb3).trigger('input');
                    $('#tipo').val(i.tip);
                    $('#peso').val(i.pes);
                },
                maximumItems: 5,
                suggestionsThreshold: 2,
                notFoundMessage: 'Nenhum Contrato Encontrado!',
                fullWidth: true,
                //SERVER
                server: 'acCaminhao.php',
                liveServer: true,
                serverMethod: 'POST',
                showAllSuggestions: true
            };
            new Autocomplete($('#buscaCam')[0], oc);
        </script>
    </body>
</html> 