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
                <a href="login.php" class=""><i class="fas fa-user"></i> Panel de Socio</a>
                <a href="login.php" class=""><i class="fas fa-sign-in-alt"></i> Convertirse en Socio</a>
            </nav>
        </div>
        <div class="row headerbg">
        <div class="col-md-12 text-center">
            <div class="mt-md"><a href=""><img class="img-fluid" style="margin: auto" src="../img/logo.png" alt=""></a></div>
            <h1 class="slogan text-center">
            <span style="display: block;">Recarga saldo pre-pago</span>
            
            <span style="display: block;">Realiza tu pago con transferencia o pago móvil</span>
            <a style="margin-top:20px;" href="" target="_blank" class="btn btn-lg btn-primary"><i class="fas fa-info-circle"></i> QUIERO MÁS INFORMACIÓN</a>
            </h1>
        </div>
        </div>
        <nav>
        <div class="col-md-12">

            <ul id="tabs" class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="nav-item">
            <a class="nav-link active" href="#numero" aria-controls="numero" role="tab">
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
            <a class="nav-link " href="#reporte" aria-controls="reporte" role="tab">
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
<br><br>
        <div class="row">
            <div class="form-group col-md-4 col-xs-12 col-lg-4">
                <label for="exampleFormControlSelect1">Servicios:</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option value="0" >Seleccione..</option>
                    <option value="0414">Movistar-0414</option>
                    <option value="0424">Movistar-0424</option>
                    <option value="0412">Digitel-0412</option>
                    <option value="0426">Movilnet-0426</option>
                    <option value="0416">Movilnet-0416</option>
                    </select>
                </div>
                <div class="form-group col-md-4 col-xs-12 col-lg-4">
                    <label for="sel1">Número :</label>
                    <input id="xtelf" name="xtelf" type="text" placeholder="Ej.9119617" class="form-control validar" maxlength="11" required>
                </div>
                <div class="form-group col-md-4 col-xs-12 col-lg-4">
                    <label for="sel1"> Monto a  recargar (BsS) :</label>
                    <input id="xtelf" name="xtelf" type="text" placeholder="Ej.20.000" class="form-control validar" maxlength="11" required>
                </div>
                <br>
                <div class="form-group col-12 text-center ">
                    <button  class="btn btn-success btn-md" id="Guardar" name="Guardar" value="Insertar">Siguiente</button>
                </div>
            </div>
        </div>
<!-- <div class="row ">
<div class="col-md-12 text-center">
<div ><a href="https://www.recargasya.net"><img class="img-fluid" style="margin: auto" src="../img/header_bg." alt="RecargasYa"></a></div>
</div> -->
       
       
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
