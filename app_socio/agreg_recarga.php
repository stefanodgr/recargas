<?php

    include_once('../inc/db_conex.php');
    db_conectar($db);
// Desactivar toda notificación de error
error_reporting(0);
#Datos

$fecha		    =$_POST['fecha'];                // FECHA
$slc_codigo   =trim($_POST['slc_codigo']);                  //CODIGO
$xtelf		    =trim($_POST['xtelf']);		              // TELEFONO
$xmonto		    =trim($_POST['xmonto']);                 //  MONTO
$id_socio		  =trim($_POST['id_socio']);                      // ID


$nro= $slc_codigo.$xtelf;                 // NUMERO COMPLTO




// $sqlSocio  = "SELECT  socio_login as verifLogin , socio_id as verifID  FROM socios WHERE socio_login='$xsocio'";
// $resultSocio      = mysqli_query($db, $sqlSocio);
// $rsqlSocio            = mysqli_fetch_array($resultSocio, MYSQLI_ASSOC);

// $Login   = $rsqlSocio['verifLogin'];

// $id_socio   = $rsqlSocio['verifID'];

// if($id_socio){
    $sql01="INSERT INTO operacion_recarga VALUES 
    ('0','$fecha','$nro','$id_socio','$xmonto','0')";

    echo "-sql01--->".$sql01;
        if (!mysqli_query ($db,$sql01)) {
    echo("Error description: " . mysqli_error($db)); }

    $sql02="INSERT INTO operacion VALUES 
    ('0','$fecha','$id_socio','$xmonto','2')";

    echo "-sql02--->".$sql02;
        if (!mysqli_query ($db,$sql02)) {
    echo("Error description: " . mysqli_error($db)); }
  // echo '	<script>
  //                 alert("Transacción  Aprobada");
  //         </script>';
    echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= adm_01.php">';
// }else{
//   echo '	<script>
//   alert("Transacción  Rechazada");
// </script>';
// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= regis_balance.php">';
// }


   