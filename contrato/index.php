<!doctype html>
<html lang="pt-br">
    <head>
        <title>MC - Contrato</title>
        <?php include '../head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include '../navbar.php'; ?>  
            <div class="row justify-content-center text-center">
                <h3>Cadastro de Contrato</h3>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">                        
                        <div class="card-body">
                            <form action="salvarContrato.php" id="cadContrato">

                                <div class="row mb-3">
                                    <div class="col-8">
                                        <input class="form-control" type="search" id="buscaCtr" placeholder="Pesquisar por numero, documento, nome, local ou município">
                                    </div>

                                    <div class="col-4 d-flex justify-content-center align-items-center visually-hidden" id="col-status">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r-status" id="r-ati" value="A" checked>
                                            <label class="form-check-label" for="r-ati">Ativo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r-status" id="r-can" value="C">
                                            <label class="form-check-label" for="r-can">Cancelado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="r-status" id="r-fin" value="F">
                                            <label class="form-check-label" for="r-fin">Finalizado</label>
                                        </div>
                                    </div>
                                </div>

                                <!--********** INFORMAÇÕES BÁSICAS **********-->

                                <div class="row mb-2">
                                    <input type="hidden" id="ID" name="ID">  

                                    <div class="col-3 pe-0">
                                        <label class="form-label">Número</label>
                                        <input type="text" class="form-control" id="numero" name="numero" maxlength="15" required>
                                    </div>

                                    <div class="col-3 d-flex justify-content-center align-items-end">                                       
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-compra-venda" id="r-compra" value="C" checked>
                                            <label class="form-check-label" for="r-compra">Compra</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-compra-venda" id="r-venda" value="V">
                                            <label class="form-check-label" for="r-venda">Venda</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <label class="form-label">Embarque a partir</label>
                                        <div class="input-group date" id="dp-emb">
                                            <input type="text" class="form-control" name="emb-data" id="emb-data" readonly>
                                            <button class="btn btn-outline-dark" type="button">
                                                <i class="bi-calendar3"></i>
                                            </button>                                    
                                        </div>
                                    </div>

                                    <div class="col-2 d-flex justify-content-center align-items-end">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-fob-cif" id="r-fob" value="F" checked>
                                            <label class="form-check-label" for="r-fob">FOB</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radio-fob-cif" id="r-cif" value="C">
                                            <label class="form-check-label" for="r-cif">CIF</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <label class="form-label">Data</label>
                                        <div class="input-group date" id="dp-data">
                                            <input type="text" class="form-control" name="data" id="data" readonly>
                                            <button class="btn btn-outline-dark" type="button">
                                                <i class="bi-calendar3"></i>
                                            </button>                                    
                                        </div>
                                    </div>
                                </div>

                                <!--********** FORNECEDOR OU CLIENTE **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted" id="dv-for-cli">
                                        Fornecedor
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row d-flex justify-content-center mb-3">
                                    <div class="col-6">
                                        <input class="form-control" type="text" id="busca-for-cli" placeholder="Pesquisar por documento, nome, local ou município">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <input type="hidden" id="cod-for-cli" name="cod-for-cli">

                                    <div class="col-2 pe-0">
                                        <input type="text" class="form-control px-1" id="doc-for-cli" readonly>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control readonly" id="nome-for-cli" required>
                                    </div>
                                    <div class="col-5 ps-0">
                                        <input type="text" class="form-control" id="local-for-cli" readonly>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mb-2">
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="mun-for-cli" readonly>
                                    </div>
                                    <div class="col-1">
                                        <input type="text" class="form-control" id="uf-for-cli" readonly>
                                    </div>
                                </div>

                                <!--********** RETIRADA OU ENTREGA **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted" id="dv-ent-ret">
                                        Retirada
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row d-flex justify-content-center mb-3">
                                    <div class="col-6">
                                        <input class="form-control" type="text" id="busca-ent-ret" placeholder="Pesquisar por documento, nome, local ou município">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <input type="hidden" id="cod-ent-ret" name="cod-ent-ret">

                                    <div class="col-2 pe-0">
                                        <input type="text" class="form-control px-1" id="doc-ent-ret" readonly>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control readonly" id="nome-ent-ret">
                                    </div>
                                    <div class="col-5 ps-0">
                                        <input type="text" class="form-control" id="local-ent-ret" readonly>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center mb-2">
                                    <div class="col-4">
                                        <input type="text" class="form-control" id="mun-ent-ret" readonly>
                                    </div>
                                    <div class="col-1">
                                        <input type="text" class="form-control" id="uf-ent-ret" readonly>
                                    </div>
                                </div>

                                <!--********** PRODUTO **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted">
                                        Produto
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2 d-flex justify-content-center">
                                    <div class="col-3 d-flex align-items-end">
                                        <select class="form-select" id="produto" name="produto">
                                            <option value="53218">MILHO DEBULHADO</option>
                                            <option value="17625">SOJA EM GRAO</option>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label class="form-label">Quantidade</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control naozero" id="quantidade" name="quantidade" required>
                                            <span class="input-group-text">KG</span>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <label class="form-label">Preço</label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="text" class="form-control naozero dinheiro" id="preco" name="preco" required>
                                            <span class="input-group-text">SACA 60KG</span>
                                        </div>
                                    </div>
                                </div>

                                <!--********** CLASSIFICAÇÃO **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted">
                                        Classificação
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2 d-flex justify-content-center">
                                    <div class="col-2">
                                        <label class="form-label">Umidade</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control naozero" value="14" id="umi" name="umi" required>
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <label class="form-label">Impureza</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control naozero" value="1" id="imp" name="imp" required>
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <label class="form-label">Ardidos/Avariados</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control naozero" value="6" id="ard" name="ard" required>
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label class="form-label">Observação de Classificação</label>
                                        <textarea class="form-control" rows="2" maxlength="255" id="obs-clas" name="obs-clas">ISENTO DE SEMENTES DE FEDEGOSO, MAMONA, VASSOURINHA, CORDA DE VIOLA, SEMENTES TRATADAS E INSETOS VIVOS OU MORTOS.</textarea>
                                    </div>
                                </div>

                                <!--********** PAGAMENTO **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted">
                                        Pagamento
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label class="form-label">Forma de Pagamento</label>
                                        <textarea class="form-control" rows="1" maxlength="255" id="forma-pag" name="forma-pag" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <label class="form-label">Dados Bancários</label>
                                        <textarea class="form-control" rows="3" maxlength="255" id="dados-ban" name="dados-ban" required></textarea>
                                    </div>
                                </div>

                                <!--********** OBSERVAÇÃO **********-->

                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted">
                                        Observação
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-12">
                                        <textarea class="form-control" rows="2" maxlength="255" id="obs" name="obs">MULTA DE 20% SOBRE O VALOR TOTAL DO CONTRATO PARA O VENDEDOR CASO O MESMO NÃO CUMPRA COM O CONTRATO OU NÃO TENHA PRODUTO NO PADRÃO ESPECIFICADO.</textarea>
                                    </div>
                                </div>

                                <!--********** ARQUIVO ANEXOS **********-->

                                <div class="row" hidden>
                                    <div class="col"><hr></div>
                                    <div class="col-auto text-muted">
                                        Arquivo Anexos
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2" hidden>
                                    <div class="col-5">
                                        <label for="arquivo" class="form-label">Enviar contrato (.pdf .jpg .jpeg .png .gif)</label>
                                        <input class="form-control" type="file" accept=".pdf,.jpg,.jpeg,.png,.gif" name="arquivo" id="arquivo">
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" class="btn btn-sm btn-success" form="cadContrato" id="btnSalvar">
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
                //GERA NUMERO DO CONTRATO AUTOMATICO
                function gerarNum() {
                    $.getJSON('numero.json', function (r) {
                        const d = new Date();
                        $('#numero').val(r.numero + '-' + d.getFullYear());
                    });
                }
                gerarNum();
                //LIMPAR
                function limparForm() {
                    $('#col-status').addClass('visually-hidden');
                    $('#buscaCtr, #ID, ' +
                            '#busca-for-cli, #cod-for-cli, #doc-for-cli, #nome-for-cli, #local-for-cli, #mun-for-cli, #uf-for-cli, ' +
                            '#busca-ent-ret, #cod-ent-ret, #doc-ent-ret, #nome-ent-ret, #local-ent-ret, #mun-ent-ret, #uf-ent-ret, ' +
                            '#quantidade, #preco, #forma-pag').val('');
                    $('#umi').val('14');
                    $('#imp').val('1');
                    $('#r-compra, #r-fob').click().change();
                    setDataHoje('#dp-data, #dp-emb');
                    $('#produto').val('53218').change();
                    setTimeout(function () {
                        gerarNum();
                    }, 500);
                }
                //BOTAO CANCELAR
                $('#btnCancelar').click(function () {
                    limparForm();
                });
                //MASCARAS
                $('#quantidade').mask('9.999.990', {reverse: true});
                $('#preco').mask('990,00', {reverse: true});
                $('#umi, #imp, #ard').mask('90', {reverse: true});
                //MUDAR ARDIDO/AVARIADO CONFORME PRODUTO
                $('#produto').change(function () {
                    switch (this.value) {
                        case '53218':
                            //MILHO
                            $('#ard').val('6');
                            break;
                        case '17625':
                            //SOJA
                            $('#ard').val('8');
                            break;
                    }
                });
                //MUDAR TITULOS E OBSERVACOES COMPRA E VENDA
                $('input[name="radio-compra-venda"]').change(function () {
                    if ($(this).val() == 'C') {
                        $('#dv-for-cli').text('Fornecedor');
                        $('#dados-ban').val('');
                        $('#obs-clas').val('ISENTO DE SEMENTES DE FEDEGOSO, MAMONA, VASSOURINHA, CORDA DE VIOLA, SEMENTES TRATADAS E INSETOS VIVOS OU MORTOS.');
                        $('#obs').val('MULTA DE 20% SOBRE O VALOR TOTAL DO CONTRATO PARA O VENDEDOR CASO O MESMO NÃO CUMPRA COM O CONTRATO OU NÃO TENHA PRODUTO NO PADRÃO ESPECIFICADO.');
                    } else {
                        $('#dv-for-cli').text('Cliente');
                        $('#obs-clas, #obs').val('');
                        $('#dados-ban').val('PIX CNPJ\n70.390.869/0001-75\nMABOL COMERCIO DE CEREAIS LTDA');
                    }
                });
                //MUDAR TITULOS FOB E CIF
                $('input[name="radio-fob-cif"]').change(function () {
                    if ($(this).val() == 'F') {
                        $('#dv-ent-ret').text('Retirada');
                    } else {
                        $('#dv-ent-ret').text('Entrega');
                    }
                });
                //DATEPICKER DO CAMPO DATA
                $('#dp-data').datepicker({
                    maxViewMode: 2,
                    language: "pt-BR",
                    daysOfWeekHighlighted: "0",
                    autoclose: true,
                    container: '#dp-data',
                    orientation: 'bottom',
                    todayHighlight: true
                });
                //DATEPICKER DO CAMPO EMBARQUE
                $('#dp-emb').datepicker({
                    maxViewMode: 2,
                    language: "pt-BR",
                    daysOfWeekHighlighted: "0",
                    autoclose: true,
                    container: '#dp-emb',
                    orientation: 'bottom',
                    todayHighlight: true
                });
                //SETAR DATA DE HOJE NOS 2 DATEPICKER
                setDataHoje('#dp-data, #dp-emb');

                //SELECT Produtos da tabela PRODUTOS do banco de dados
//                $.getJSON('../produto/listarProduto.php', function (r) {
//                    let options;
//                    $.each(r, function (i, item) {
//                        let valor = item.codigo;
//                        let texto = item.descricao;
//                        if (i === 2) {
//                            options += '<option value="' + valor + '" selected>' + texto + '</option>';
//                        } else {
//                            options += '<option value="' + valor + '">' + texto + '</option>';
//                        }
//                    });
//                    $('#produto').append(options);
//                });
                //CONFERIR TIPO DE ARQUIVO ENVIADO
//                $('#arquivo').change(function () {
//                    var ext = this.value.split('.').pop().toLowerCase();
//                    if ($.inArray(ext, ['pdf', 'gif', 'png', 'jpg', 'jpeg']) == -1) {
//                        addAlerta('erro', 'Arquivo Inválido!');
//                        this.value = '';
//                    }
//                });

                //FORMULARIO CONTRATO
                $('#cadContrato').submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(), // serializes the form's elements.
                        success: function (data) {                            
                            switch (data) {
                                case 'I':
                                    addAlerta('ok', 'Contrato <strong>cadastrado</strong> com sucesso!');
                                    limparForm();
                                    break;
                                case 'EI':
                                    addAlerta('erro', 'Contrato já cadastrado!');
                                    break;
                                case 'A':
                                    addAlerta('ok', 'Contrato <strong>alterado</strong> com sucesso!');
                                    limparForm();
                                    break;
                                case 'EA':
                                    addAlerta('erro', 'Contrato !');
                                    break;
                            }
                        }
                    });
                });

            });
        </script>        
        <script type="module">
            function prePessoa(p) {
                $('#doc' + p.pes).unmask();
                $('#cod' + p.pes).val(p.value);
                //MASCARA PARA DOCUMENTO
                p.cpfcnpj.length < 14 ? $('#doc' + p.pes).val(p.cpfcnpj).mask('000.000.000-00') : $('#doc' + p.pes).val(p.cpfcnpj).mask('00.000.000/0000-00');
                $('#nome' + p.pes).val(p.razao);
                $('#local' + p.pes).val(p.fant);
                $('#mun' + p.pes).val(p.nome);
                $('#uf' + p.pes).val(p.uf);
                if (p.pes == '-for-cli' && p.dban != null) {
                    $('#dados-ban').val(p.dban);
                }
            }

            import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";
            //*********************AUTOCOMPLETE CONTRATO*********************
            const oc = {
                onSelectItem: (i) => {
                    $('#buscaCtr').val('');
                    switch (i.sta) {
                        case 'A':
                            $('#r-ati').click().change();
                            break;
                        case 'C':
                            $('#r-can').click().change();
                            break;
                        case 'F':
                            $('#r-fin').click().change();
                            break;
                    }
                    $('#col-status').removeClass('visually-hidden');
                    $('#ID').val(i.value);
                    $('#numero').val(i.num);
                    i.tip == 'C' ? $('#r-compra').click() : $('#r-venda').click();
                    i.mod == 'F' ? $('#r-fob').click() : $('#r-cif').click();
                    $('#data').val(i.dat);
                    $('#emb-data').val(i.date);

                    let p1 = {
                        pes: '-for-cli',
                        value: i.id1,
                        cpfcnpj: i.doc1,
                        razao: i.raz1,
                        fant: i.loc1,
                        nome: i.nom1,
                        uf: i.uf1
                    };
                    prePessoa(p1);

                    if (i.id2 != null) {
                        let p2 = {
                            pes: '-ent-ret',
                            value: i.id2,
                            cpfcnpj: i.doc2,
                            razao: i.raz2,
                            fant: i.loc2,
                            nome: i.nom2,
                            uf: i.uf2
                        };
                        prePessoa(p2);
                    } else {
                        $('#busca-ent-ret, #cod-ent-ret, #doc-ent-ret, #nome-ent-ret, #local-ent-ret, #mun-ent-ret, #uf-ent-ret').val('');
                    }
                    
                    $('#produto').val(i.pro);
                    $('#quantidade').val(i.qua);
                    $('#preco').val(i.pre);
                    $('#umi').val(i.umi);
                    $('#imp').val(i.imp);
                    $('#ard').val(i.ard);
                    $('#obs-clas').val(i.ocla);
                    $('#forma-pag').val(i.pag);
                    $('#dados-ban').val(i.ban);
                    $('#obs').val(i.obs);
                    
                },
                maximumItems: 5,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum Contrato Encontrado!',
                fullWidth: true,
                //SERVER
                server: 'acContrato.php',
                liveServer: true,
                serverMethod: 'POST',
                showAllSuggestions: true
            };
            new Autocomplete($('#buscaCtr')[0], oc);
            //*********************AUTOCOMPLETE FORNECEDOR/CLIENTE*********************
            const ofc = {
                onSelectItem: (i) => {
                    $('#busca-for-cli').val('');
                    i.pes = '-for-cli';
                    prePessoa(i);
                },
                maximumItems: 10,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhuma Pessoa Encontrada!',
                fullWidth: true,
                //SERVER
                server: '../pessoa/acPessoa.php',
                liveServer: true,
                serverMethod: 'POST',
                showAllSuggestions: true
            };
            new Autocomplete($('#busca-for-cli')[0], ofc);
            //*********************AUTOCOMPLETE RETIRADA/ENTREGA*********************
            const oer = {
                onSelectItem: (i) => {
                    $('#busca-ent-ret').val('');
                    switch ($('#cod-for-cli').val()) {
                        case '':
                            addAlerta('erro', 'Adicione um Fornecedor ou Cliente Primeiro!');
                            break;
                        case i.value:
                            addAlerta('erro', 'Pessoa ja adicionada como fornecedor ou Cliente!');
                            break;
                        default:
                            i.pes = '-ent-ret';
                            prePessoa(i);
                            break;
                    }
                },
                maximumItems: 10,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhuma Pessoa Encontrada!',
                fullWidth: true,
                //SERVER
                server: '../pessoa/acPessoa.php',
                liveServer: true,
                serverMethod: 'POST',
                showAllSuggestions: true
            };
            new Autocomplete($('#busca-ent-ret')[0], oer);
        </script>
    </body>
</html> 