<!doctype html>
<html lang="pt-br">
    <head>
        <title>MC - Município</title>
        <?php include '../head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include '../navbar.php'; ?>

            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <h3>Cadastro de Município</h3>
                    <div class="card">
                        <div class="card-body">
                            <input class="form-control form-control-lg" type="text" id="buscaMun" placeholder="Pesquisar por nome do município">
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

            });
        </script>
        <script type="module">
            function buscaCtr(item) {
                $.ajax({
                    type: 'POST',
                    url: 'salvarMunicipio.php',
                    data: {
                        codigo: item.value,
                        nome: item.nome,
                        uf: item.uf
                    },
                    success: function (data) {
                        if (data === 'I') {
                            addAlerta('ok', 'Município <strong>cadastrado</strong> com sucesso!');
                        } else {
                            addAlerta('erro', 'Município já cadastrado!');
                        }
                    }
                });
            }

            import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";
            const opts = {
                onSelectItem: (item) => {
                    $('#buscaMun').val('');
                    buscaCtr(item);
                },
                updateOnSelect: false,
                maximumItems: 8,
                suggestionsThreshold: 2,
                notFoundMessage: 'Nenhum Município Encontrado!',
                fullWidth: true,
                server: 'MunIBGE.php',
                valueField: 'value',
                labelField: 'label',
                serverMethod: 'POST'
            };
            new Autocomplete($('#buscaMun')[0], opts);
        </script>
    </body>
</html> 