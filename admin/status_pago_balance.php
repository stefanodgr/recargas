<?php

   
// Desactivar toda notificación de error
error_reporting(0);
include_once('../inc/db_conex.php');
db_conectar($db);
#Datos

$xref	  =$_POST['number_refe'];  
$fecha	=$_POST['fecha'];  
echo "---NUMERO-->".$xref;
echo "<br>";
echo "---FECHA-->".$fecha;
echo "<br>";





$sqlSocio  = "SELECT  
socio_pago_id     as id,
socio_id          as socio,
socio_pago_monto  as monto,
socio_pago_ref    as verifRef 
  FROM socio_pago WHERE socio_pago_ref='$xref'";
$resultSocio      = mysqli_query($db, $sqlSocio);
$rsqlSocio            = mysqli_fetch_array($resultSocio, MYSQLI_ASSOC);

$id_socio_pago      = $rsqlSocio['id'];
$id_socio           = $rsqlSocio['socio'];
$monto              = $rsqlSocio['monto'];


if($id_socio_pago <> null){
  $sql01 = "UPDATE socio_pago SET socio_pago_status='1' WHERE socio_pago_id='$id_socio_pago'";

    echo "-sql01--->".$sql01;
        if (!mysqli_query ($db,$sql01)) {
    echo("Error description: " . mysqli_error($db)); }


  $sql02 ="INSERT INTO operacion VALUES 
  ('0','$fecha','$id_socio_pago','$monto','1')";

  echo "-sql01--->".$sql02;
      if (!mysqli_query ($db,$sql02)) {
  echo("Error description: " . mysqli_error($db)); }
  echo '	<script>
                  alert("Transacción  Aprobada");
          </script>';
    // echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= adm_01.php">';
}else{
  echo '	<script>
  alert("Transacción  Rechazada");
</script>';
// echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL= regis_balance.php">';
}


   