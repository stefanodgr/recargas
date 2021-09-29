<?php

    include_once('../inc/db_conex.php');
    db_conectar($db);
// Desactivar toda notificación de error
error_reporting(0);
#Datos

$xsocio		=trim($_POST['xsocio']);                // LOGIN
$fecha    =trim($_POST['fecha']);                  //NACIONALIDAD
$xbanco		=trim($_POST['xbanco']);		              // CEDULA
$xref		  = trim($_POST['xref']);                 //  CONSTRASEÑA

$xmonto		=trim($_POST['xmonto']);                      // TELEFONO
$xtotal2		=trim($_POST['xtotal2']);                      // TELEFONO





$sqlSocio  = "SELECT  socio_login as verifLogin , socio_id as verifID  FROM socios WHERE socio_login='$xsocio'";
$resultSocio      = mysqli_query($db, $sqlSocio);
$rsqlSocio            = mysqli_fetch_array($resultSocio, MYSQLI_ASSOC);

$Login   = $rsqlSocio['verifLogin'];

$id_socio   = $rsqlSocio['verifID'];

$sqlNref       = "SELECT  socio_pago_ref as verifRef FROM socio_pago WHERE socio_pago_ref='$xref'";
$resultNref    = mysqli_query($db, $sqlNref);
$rsqlNref      = mysqli_fetch_array($resultNref, MYSQLI_ASSOC);

$Nref   = $rsqlNref['verifRef'];

if($Nref < '0'){
    $sql01="INSERT INTO socio_pago VALUES 
    ('0','$xref','$fecha','$id_socio','$xmonto','$xtotal2','0','$xbanco')";

    // echo "-sql01--->".$sql01;
        if (!mysqli_query ($db,$sql01)) {
    echo("Error description: " . mysqli_error($db)); }
  echo '	<script>
                  alert("Transacción  Aprobada");
          </script>';
    echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= adm_01.php">';
}else{
  echo '	<script>
  alert("Transacción  Rechazada Verifique N° Referencia");
</script>';
echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= regis_balance.php">';
}


   