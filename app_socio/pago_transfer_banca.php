<?php
    // session_start();
    // $secc = $_GET['secc'];
    // if($secc == '') { $secc = 0; }
    // if(isset($_SESSION['login'])){ 
    //     $alcargar = 'ver('.$secc.');'; 
    // }else{
    //     $alcargar = 'window.open(\'login.php\',\'_self\');';
    // }
        
    // include_once('../inc/db_conex.php');
    // db_conectar($db);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css?<?= substr(time(), -5) ?>" type="text/css">
    <link rel="stylesheet" href="../inc/css/style.css?<?= substr(time(), -5) ?>" type="text/css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../inc/bootstrap/css/bootstrap.min.css?<?= substr(time(), -5) ?>" type="text/css">

    <!-- Place your stylesheet here-->
    <link href="../inc/css/home.css?<?= substr(time(), -5) ?>" rel="stylesheet" >

    <style>
.headerbg{background-image:url(../img/header_bg.jpg);background-position:center;background-size:cover}
</style>
</head>

<body >
    <div class="container-fluid">
        <div class="container p-0">
            <nav class="d-flex top-nav">
                <a href="h" class="signout-nav"><i class="fas fa-home"></i></a>
                <a href="https://www.recargasya.net/socio/panel" class=""><i class="fas fa-user"></i> Panel de Socio</a>
                <a href="https://www.recargasya.net/register" class=""><i class="fas fa-sign-in-alt"></i> Convertirse en Socio</a>
            </nav>
        </div>
        <!-- <div class="row headerbg">
        <div class="col-md-12 text-center">
            <div class="mt-md"><a href="https://www.recargasya.net"><img class="img-fluid" style="margin: auto" src="../img/logo.png" alt="RecargasYa"></a></div>
            <h1 class="slogan text-center">
            <span style="display: block;">Recarga saldo pre-pago</span>
            
            <span style="display: block;">Realiza tu pago con transferencia o pago móvil</span>
            <a style="margin-top:20px;" href="https://www.recargasya.net/preguntas-frecuentes" target="_blank" class="btn btn-lg btn-primary"><i class="fas fa-info-circle"></i> QUIERO MÁS INFORMACIÓN</a>
            </h1>
        </div>
        </div> -->
        
        <nav>
        <div class="col-md-12">

            <ul id="tabs" class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="nav-item">
            <a class="nav-link " href="#numero" aria-controls="numero" role="tab">
            <span class="tab-text-content">
            <span>
            <span class="number-circle">1</span>
            </span>
            <span class="tab-text">Ingresa tu Número y Monto a Recargar</span>
            </span>
            </a>
            </li>
            <li role="presentation" class="nav-item ">
            <a class="nav-link " href="#pago" aria-controls="pago" role="tab">
            <span class="tab-text-content">
            <span>
            <span class="number-circle">2</span>
            </span>
            <span class="tab-text">Selecciona tu Método de Pago</span>
            </span>
            </a>
            </li>
            <li role="presentation" class="nav-item">
            <a class="nav-link active " href="#reporte" aria-controls="reporte" role="tab">
            <span class="tab-text-content">
            <span>
            <span class="number-circle">3</span>
            </span>
            <span class="tab-text">Reporta tu Pago</span>
            </span>
            </a>
            </li>
            </ul>
        </div>
        <div class="row">
        <div class="col-md-4 col-xs-12 col-lg-4">
        <div class="col-12 ml-0 pr-0 pl-0 ">
                <img src="../img/transfer.png" class="img-responsive img-thumbail" style="max-width:100%;width:100%;height:auto;">
            </div>
        </div>

            <div class="panel-group col-md-4 col-xs-12 col-lg-7 ml-0 pr-1 pl-1 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading border border-info col-12">
                    <a data-toggle="collapse" href="#collapse1"><img src="../img/banco/banesco.png" alt=""></a>
                    <h4 class="panel-title ">
                        <a data-toggle="collapse" href="#collapse1">Banco Banesco
                    </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-success"><strong>Usted deberá transferir a la siguiente cuenta:</strong></li>
                        <li class="list-group-item"><strong>Número de cuenta:</strong> 0134 0555 72 5551040032</li>
                        <li class="list-group-item"><strong>Titular:</strong> Josefina de Almada</li>
                        <li class="list-group-item"><strong>Identificación:</strong> V-10229179</li>
                        <li class="list-group-item"><strong>Correo:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="aac3c4ccc5ead8cfc9cbd8cdcbd9d3cb84c4cfde">[email&#160;protected]</a></li>
                    </ul>
                    <div class="panel-footer">Footer</div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading border border-info col-12">
                    <a data-toggle="collapse" href="#collapse2"><img src="../img/banco/mercantil.png" alt=""></a>
                    <h4 class="panel-title ">
                        <a data-toggle="collapse" href="#collapse2">Banco Mercantil
                    </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-success"><strong>Usted deberá transferir a la siguiente cuenta:</strong></li>
                        <li class="list-group-item"><strong>Número de cuenta:</strong> 0134 0555 72 5551040032</li>
                        <li class="list-group-item"><strong>Titular:</strong> Josefina de Almada</li>
                        <li class="list-group-item"><strong>Identificación:</strong> V-10229179</li>
                        <li class="list-group-item"><strong>Correo:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="aac3c4ccc5ead8cfc9cbd8cdcbd9d3cb84c4cfde">[email&#160;protected]</a></li>
                    </ul>
                    <div class="panel-footer">Footer</div>
                    </div>
                </div>
            </div>
             

        </div>

        <div class="row">
            <div class="form-group col-12">
            <label for="exampleFormControlSelect1"> Banco de Origen :</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Seleccione</option>
                    <option>Banco Mercantil</option>
                    <option>Banco Banesco</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label for="sel1">Número de Confirmación :</label>
                <input id="xnom" name="xnom" type="text" placeholder="Ej.00000" class="form-control" style="text-transform: uppercase" required>
            </div>
            <div class="form-group col-12">
                <label for="sel1">Email de Notificacíon :</label>
                <input id="xnom" name="xnom" type="text" placeholder="Ej.ejemplo@gmail.com" class="form-control" style="text-transform: uppercase" required>
            </div>
            <div class="form-group col-12">
                <label for="sel1">Teléfono :</label>
                <input id="xnom" name="xnom" type="text" placeholder="Ej.0000000" class="form-control" style="text-transform: uppercase" required>
            </div>
            <div class="form-group col-12">
                <label for="sel1">Ingrese el monto que transfirió en BsS. :</label>
                <input id="xnom" name="xnom" type="text" placeholder="Ej.00000.0" class="form-control" style="text-transform: uppercase" required>
            </div>
            <div class="form-group col-12 text-center ">
                    <button  class="btn btn-success btn-lg btn-block" id="Guardar" name="Guardar" value="Insertar">Reportar Pago</button>
        </div>

        </div>
        
       
       
        <div class="row" id="FOOTER">
            <div class="col-12 footer-copyright text-center py-3">© 2020 Copyright: Recargas</div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" language="javascript">
        $(function() {
            $(".validar").keydown(function(event) {
                // alert(event.keyCode);
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 ||
                        event.keyCode > 105 || event.keyCode > 189) && event.keyCode !== 110 && event.keyCode !==
                    8 && event.keyCode !== 9) {
                    return false;
                }
            });
        });

    </script>
</body>

</html>
