<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mabol Cereais - Fretes</title>
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <!-- Bootstrap Icons CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <!-- Bootstrap DatePicker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css">
        <style>
            .centro {
                position: absolute;
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
        </style>
    </head>
    <body>        
        <div class="container-md">
            <div class="row" id="linha-fretes">
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-3 col-xxl-2">
                    <div class="d-flex justify-content-center" id="data"></div>                       
                </div>
                <div class="col-sm-10 col-md-9 col-lg-10 col-xl-9 col-xxl-10" id="fretes"></div>
            </div>
<!--            <div class="row vh-100 d-flex justify-content-center align-items-center" id="loading">
                <div class="col-3 col-md-2 col-lg-1">
                    <img src="../img/loading.gif" class="img-fluid">
                </div>
            </div>-->
        </div>     
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <!-- Bootstrap DatePicker JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>    
        <script src="https://unpkg.com/bootstrap-datepicker@1.10.0/dist/locales/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
        <!-- Utilidades -->
        <script src="../js/util.js"></script>
        <script>
            $(document).ready(function () {
                $('#data').datepicker({
                    language: "pt-BR",
                    todayBtn: "linked",
                    startDate: "0d",
                    endDate: "+10d",
                    maxViewMode: 2,
                    daysOfWeekHighlighted: "0",
                    todayHighlight: true
                }).on('changeDate', function (e) {
                    let dataS = e.date.toLocaleDateString('pt-BR');
                    $.ajax({
                        url: 'buscaFretes.php',
                        type: 'POST',
                        data: 'data=' + dataS,
                        success: function (data) {
                            $('#fretes').html(data);
                        },
                        error: function (error) {
                            console.log("Error:");
                            console.log(error);
                        }
                    });
                });
                setDataHoje('#data');
            });
        </script>
    </body>
</html> 