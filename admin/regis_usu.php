<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// */session_start();
    $varsesion = $_SESSION['usuario'];

    if($varsesion == null || $varsesion = '' ){
      session_destroy();
      header("Location: login.php");

    }

    include('../inc/db_conex.php');
    db_conectar($db);

   
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../inc/bootstrap/css/bootstrap.min.css">

    <!-- Place your stylesheet here-->
    <link href="../inc/css/home.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <style>
    .error{
        border-color: #d83917;
    }
    </style>
    <script type="text/javascript">
$(document).ready(function() {	
    $('#xlogin').on('blur', function(){
        $('#result-username').html('<img src="LoaderIcon.gif" />').fadeOut(1000);

        var username = $(this).val();		
        var dataString = 'xlogin='+username;

        $.ajax({
            type: "POST",
            url: "validar_login.php",
            data: dataString,
            success: function(data) {
                $('#result-username').fadeIn(1000).html(data);
            }
        });
    });
    $('#Guardar').on('click', function(){
        var pass       = $('#xpass').val(); 
        var pass2       = $('#xpass2').val(); 
        
        if(pass != pass2) {                            // VALIDACION DE RAZON
                    alert('ERROR: No son Iguales.');
                    $('#xpass2').addClass('error');
            return false;
        }
    });               

});    
</script>
</head>

<body>

    <div class="container-fluid divcontainerfluid h-100">
        <div class="container divcontainer h-100" style="padding-top: 1em;">
            <form id="frm_regis_cli" method="post" role="form" action="agreg_socio.php" style="border:0px;">
                <!-- <div class="col-12 text-center">
                    <img src="../img/logo_nuevo.png" class="w-50">
                </div> -->
                <fieldset class="w-100">
                    <legend>DATOS DEl SOCIO</legend>
                    <div class="row">
                    
                        <div class="form-group col-md-12 col-xs-12 col-lg-6">
                            <label for="">Login(Email):</label>
                            <input name="xlogin" type="email" id="xlogin" placeholder="Ej.ejemplo@gmail.com" class="form-control" required>
                            <div  id="result-username"></div> 
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-2">
                            <label for="sel1">Nac :</label>
                            <select class="form-control" id="xnac" name="xnac">
                                <option>V</option>
                                <option>E</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-4">
                            <label for="sel1">Cedula :</label>
                            <input id="xced" name="xced" type="text" placeholder="Ej.21333444" class="form-control validar"  maxlength="8" style="text-transform: uppercase" required>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-6">
                            <label for="sel1">Nombres :</label>
                            <input id="xnom" name="xnom" type="text" placeholder="Ej.Jose Perez" class="form-control" style="text-transform: uppercase" required>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-6">
                            <label for="sel1">Telefono :</label>
                            <input id="xtelf" name="xtelf" type="text" placeholder="Ej.04142255525" class="form-control validar" maxlength="11" style="text-transform: uppercase" required>
                        </div>

                        <div class="form-group col-md-12 col-xs-12 col-lg-6">
                            <label for="sel1">Nombre de la Empresa :</label>
                            <input id="xlocal" name="xlocal" type="text" placeholder="Ej.DORSAY" class="form-control" style="text-transform: uppercase" required>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-6">
                            <label for="sel1">Direccíon :</label>
                            <input id="xdire" name="xdire" type="text" placeholder="Ej.AV 4 DE MAYO" class="form-control "  style="text-transform: uppercase" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="sel1">Contraseña de la Empresa :</label>
                            <input id="xpass" name="xpass" type="password" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="sel1">Repetir Contraseña : </label>
                            <input id="xpass2" name="xpass2" type="text" class="form-control" required>
                        </div>
                    </div>
                </fieldset>

                <div class="row">
                

                  
            </form>
            <div class="form-group col-6 text-right ">
                        <button  class="btn btn-success btn-md" id="Guardar" name="Guardar" value="Insertar">Registrar</button>
                    </div>
                    <div class="form-group col-6 text-left">
                        <button type="button" onclick="Menu();" class="btn btn-danger btn-md">Regresar</button>
                    </div>
                </div>


        
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../inc/bootstrap/js/bootstrap.min.js?<?= substr(time(), -5) ?>"></script>
    <script src="../inc/jquery/jquery-3.4.1.min.js?<?= substr(time(), -5) ?>"></script>

    <script type="text/javascript">

    
        // function getLocation() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(showPosition);
        //     } else {
        //         alert("Geolocation is not supported by this browser.");
        //     }
        // }

        // function showPosition(position) {
        //     document.getElementById('xlat').value = position.coords.latitude;
        //     document.getElementById('xlon').value = position.coords.longitude;
        // }

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function loginExitoso() {
            window.open('adm_01.php', '_self');
        }

        function olvido() {
            if (validateEmail(document.getElementById('frm_login').value) == false) {
                alert('Recuerde llenar el campo Usuario con el correo registrado');
            } else {
                document.getElementById('form_login').action = 'olvido.php';
                document.getElementById('form_login').submit();
            }
        }

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

        function Menu() {
            window.open('adm_01.php', '_self');
        }

    </script>

</body>

</html>
