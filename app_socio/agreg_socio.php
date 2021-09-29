<?php

    include_once('../inc/db_conex.php');
    db_conectar($db);
// Desactivar toda notificación de error
error_reporting(0);
#Datos

$xlogin		=trim($_POST['xlogin']);                // LOGIN
$xnac     =trim($_POST['xnac']);                  //NACIONALIDAD
$xced		  =trim($_POST['xced']);		              // CEDULA
$xnom		  = trim(strtoupper($_POST['xnom']));		  // NOMBRES
$xpass		=trim($_POST['xpass']);                 //  CONSTRASEÑA
$xtelf		=$_POST['xtelf'];                       // TELEFONO
$xlocal		= trim(strtoupper($_POST['xlocal']));		// NOMBRE LOCAL
$xdire		=trim(strtoupper($_POST['xdire']));		  //	DIRECCION LOCAL

$cedula = $nac.$xced;                             //CEDULA


$sqlSocio  = "SELECT  socio_login as verifLogin FROM socios WHERE socio_login='$xlogin'";
$resultSocio      = mysqli_query($db, $sqlSocio);
$rsqlSocio            = mysqli_fetch_array($resultSocio, MYSQLI_ASSOC);

$Login   = $rsqlSocio['verifLogin'];

#Opciones
if($Login == null){


    $sql01="INSERT INTO socios VALUES 
    ('0','$xlogin','$cedula','$xnom','$xpass','$xtelf','$xlocal','$xdire','1')";

    echo "-sql01--->".$sql01;
        if (!mysqli_query ($db,$sql01)) {
    echo("Error description: " . mysqli_error($db)); }
  echo '	<script>
                  alert("Registro Exitoso");
          </script>';
    // echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= /app_inicio/login.php">';
}else{
  echo '	<script>
  alert("Login No Disponible Exitoso");
</script>';
echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= /app_demo/adm_regis_cli.php">';
}


   