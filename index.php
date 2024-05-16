<!doctype html>
<html lang="pt-br">
    <head>
        <title>Mabol Cereais - Início</title>

        <?php include 'head.php'; ?>
    </head>
    <body>
        <div class="container">
            <?php include 'navbar.php'; ?>

            <ul class="nav nav-underline" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#carga-tab-pane" type="button" role="tab" aria-selected="true">
                        <i class="bi-calendar3"></i> Agendamento
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ctr-venda-tab" type="button" role="tab" aria-selected="false">
                        <i class="bi-clipboard"></i> Contratos de Venda
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ctr-compra-tab" type="button" role="tab" aria-selected="false">
                        <i class="bi-clipboard"></i> Contratos de Compra
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="carga-tab-pane" role="tabpanel" tabindex="0">

                    <div class="row mt-3">
                        <div class="col">
                            <!-- Botão de Novo Agendamento -->
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalNovoAgendamento">
                                <i class="bi-plus-lg"></i> Novo
                            </button> 
                        </div>                       
                        <div class="col">
                            <button type="button" class="btn btn-outline-primary btn-sm float-end" id="btnAtualizar">
                                <i class="bi-arrow-clockwise"></i>
                            </button> 
                        </div>
                    </div>

                    <div class="row align-items-center mt-2"><div class="col-auto"><strong>01 de Junho</strong></div><div class="col"><hr class="border border-danger border-2 opacity-75"></div></div>

                    <div class="row mt-1">
                        <div class="col"><hr></div>
                        <div class="col-auto">
                            <h5><strong>Chácara São Sebastião <i class="bi-arrow-down-square-fill"></i></strong></h5>
                        </div>
                        <div class="col"><hr></div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-2">

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX<br>XXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body py-1">
                                    HHH-9H99 <br>
                                    VANDERLEIA - 35 TON <br>
                                    Frete R$ 999,00 <br>
                                    <span class="border-start ps-1">KATIUSCIA R$ 99,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 999,00<br></span>
                                    MILHO DEBULHADO
                                </div>
                                <div class="card-footer px-2">
                                    <button class="btn btn-outline-success btn-sm" type="button">
                                        <i class="bi-check-circle-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm float-end" type="button">
                                        <i class="bi-trash-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm float-end me-2" type="button">
                                        <i class="bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HHH-9H99 <br>
                                    VANDERLEIA - 35 TON <br>
                                    Frete R$ 999,00 <br>
                                    <span class="border-start ps-1">KATIUSCIA R$ 99,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 999,00<br></span>
                                    MILHO DEBULHADO
                                </div>
                                <div class="card-footer px-2">
                                    <button class="btn btn-outline-success btn-sm" type="button">
                                        <i class="bi-check-circle-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm float-end" type="button">
                                        <i class="bi-trash-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm float-end me-2" type="button">
                                        <i class="bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00<br></span>
                                    MILHO DEBULHADO
                                </div>
                                <div class="card-footer px-2">
                                    <button class="btn btn-outline-success btn-sm" type="button">
                                        <i class="bi-check-circle-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm float-end" type="button">
                                        <i class="bi-trash-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm float-end me-2" type="button">
                                        <i class="bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00<br></span>
                                    MILHO DEBULHADO
                                </div>
                                <div class="card-footer px-2">
                                    <button class="btn btn-outline-success btn-sm" type="button">
                                        <i class="bi-check-circle-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm float-end" type="button">
                                        <i class="bi-trash-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm float-end me-2" type="button">
                                        <i class="bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00<br></span>
                                    MILHO DEBULHADO
                                </div>
                                <div class="card-footer px-2">
                                    <button class="btn btn-outline-success btn-sm" type="button">
                                        <i class="bi-check-circle-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm float-end" type="button">
                                        <i class="bi-trash-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm float-end me-2" type="button">
                                        <i class="bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00<br></span>
                                    MILHO DEBULHADO
                                </div>
                                <div class="card-footer px-2">
                                    <button class="btn btn-outline-success btn-sm" type="button">
                                        <i class="bi-check-circle-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm float-end" type="button">
                                        <i class="bi-trash-fill"></i>
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm float-end me-2" type="button">
                                        <i class="bi-pencil-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-1">
                        <div class="col"><hr></div>
                        <div class="col-auto">
                            <h5><strong>Armazém Basalto <i class="bi-arrow-right-square-fill"></i></strong></h5>
                        </div>
                        <div class="col"><hr></div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-2">

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00</span>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3645 <br>
                                    VANDERLEIA - 35 TON <br>
                                    Frete R$ 200,00 <br>
                                    <span class="border-start ps-1">KATIUSCIA R$ 10,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 100,00</span>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 0,00/TON <br>
                                    Comisssão R$ 50,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row align-items-center mt-2"><div class="col-auto"><strong>02 de Junho</strong></div><div class="col"><hr class="border border-danger border-2 opacity-75"></div></div>

                    <div class="row mt-1">
                        <div class="col"><hr></div>
                        <div class="col-auto">
                            <h5><strong>Chácara São Sebastião <i class="bi-arrow-right-square-fill"></i></strong></h5>
                        </div>
                        <div class="col"><hr></div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-2">

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00</span>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3645 <br>
                                    VANDERLEIA - 35 TON <br>
                                    Frete R$ 200,00 <br>
                                    <span class="border-start ps-1">KATIUSCIA R$ 10,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 100,00</span>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 0,00/TON <br>
                                    Comisssão R$ 50,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-1">
                        <div class="col"><hr></div>
                        <div class="col-auto">
                            <h5><strong>Armazém Basalto <i class="bi-arrow-right-square-fill"></i></strong></h5>
                        </div>
                        <div class="col"><hr></div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 g-2">

                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    <span class="border-start ps-1">GILO R$ 5,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 70,00</span>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3645 <br>
                                    VANDERLEIA - 35 TON <br>
                                    Frete R$ 200,00 <br>
                                    <span class="border-start ps-1">KATIUSCIA R$ 10,00/TON<br></span>
                                    <span class="border-start ps-1">Comisssão R$ 100,00</span>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 0,00/TON <br>
                                    Comisssão R$ 50,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center px-1">
                                    <strong><i class="bi-geo-alt-fill"></i> XXXXXXXXXXXXXXXXXXXXXXXXX</strong>                           
                                </div>
                                <div class="card-body">
                                    HRO-3644 <br>
                                    BITREM - 38 TON <br>
                                    Frete R$ 180,00 <br>
                                    GILO R$ 5,00/TON <br>
                                    Comisssão R$ 70,00
                                </div>
                                <div class="card-footer text-body-secondary">
                                    BOTOES
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="tab-pane fade" id="ctr-venda-tab" role="tabpanel" tabindex="0">

<!--<img src="img/loading.gif">-->
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#prev-venda-tab" type="button" role="tab" aria-controls="carga-tab-pane" aria-selected="true">
                                <i class="bi-clock"></i> Previsto
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#atual-venda-tab" type="button" role="tab" aria-controls="contrato-tab-pane" aria-selected="false">
                                <i class="bi-clipboard-check"></i> Atual
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="prev-venda-tab" role="tabpanel" tabindex="0">
                            kkk
                        </div>
                        <div class="tab-pane fade" id="atual-venda-tab" role="tabpanel" tabindex="0">
                            kkkkkgggg
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="ctr-compra-tab" role="tabpanel" tabindex="0">
                    
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active " data-bs-toggle="tab" data-bs-target="#prev-compra-tab" type="button" role="tab" aria-controls="carga-tab-pane" aria-selected="true">
                                <i class="bi-clock"></i> Previsto
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#atual-compra-tab" type="button" role="tab" aria-controls="contrato-tab-pane" aria-selected="false">
                                <i class="bi-clipboard-check"></i> Atual
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="prev-compra-tab" role="tabpanel" tabindex="0">
                            llll
                        </div>
                        <div class="tab-pane fade" id="atual-compra-tab" role="tabpanel" tabindex="0">
                            pppp
                        </div>
                    </div>

                </div>
            </div>

            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////// MODAL NOVO AGENDAMENTO //////////////////////////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="modal fade" id="modalNovoAgendamento" data-bs-backdrop="static" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tituloModal">Novo Agendamento de Carga</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="carga/salvarCarga.php" id="novoAgend">

                                <div class="mb-2">                                           
                                    <input type="text" 
                                           class="form-control rounded" 
                                           id="pesCtr" 
                                           placeholder="Pesquisar Contrato por Local ou Município" 
                                           autocomplete="off" 
                                           data-server-params='{"related":"produto"}'>                                          
                                </div>

                                <!-- Produto -->

                                <div class="row">
                                    <div class="col-auto text-muted">
                                        Produto*
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="mb-2 col-5">
                                    <select class="form-select form-select-sm" id="produto">
                                        <option value="53218">MILHO DEBULHADO</option>
                                        <option value="17625">SOJA EM GRAO</option>
                                    </select>
                                </div>

                                <!-- Embarque -->
                                <div class="row">
                                    <div class="col-auto text-muted">
                                        Embarque*
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-sm align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Contrato</th>
                                                <th scope="col">Local</th>
                                                <th scope="col">Município</th>
                                                <th scope="col">UF</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider" id="tabEmb">
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Descarga -->
                                <div class="row">
                                    <div class="col-auto text-muted">
                                        Descarga*
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-sm align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Contrato</th>
                                                <th scope="col">Local</th>
                                                <th scope="col">Município</th>
                                                <th scope="col">UF</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider" id="tabDes">
                                        </tbody>
                                    </table>
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
                                        <label for="placa" class="form-label">Placa do Cavalo*</label>
                                        <input type="text" class="form-control MAIUSCULA px-2" id="placa" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="tipoCam" class="form-label">Tipo de Caminhão*</label>
                                        <select class="form-select" id="tipoCam"></select>
                                    </div>
                                    <div class="col-2">
                                        <label for="Peso" class="form-label">Peso*</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control px-2 naozero" id="Peso" maxlength="2" required>
                                            <span class="input-group-text">TON</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="valFrete" class="form-label">Frete*</label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="text" class="form-control naozero" id="valFrete" maxlength="3" required>
                                            <span class="input-group-text">,00/TON</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label for="data" class="form-label">Data*</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" class="form-control" id="data" readonly>
                                            <button class="btn btn-outline-dark" type="button">
                                                <i class="bi-calendar3"></i>
                                            </button>                                    
                                        </div>
                                    </div>
                                </div>

                                <!-- Agenciador -->
                                <div class="row">
                                    <div class="col-auto text-muted">
                                        Agenciador
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label for="nAgen" class="form-label">Nome*</label>
                                        <select class="form-select" id="nAgen"></select>
                                    </div>
                                    <div class="col-3">
                                        <label for="Comi" class="form-label">Comissão</label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="text" class="form-control naozero px-2" id="Comi" maxlength="3">
                                            <span class="input-group-text">,00</span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="ComiT" class="form-label">Comissão por TON</label>
                                        <div class="input-group">
                                            <span class="input-group-text">R$</span>
                                            <input type="text" class="form-control naozero" id="ComiT" maxlength="2">
                                            <span class="input-group-text">,00/TON</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Observação -->
                                <div class="row">
                                    <div class="col-auto text-muted">
                                        Observação
                                    </div>
                                    <div class="col"><hr></div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <textarea class="form-control naoespenter" id="observacao" rows="3" maxlength="255"></textarea>
                                    </div>
                                    <p class="text-muted">* - Campos Obrigatórios.</p>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-danger justify-content-start" data-bs-dismiss="modal" id="btnCancelar">
                                <i class="bi-x-circle"></i>
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-sm btn-success" form="novoAgend" id="btnSalvar">
                                <i class="bi-check2-circle"></i>
                                Salvar
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end fixed-bottom pe-3">
                    <div class="col-3" id="alertas">
                    </div>
                </div>
            </div>

            <p class="text-muted mt-2">© 2023 - Paulo Henrique</p>
        </div>

        <?php include 'js.php'; ?>
        <!-- AutoComplete Busca Contrato -->
        <script>
            $(document).ready(function () {
                //Transforma o caracter em maiuscula
                $('.MAIUSCULA').keyup(function () {
                    $(this).val($(this).val().toUpperCase());
                });

//                $.getJSON('config.json', function (r) {
//                    alert(r.cert_dig_nfe.arquivo);
//                });

                function limpaFormAgend() {
                    $('#produto').removeAttr('disabled').val('53218').change();
                    $('#tabEmb tr').remove();
                    $('#tabDes tr').remove();
                    $('#placa, #valFrete, #Comi, #ComiT, #observacao').val('');
                    $('#tipoCam option:contains(4-EIXO)').prop('selected', true).change();
                    $('#nAgen option:contains(LAIRA)').prop('selected', true).change();
                    //$('#nAgen').val('70').change();
                    setDataHoje('#datepicker');
                }

                $('#btnAtualizar').click(function () {

                });

                $('#btnCancelar').click(function () {
                    alert();
                    limpaFormAgend();
                });

                $('#novoAgend').submit(function (e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form
                    switch (0) {
                        case $('#tabEmb').find('tr').length:
                            addAlerta('erro', 'Adicione pelo menos um contrato de <strong>compra</strong>!');
                            break;

                        case $('#tabDes').find('tr').length:
                            addAlerta('erro', 'Adicione pelo menos um contrato de <strong>venda</strong>!');
                            break;

                        default:
                            $.ajax({
                                type: 'POST',
                                url: 'carga/salvarCarga.php',
                                data: {
                                    ctrcompra: $('#tabEmb tr:nth-child(1) td').eq(0).text(),
                                    ctrcompra2: $('#tabEmb tr:nth-child(2) td').eq(0).text(),
                                    ctrvenda: $('#tabDes tr:nth-child(1) td').eq(0).text(),
                                    ctrvenda2: $('#tabDes tr:nth-child(2) td').eq(0).text(),
                                    placa: $('#placa').val().replace('-', ''),
                                    tipo: $('#tipoCam option:selected').text(),
                                    peso: $('#Peso').val(),
                                    data: $('#data').val(),
                                    frete: $('#valFrete').val(),
                                    agenc: $('#nAgen option:selected').text(),
                                    com: $('#Comi').val(),
                                    comt: $('#ComiT').val(),
                                    obs: $('#observacao').val()
                                },
                                success: function (data) {
                                    if (data == 'I') {
                                        addAlerta('info', 'Carga <strong>agendada</strong> com sucesso!');
                                    }
                                }
                            });
                            limpaFormAgend();
                            break;
                    }
                });
                //Mascaras
                $('#placa').mask('SSS-0A00');
                $('#Peso, #ComiT').mask('90', {reverse: true});
                $('#valFrete, #Comi').mask('990', {reverse: true});
                //Botao para excluir contrato de compra ou venda da tabela
                $(document).on('click', '.btnexcluir', function () {
                    $(this).closest('tr').remove();
                    addAlerta('info', 'Contrato excluído com sucesso!');

                    if ($('#tabEmb').find('tr').length === 0 && $('#tabDes').find('tr').length === 0) {
                        $('#produto').removeAttr('disabled');
                    }
                });

                //Não permite valor 0 ao sair do campo
                $('.naozero').blur(function () {
                    if ($(this).val() == 0) {
                        $(this).val('');
                    }
                });
                //Não permite quebra de linha ou espacos no começo e fim ao sair do campo
                $('.naoespenter').blur(function () {
                    let campo = $(this).val();
                    campo = campo.replace(/(\r\n|\n|\r)/gm, '');
                    campo = campo.trim();
                    $(this).val(campo);
                });
                //Campo readonly que permite somente tab
                $('.readonly').on('keydown paste focus mousedown', function (e) {
                    if (e.keyCode != 9) { //permitir tecla TAB (9)
                        e.preventDefault();
                    }
                });
                //Datepicker da data de Agendamento                           
                $('#datepicker').datepicker({
                    startDate: "0d",
                    endDate: "+7d",
                    maxViewMode: 2,
                    language: "pt-BR",
                    daysOfWeekHighlighted: "0",
                    autoclose: true,
                    container: '#datepicker',
                    orientation: 'top',
                    todayHighlight: true
                });
                setDataHoje('#datepicker');
                //Select Produtos da tabela PRODUTOS  do banco de dados
//                $.getJSON('produto/listarProduto.php', function (r) {
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
                //Select Tipo de Caminhão do arquivo tipo_caminhao.json
                $.getJSON('tipo_caminhao.json', function (r) {
                    let options;
                    $.each(r, function (i, item) {
                        let valor = item.ton;
                        let texto = item.tipo;
                        if (i === 4) {
                            options += '<option value="' + valor + '" selected>' + texto + '</option>';
                            $('#Peso').val(valor);
                        } else {
                            options += '<option value="' + valor + '">' + texto + '</option>';
                        }
                    });
                    $('#tipoCam').append(options);
                });
                $('#tipoCam').change(function () {
                    $('#Peso').val(this.value);
                });
                //Select Agenciador do arquivo agenciador.json
                $.getJSON('agenciador.json', function (r) {
                    let options;
                    $.each(r, function (i, item) {
                        let valor = item.comissao;
                        let texto = item.nome;
                        if (i === 0) {
                            options += '<option value="' + valor + '" selected>' + texto + '</option>';
//                            $('#Comi').val(valor);
                        } else {
                            options += '<option value="' + valor + '">' + texto + '</option>';
                        }
                    });
                    $('#nAgen').append(options);
                });
                $('#nAgen').change(function () {
                    let v;
                    if (this.value == 0) {
                        v = '';
                    } else {
                        v = this.value;
                    }
                    $('#Comi').val(v);
                });
            });
        </script>
        <script type="module">
            function buscaCtr(idctr) {
                $('#pesCtr').val('');

                if (!$('#produto').prop('disabled')) {
                    $('#produto').attr('disabled', 'disabled');
                }

                let lEmb = $('#tabEmb').find('tr').length;
                let lDes = $('#tabDes').find('tr').length;

                if (lEmb === 2 && lDes === 2) {
                    addAlerta('erro', 'Você não pode adicionar mais contratos!');
                } else {
                    switch (idctr) {
                        case $('#tabEmb tr td').eq(0).text():
                            addAlerta('erro', 'Você já adicionou este contrato de <strong>compra</strong>!');
                            break;

                        case $('#tabDes tr td').eq(0).text():
                            addAlerta('erro', 'Você já adicionou este contrato de <strong>venda</strong>!');
                            break;

                        default:
                            $.ajax({
                                type: 'POST',
                                url: 'contrato/buscaContrato.php',
                                data: {
                                    idContrato: idctr,
                                    idemb: $('#tabEmb tr td').eq(1).text(),
                                    iddes: $('#tabDes tr td').eq(1).text()
                                },
                                dataType: 'json',
                                success: function (data) {
                                    let tr = '<tr>\n\
                                <td class=\"d-none\">' + data.id + '</td>\n\
                                <td class=\"d-none\">' + data.idloc + '</td>\n\
                                <td>' + data.ctr + '</td>\n\
                                <td>' + data.local + '</td>\n\
                                <td>' + data.municipio + '</td>\n\
                                <td>' + data.uf + '</td>\n\
                                <td><button type=\"button\" class=\"btn btn-outline-danger btn-sm btnexcluir float-end\"><i class=\"bi-trash-fill\"></i></button></td>\n\
                            </tr>';
                                    switch (data.tipo) {
                                        case 'C':
                                            if (lEmb === 2) {
                                                addAlerta('erro', 'Já existem 2 contratos de <strong>compra</strong> no Embarque!');
                                            } else {
                                                $('#tabEmb').append(tr);
                                                addAlerta('info', 'Contrato de <strong>compra</strong> adicionado com sucesso!');
                                            }
                                            break;
                                        case 'V':
                                            if (lDes === 2) {
                                                addAlerta('erro', 'Já existem 2 contratos de <strong>venda</strong> na Descarga!');
                                            } else {
                                                $('#tabDes').append(tr);
                                                addAlerta('info', 'Contrato de <strong>venda</strong> adicionado com sucesso!');
                                            }
                                            break;
                                    }
                                },
                                error: function (xhr) {
//                                        alert(xhr.status);
//                                        alert(xhr.responseText);
                                    addAlerta('erro', xhr.responseText);
                                }
                            });
                            break;
                    }
                }
//                    alert(item.label + '///' + item.value);
            }

            import Autocomplete from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-autocomplete@master/autocomplete.js";
            const opts = {
                onSelectItem: (item) => {
                    buscaCtr(item.value);
                },
                updateOnSelect: false,
                maximumItems: 5,
                suggestionsThreshold: 3,
                notFoundMessage: 'Nenhum Contrato Encontrado!',
                liveServer: true,
                fullWidth: true,
                server: 'contrato/autocompleteContrato.php',
                valueField: 'value',
                labelField: 'label',
                serverMethod: 'POST'
            };
            new Autocomplete($('#pesCtr')[0], opts);
        </script>
    </body>
</html> 