<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <style>
            @media (min-width: 1200px) {
                .container{
                    /* largura maxima do container */
                    max-width: 840px;
                }
            }
            .card, .list-group-item{
                border-color: black;
            }
        </style>
    </head>
    <body onload="window.print()">
        <?php
        $campos = array();
        foreach (filter_input_array(INPUT_POST) as $k => $v) {
            $campos[$k] = trim($v);
        }

        $em = json_decode(file_get_contents('emissores.json'), true);
        ?>
        <!-- Via Unica -->
        <div class="container mt-4">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-1 text-center">
                            <?php echo $em['emissor'][strtolower($campos['Emissor'])]; ?>
                        </div>
                    </div> 
                </div> 
            </div>

            <div class="row mb-2">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body p-0 text-center">
                            <h1 class="mb-0">ORDEM DE CARREGAMENTO</h1>
                        </div>
                    </div>
                </div>
                <div class="col-4 ps-0">
                    <div class="card">
                        <div class="card-body p-1 text-center">
                            <b><h3 class="mb-0">Nº <?php echo $campos['Numero']; ?></h3></b>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row mb-2">
                <!-- EMBARQUE -->
                <div class="col-7">
                    <div class="card">
                        <div class="card-header text-center py-0">
                            <b>Embarque</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-1">Local: <?php echo $campos['LocalEmb']; ?></li>
                            <li class="list-group-item p-1">Município: <?php echo $campos['MunicipioEmb']; ?>-MS</li>
                        </ul>
                    </div>
                </div> 
                <!-- DATA -->
                <div class="col-5 ps-0">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-1 text-center">Data de emissão: <?php echo $campos['Data']; ?></li>
                            <li class="list-group-item py-1 px-0 text-center">Valido por até um dia após a emissão.</li>
                        </ul>
                    </div>
                </div> 
            </div>

            <div class="row mb-2">
                <!-- DESCARGA -->
                <div class="col-7">
                    <?php
                    if (!empty($campos['LocalDes'] || $campos['MunicipioDes'] || $campos['UFDes'])) {
                        echo '
                    <div class="card">
                        <div class="card-header text-center py-0">
                            <b>Descarga</b>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-1">Local: ' . $campos['LocalDes'] . '</li>
                            <li class="list-group-item p-1">Município: ' . $campos['MunicipioDes'] . '-' . $campos['UFDes'] . '</li>
                        </ul>
                    </div>';
                    }
                    ?>
                </div> 
                <!-- PRODUTO E PESO -->
                <div class="col-5 ps-0">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-1">Produto: <?php echo $campos['Produto']; ?></li>
                            <?php
                            if (!empty($campos['TON'])) {
                                echo '<li class="list-group-item p-1">Peso: ' . $campos['TON'] . ' TON</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div> 
            </div>
            <!-- MOTORISTA -->
            <div class="row mb-2">
                <div class="col-12">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item p-1">Motorista: <?php echo $campos['Motorista']; ?></li>
                        <?php
                        if (!empty($campos['CPF'])) {
                            echo '<li class="list-group-item p-1">CPF: ' . $campos['CPF'] . '</li>';
                        }
                        ?>                       
                    </ul>   
                </div> 
            </div> 

            <div class="row mb-2">
                <div class="col-12">
                    <ul class="list-group list-group-horizontal"> 
                        <li class="list-group-item p-1">Cavalo: <?php echo $campos['Placa']; ?></li>
                        <?php
                        if (!empty($campos['Placa1'])) {
                            echo '<li class="list-group-item p-1">Carreta: ' . $campos['Placa1'] . '</li>';
                        }
                        if (!empty($campos['Placa2'])) {
                            echo '<li class="list-group-item p-1">Carreta: ' . $campos['Placa2'] . '</li>';
                        }
                        if (!empty($campos['Placa3'])) {
                            echo '<li class="list-group-item p-1">Carreta: ' . $campos['Placa3'] . '</li>';
                        }
                        ?>
                    </ul>
                </div> 
            </div> 

            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-1">
                            <?php
                            if ($campos['Emissor'] == 'MABOL') {
                                echo '                            
                                    <div class="row">
                                <div class="col-6 text-center">
                                    <img src="car_mabol.png" height="80">
                                </div>
                            </div>
                            ';
                            } else {
                                echo '<br><br><br>';
                            }
                            ?>     
                            <div class="row">
                                <div class="col-6 text-center">
                                    <small>                                   
                                        ______________________________________________<br>
                                        Assinatura do Expedidor
                                    </small>
                                </div>
                                <div class="col-6 text-center">
                                    <small> 
                                        ______________________________________________<br>
                                        Assinatura do Motorista
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>

        </div>
    </body>
</html>
<?php
$js = json_decode(file_get_contents('numero.json'), true);
if ($js['numero'] == $campos['Numero']) {
    $js['numero']++;
    file_put_contents('numero.json', json_encode($js));
}