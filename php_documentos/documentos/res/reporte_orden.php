<?php
//error_reporting(E_ERROR | E_PARSE);

error_reporting(E_ERROR | E_PARSE);
include_once('../../inc/db_conex.php');
db_conectar($db);


  $ordenid    = $_POST['idOrd'];

  $sqlOrden = "SELECT
  id as codigo ,
  fchhrs as fecha,
  client_id as cliente,
  provider_id as proveedor
  FROM orders
  where  id = '$ordenid'";
  $resultOrden      = mysqli_query($db, $sqlOrden);
  $rsql1           = mysqli_fetch_array($resultOrden, MYSQLI_ASSOC);
  
  $id 		  	=  $rsql1['codigo'];																		// 
  $fecha 	  	=  $rsql1['fecha'];
  $cliente  	=  $rsql1['cliente'];
  $provee 		=  $rsql1['proveedor'];
  

?>


<page orientation="portrait" style="font-size: 12px" backtop="9mm" backbottom="10mm" backleft="1mm" backright="1mm">
	<table width="750" border="0">
		<tr>
			<th scope="row">

				<div>
           <h1>Detalle de la Orden</h1>
				</div>
			</th>
		</tr>

	</table>
	<br>
	<hr>
	<br>
	<table width="200" border="0">
		<tr>
			<th width="141" scope="row">Nro Orden :
				<hr>
			</th>
			<td width="379">
				<div align="justify"><?php echo $id; ?></div>
				<hr>
			</td>
		</tr>
		<tr>
			<th scope="row">Fecha de la Orden :
				<hr>
			</th>
			<td>
				<div align="justify"><?php echo $fecha; ?>
					<hr>
				</div>
			</td>
		</tr>
		<tr>
			<th scope="row">Cliente :
				<hr>
			</th>
			<td>
				<div align="justify"><?php echo $cliente; ?> </div>
				<hr>
			</td>
			<td rowspan="2">&nbsp;
			</td>
		</tr>
		<tr>
			<th scope="row">Proveedor :
				<hr>
			</th>
			<td>
				<div align="justify"><?php echo $provee; ?></div>
				<hr>
			</td>
		</tr>
		<?php ?>
	</table>
</page>