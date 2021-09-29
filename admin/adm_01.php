<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

    if($varsesion == null || $varsesion = '' ){
      session_destroy();
      header("Location: login.php");

    }
   
    include_once('../inc/db_conex.php');
    db_conectar($db);

    // $qrygr1 = "SELECT DATE_FORMAT(fch,'%d/%m/%Y') as fch, cnt FROM vw_adm01gr;";
    // $rsres = mysqli_query($db, $qrygr1);    $gr_label = "[";    $gr_data = "[";
    // while($rres = mysqli_fetch_array($rsres)){
    //     $gr_label .= "'".$rres[0]."',";
    //     $gr_data .= $rres[1].',';
    // }

    // $gr_label = substr($gr_label, 0, strlen($gr_label)-1).']';
    // $gr_data = substr($gr_data, 0, strlen($gr_data)-1).']';

    // $qrygr2 = "SELECT * FROM vw_adm01gr2 ORDER BY status_id;";
    // $rsres = mysqli_query($db, $qrygr2);    $gr_label2 = "[";    $gr_data2 = "[";
    // while($rres = mysqli_fetch_array($rsres)){
    //     $gr_label2 .= "'".$rres[1]."',";
    //     $gr_data2 .= $rres[2].',';
    // }

    // $gr_label2 = substr($gr_label2, 0, strlen($gr_label2)-1).']';
    // $gr_data2 = substr($gr_data2, 0, strlen($gr_data2)-1).']';    

    // $qrysec1 = "SELECT * FROM persons WHERE provider_id='TUORDENYA' ORDER BY name;";
    // $rs_usu = mysqli_query($db,$qrysec1);   
    // while($usu = mysqli_fetch_assoc($rs_usu)){
    //     $usutbl .= '<tr><td>'.utf8_encode($usu['name']).'</td>'.PHP_EOL;
    //     $usutbl .= '<td>'.$usu['login'].'</td>'.PHP_EOL;
    //     if($usu['login'] != $_SESSION['login']){
    //         $disabled = '';
    //     }else{
    //         $disabled = ' disabled';
    //     }
    //     if($usu['passwd'] == substr(md5($usu['login']),11,8)){
    //         $usutbl .= '<td align="center">'.$usu['passwd'].'</td>'.PHP_EOL;
    //     }else{
    //         $usutbl .= '<td><button type="button" class="btn btn-warning w-100" onclick="rstp(\''.$usu['login'].'\',1);" '.$disabled.'>Resetear</button></td>'.PHP_EOL;            
    //     }

    //     $usutbl .= '<td align="center"><input type="checkbox" onclick="act(\''.$usu['login'].'\',1);"';
    //     if($usu['activo']=='1'){ $usutbl .= ' checked'; }
    //     $usutbl .= $disabled.'></td>'.PHP_EOL;
    //     $usutbl .= '<td><button type="button" class="btn btn-danger w-100" onclick="elim(\''.$usu['login'].'\',1);"'.$disabled.'>Eliminar</button></td></tr>'.PHP_EOL;
    // }


    // $qrysec2a = "SELECT * FROM providers ORDER BY active DESC, provider_name;";
    // $rs_prov1 = mysqli_query($db,$qrysec2a);    $prov1tbl = '';     $selprov = "<option value=''>Ninguno</option>".PHP_EOL;
    // while($prov1 = mysqli_fetch_assoc($rs_prov1)){
    //     $selprov .= '<option value="'.$prov1['provider_id'].'">'.utf8_encode($prov1['provider_name']).'</option>'.PHP_EOL;
    //     $prov1tbl .= '<tr><td>'.$prov1['provider_id'].'</td>'.PHP_EOL;
    //     $prov1tbl .= '<td>'.utf8_encode($prov1['provider_name']).'</td>'.PHP_EOL;
    //     $prov1tbl .= '<td width="10%" align="center"><input type="checkbox" onclick="actpro(\''.$prov1['provider_id'].'\',2);"';
    //     if($prov1['active']=='1'){
    //         $prov1tbl .= ' checked';
    //     }
    //     $prov1tbl .= '></td><td>&nbsp;</td></tr>'.PHP_EOL;
    // }

    // $qrysec2b = "SELECT * FROM vw_admsec2b ORDER BY provider_id, activo DESC;";
    // $rs_prov2 = mysqli_query($db, $qrysec2b) or die($qrysec2b);    $prov2tbl = '';     $antid = '';
    // while($usu2 = mysqli_fetch_assoc($rs_prov2)){
    //     if($antid != $usu2['provider_id']){
    //         $prov2tbl .= '<tr><th colspan="5" class="bg-dark text-white">'.utf8_encode($usu2['provider_name']).'</th></tr>'.PHP_EOL;
    //         $prov2tbl .= '<tr><th class="bg-dark text-white" width="20%">Cód. Proveedor</th>'.PHP_EOL;
    //         $prov2tbl .= '<th class="bg-dark text-white" width="30%">Nombre</th>'.PHP_EOL;
    //         $prov2tbl .= '<th class="bg-dark text-white" width="30%">Correo Electrónico</th>'.PHP_EOL;
    //         $prov2tbl .= '<th class="bg-dark text-white" width="10%">Activo</th>'.PHP_EOL;
    //         $prov2tbl .= '<th class="bg-dark text-white" width="10%">Acción</th></tr>'.PHP_EOL;
    //         $antid = $usu2['provider_id'];
    //     }
        
    //     $prov2tbl .= '<tr><td>'.$usu2['provider_id'].'</td>'.PHP_EOL;
    //     $prov2tbl .= '<td>'.utf8_encode($usu2['name']).'</td>'.PHP_EOL;
    //     $prov2tbl .= '<td>'.$usu2['login'].'</td>'.PHP_EOL;
    //     $prov2tbl .= '<td align="center"><input type="checkbox" disabled';
    //     if($usu2['activo']=='1'){ $prov2tbl .= ' checked'; }
    //     $prov2tbl .= '></td><td></td></tr>'.PHP_EOL;
    // }

  

    // $qrysec3 = "SELECT * FROM mensajeros WHERE mensa_id ";
    // $rs_mot = mysqli_query($db, $qrysec3) or die($qrysec3);     $mottbl="";
    // while($mot = mysqli_fetch_array($rs_mot)){
    //     $mottbl .= "<tr><td>".$mot['mensa_cedula']."</td>".PHP_EOL;
    //     $mottbl .= "<td>".utf8_encode($mot['mensa_nombre'])."</td>".PHP_EOL;
    //     $mottbl .= "<td>".utf8_encode($mot['mensa_correo'])."</td>".PHP_EOL;
    //     $mottbl .= '<td><button type="button" class="btn btn-warning w-100" onclick="modif(\''.$cli['login'].'\');">Modificar</button></td></tr>'.PHP_EOL;
    // }

    // $qrysec4 = "SELECT * FROM vw_listaclientes ORDER BY activo DESC, name;";
    // $rs_cli =  mysqli_query($db, $qrysec4) or die($qrysec4);     $clitbl = "";

    // while($cli = mysqli_fetch_array($rs_cli)){
    //     $clitbl .= '<tr><td>'.utf8_encode($cli['name']).'</td>'.PHP_EOL;
    //     $clitbl .= '<td>'.$cli['login'].'</td>'.PHP_EOL;
    //     $clitbl .= '<td>'.$idi[$cli['lang']].'</td>'.PHP_EOL;
    //     $clitbl .= '<td>'.$cli['ult_login'].'</td>'.PHP_EOL;
    //     $clitbl .= '<td>'.$cli['ult_pedido'].'</td>'.PHP_EOL;
    //     $clitbl .= '<td align="center"><input type="checkbox" id="chk_'.$cli['login'].'"';
    //     if($cli['activo']=='1'){ $clitbl .= ' checked'; }
    //     $clitbl .= ' onclick="act(\''.$cli['login'].'\',4);"></td>';
    //     $clitbl .= '<td><button type="button" class="btn btn-warning w-100" onclick="modif(\''.$cli['login'].'\');">Modificar</button></td></tr>'.PHP_EOL;
    // }

    $qryUsu = "SELECT * FROM usuario WHERE usuario_status = '1' ";
    $rs_usu1 = mysqli_query($db,$qryUsu);    $usu1tbl = '';     $selusu = "<option value=''>Ninguno</option>".PHP_EOL;
    while($usu1 = mysqli_fetch_assoc($rs_usu1)){
        $selusu .= '<option value="'.$usu1['usuario_id'].'">'.utf8_encode($usu1['usuario_id']).'</option>'.PHP_EOL;
        $usu1tbl .= '<tr><td>       
                        <form role="form" target="_blank"  action="admin_orden.php" method="post"> 
                            <button type="submit" name="idOrd" target="_black" class="btn btn-link" style="font-size: 100%;"  value="'.utf8_encode($usu1['usuario_login']).'" >'.utf8_encode($usu1['usuario_login']).'</button>
                        </form></td>'.PHP_EOL;
        $usu1tbl .= '<td>ACTIVO</td>'.PHP_EOL;
    }

    $qrySocio = "SELECT * FROM socios WHERE socio_status = '1' ";
    $rs_soc1 = mysqli_query($db,$qrySocio);    $socio1tbl = '';     $selsoc = "<option value=''>Ninguno</option>".PHP_EOL;
    while($socio1 = mysqli_fetch_assoc($rs_soc1)){
        $selsoc .= '<option value="'.$socio1['socio_id'].'">'.utf8_encode($socio1['socio_id']).'</option>'.PHP_EOL;
        $socio1tbl .= '<tr><td>       
                        <form role="form" target="_blank"  action="admin_orden.php" method="post"> 
                            <button type="submit" name="idOrd" target="_black" class="btn btn-link" style="font-size: 100%;"  value="'.utf8_encode($socio1['socio_login']).'" >'.utf8_encode($socio1['socio_login']).'</button>
                        </form></td>'.PHP_EOL;
        $socio1tbl .= '<td>'.$socio1['socio_cedula'].'</td>'.PHP_EOL;
        $socio1tbl .= '<td>'.$socio1['socio_nombre'].'</td>'.PHP_EOL;
        $socio1tbl .= '<td>'.$socio1['socio_telf'].'</td>'.PHP_EOL;
        $socio1tbl .= '<td>'.$socio1['socio_local'].'</td></tr>'.PHP_EOL;
}

$qryPago = "SELECT * FROM socio_pago WHERE socio_pago_status = '0'  ";
$rs_pag1 = mysqli_query($db,$qryPago);    $pago1tbl = '';     $selpag = "<option value=''>Ninguno</option>".PHP_EOL;
while($pag1 = mysqli_fetch_assoc($rs_pag1)){
    $selpag .= '<option value="'.$pag1['socio_pago_id'].'">'.utf8_encode($pag1['socio_pago_id']).'</option>'.PHP_EOL;
    $pago1tbl .= '<tr><td>       
                    <form role="form" target="_blank"  action="admin_orden.php" method="post"> 
                        <button type="submit" name="idOrd" target="_black" class="btn btn-link" style="font-size: 100%;"  value="'.utf8_encode($pag1['socio_pago_ref']).'" >'.utf8_encode($pag1['socio_pago_ref']).'</button>
                    </form></td>'.PHP_EOL;
    $pago1tbl .= '<td>'.$pag1['socio_pago_fech'].'</td>'.PHP_EOL;
    $pago1tbl .= '<td>'.$pag1['socio_pago_monto'].'</td>'.PHP_EOL;
    $pago1tbl .= '<td>       
    <form role="form"  action="status_pago_balance.php" method="post">
    <input type="hidden" name="fecha" >
        <button type="submit" name="number_refe" class="btn btn-link" style="font-size: 100%;"  value="'.$pag1['socio_pago_ref'].'" >PROCESAR</button>
    </form></td>'.PHP_EOL;
    $pago1tbl .= '<td>       
    <form role="form"  action="admin_orden.php" method="post"> 
        <button type="submit" name="idOrd" target="_black" class="btn btn-link" style="font-size: 100%;"  value="'.utf8_encode($pag1['socio_pago_ref']).'" >RECHAZAR</button>
    </form></td></tr>'.PHP_EOL;
}

    // $qrycate = "SELECT * FROM cate_provider";
    // $rs_cate1 = mysqli_query($db,$qrycate);    $cate1tbl = '';     $selcate = "<option value=''>Ninguno</option>".PHP_EOL;
    // while($cate1 = mysqli_fetch_assoc($rs_cate1)){
    //     $selcate .= '<option>'.utf8_encode($cate1['cate_provi_name']).'</option>'.PHP_EOL;
    //     $cate1tbl .= '<tr><td style="font-size: 100%;">'.utf8_encode($cate1['cate_provi_name']).'</td>'.PHP_EOL;
    //     $cate1tbl .= '
    //     <td ><img src="../img/fotos_categoria/'.$cate1['cate_provi_photo'].'" style="height: 3em;"></td>
    //     '.PHP_EOL;
    //     $cate1tbl .= '<td>       
    //     <form role="form"  action="admin_orden.php" method="post"> 
    //         <button type="submit" name="idOrd"  class="btn btn-warning"   value="'.utf8_encode($ord1['id']).'" >Modificar</button>
    //     </form></td>'.PHP_EOL;
    // }

    // $optlang = '<option value="es" selected>Español</option>'.PHP_EOL.'<option value="en">Inglés</option>'.PHP_EOL;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.ico">

    <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css?<?= substr(time(), -5) ?>">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../inc/bootstrap/css/bootstrap.min.css?<?= substr(time(), -5) ?>">
    <!-- Place your stylesheet here-->
    <link href="../inc/css/home.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css?<?= substr(time(), -5) ?>" rel="stylesheet">
    </head>
    <style>
* {
  box-sizing: border-box;
}

#myInput {
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;

  border: 1px solid #ddd;

}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>


<body onload="<?php echo $alcargar; ?>">
    <div class="container">
        <div class="row mt-3 align-bottom">
            <div class="col-10 col1">
            </div>
            <div class="col-10" style="font-size: 1.2em;">
                <strong>Bienvenido </strong> <?php echo $_SESSION['login']; ?>.
            </div>
            <div class="col-2 col3 text-right">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i><br>Cerrar sesión</a>
            </div>
        </div>
        <hr>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active" id="li0">
                        <a class="nav-link" href="#" onclick="ver(0);">Inicio</a>
                    </li>
                    <li class="nav-item" id="li1">
                        <a class="nav-link" href="#" onclick="ver(1);">Usuarios Adm.</a>
                    </li>
                    <li class="nav-item" id="li2">
                        <a class="nav-link" href="#" onclick="ver(2);">Socios</a>
                    </li>
                    <li class="nav-item" id="li2">
                        <a class="nav-link" href="#" onclick="ver(3);">Socios/Balance</a>
                    </li>
                    <li class="nav-item" id="li3">
                        <a class="nav-link" href="#" onclick="ver(4);">Socios/Pagos</a>
                    </li>
                    <li class="nav-item" id="li4">
                        <a class="nav-link" href="#" onclick="ver(5);">Recargas</a>
                    </li>
                    <li class="nav-item" id="li6">
                        <a class="nav-link" href="#" onclick="ver(6);">Recargas/Pagos</a>
                    </li>
                    <li class="nav-item" id="li5">
                        <a class="nav-link" href="#" onclick="ver(7);">Reportes</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row" id="INICIO">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title">Inicio</h5>
                    <div class="col-5 float-left"><canvas class="w-100" id="myChart2" style="height: 20em;"></canvas></div>
                    <div class="col-7 float-right"><canvas class="w-100" id="myChart" style="height: 20em;"></canvas></div>
                </div>
                <h3>Pedidos por Confirmar</h3>
                <div  class="inner-addon left-addon">
                    <i class="glyphicon glyphicon-search"></i>
                    <input type="text" id="myInput"  class="form-control" onkeyup="myFunction()" placeholder="Buscar en Pedidos">
              </div>
                        <table id="myTable" class="table-sm table-striped w-100">
                            <tr>
                                <th class="bg-dark text-white" width="15%">Código (ID)</th>
                                <th class="bg-dark text-white" width="15%">Fecha</th>
                                <!-- <th class="bg-dark text-white" width="10%">Cliente</th> -->
                                <th class="bg-dark text-white" width="10%">Proveedor</th>
                            </tr>
                          
                        </table>
            </div>
        </div>
        <div class="row" id="SOCIO" style="display: none;">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title">Socios Registrados</h5>
                    <form class="form" id="frm_products" name="frm_products" action="adm01usu.php" enctype="multipart/form-data" method="post">
                        <table class="table-sm table-bordered w-100">
                            <tr>
                                <th class="bg-dark text-white" width="20%">Login</th>
                                <th class="bg-dark text-white" width="15%">Cedula</th>
                                <th class="bg-dark text-white" width="40%">Nombre</th>
                                <th class="bg-dark text-white" width="5%">Telefono</th>
                                <th class="bg-dark text-white" width="5%">Local</th>
                            </tr>
                            <?php echo $socio1tbl; ?>
                            <br>
                            </form>
                            
                        </table>
                        <hr>
                        <div class=" form-group text-right">
                                <form role="form"   action="form_cate_provider.php"> 
                                    <button type="submit"   class="btn btn-primary"  >Agregar</button>
                                </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="row" id="PAGOBALANCE" style="display: none;">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title">PAGO BALANCE</h5>
                    <form class="form" id="frm_products" name="frm_products" action="adm01usu.php" enctype="multipart/form-data" method="post">
                        <table class="table-sm table-bordered w-100">
                            <tr>
                                <th class="bg-dark text-white" width="20%">N° Ref</th>
                                <th class="bg-dark text-white" width="15%">Fecha</th>
                                <th class="bg-dark text-white" width="40%">Monto</th>
                                <th class="bg-dark text-white" width="5%">Confirmar</th>
                                <th class="bg-dark text-white" width="5%">Rechazar</th>
                            </tr>
                            <?php echo $pago1tbl; ?>
                            <br>
                            </form>
                            
                        </table>
                        <hr>
                        <div class=" form-group text-right">
                                <form role="form"   action="form_cate_provider.php"> 
                                    <button type="submit"   class="btn btn-primary"  >Agregar</button>
                                </form>
                        </div>
                </div>
            </div>
        </div>
        <div class="row" id="USUARI" style="display: none;">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title">Usuarios Administradores</h5>
                    <form class="form" id="frm_products" name="frm_products" action="adm01usu.php" enctype="multipart/form-data" method="post">
                        <table class="table-sm table-striped w-100">
                            <tr>
                                <th class="bg-dark text-white" width="50%">Login</th>
                                <th class="bg-dark text-white" width="50%">Status</th>
                            </tr>
                     
                            <tr>
                            <?php echo $usu1tbl; ?>
                            </tr>
                        </table>
                    </form>
                    <form action="regis_usu.php">
                        <button type="submit">AGREGAR</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="MOTORI" style="display: none;">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title ">Motorizados</h5>
                    <form class="form" id="frm_mot" name="frm_mot" action="" enctype="multipart/form-data" method="post">
                        <table class="table-sm table-striped w-100">
                            <tr>
                                <th class="bg-dark text-white" width="20%">Cód. Identificación</th>
                                <th class="bg-dark text-white" width="30%">Nombre</th>
                                <th class="bg-dark text-white" width="20%">Correo Electrónico</th>
                                <th class="bg-dark text-white" width="20%">Accíon</th>
                            </tr>
                         
                        </table>
                    </form>
                    <br>
                    <div class=" form-group text-left">
                        <form role="form"   action="form_mensajero.php"> 
                            <button type="submit"   class="btn btn-primary"  >Agregar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="CLIENT" style="display: none;">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title">Inicio</h5>
                    <form class="form" id="frm_cli" name="frm_cli" action="" enctype="multipart/form-data" method="post">
                        <table class="table-sm table-striped w-100">
                            <tr>
                                <th class="bg-dark text-white" width="30%">Nombre</th>
                                <th class="bg-dark text-white" width="20%">Correo Electrónico</th>
                                <th class="bg-dark text-white" width="10%">Idioma</th>
                                <th class="bg-dark text-white" width="10%">Fch. Últ. Login</th>
                                <th class="bg-dark text-white" width="10%">Fch. Últ. Pedido</th>
                                <th class="bg-dark text-white" colspan="2" width="20%">Activo</th>
                            </tr>
                         
                            <tr>
                                <td class="bg-secondary">
                                    <input class="w-100" type="text" id="new_name5" name="new_name5" placeholder="Nombre">
                                    <input type="hidden" name="pvolta" value="adm_01.php?secc=4">
                                </td>
                                <td class="bg-secondary"><input class="w-100" type="text" id="new_login5" name="new_login5" placeholder="Correo Electrónico"></td>
                                <td class="bg-secondary"><select name="new_lang5"><?php echo $optlang; ?></select></td>
                                <td class="bg-secondary" colspan="2"></td>
                                <td class="bg-secondary" align="center"><input type="checkbox" id="new_activo5" name="new_activo5" checked></td>
                                <td class="bg-secondary" align="center"><button type="button" class="btn btn-primary w-100" onclick="cliagreg();">Agregar</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="REPORT" style="display: none;">
            <div class="col-12 card w-100">
                <div class="card-body">
                    <h5 class="card-title">Inicio</h5>
                </div>
            </div>
        </div>
        <div class="row" id="FOOTER">
            <div class="col-12 footer-copyright text-center py-3">© 2020 Copyright: TUORDENYA.COM</div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="../inc/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../inc/Chart.js/Chart.bundle.min.js?<?= substr(time(), -5) ?>"></script>
   <!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js?<?= substr(time(), -5) ?>"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js?<?= substr(time(), -5) ?>" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js?<?= substr(time(), -5) ?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js?<?= substr(time(), -5) ?>"></script>

    <script>
    function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        } else {
        tr[i].style.display = "none";
        }
    }       
    }
    }
    </script>
    <script type="text/javascript" language="javascript">
        var menu = Array('INICIO', 'USUARI', 'SOCIO','PAGOBALANCE', 'MOTORI', 'CLIENT', 'REPORT');

        function ver(pindex) {
            for (i = 0; i < menu.length; i++) {
                if (i == pindex) {
                    document.getElementById(menu[i]).style.display = '';
                    document.getElementById('li' + i).className = 'nav-item active';
                } else {
                    document.getElementById(menu[i]).style.display = 'none';
                    document.getElementById('li' + i).className = 'nav-item';
                }
            }
        }

        function mdb() {
            document.getElementById('')
        }

        function elim(pusu, pvolta) {
            window.open('usu_mod.php?opc=elim&login=' + pusu + '&pvolta=' + pvolta, '_self');
        }

        function rstp(pusu, pvolta) {
            window.open('usu_mod.php?opc=rstp&login=' + pusu + '&pvolta=' + pvolta, '_self');
        }

        function act(pusu, pvolta) {
            window.open('usu_mod.php?opc=act&login=' + pusu + '&pvolta=' + pvolta, '_self');
        }

        function provagreg() {
            document.getElementById('frm_prov1').action = 'agreg_prov.php';
            document.getElementById('frm_prov1').submit();
        }

        function motagreg() {
            document.getElementById('frm_mot').action = 'agreg_mot.php';
            document.getElementById('frm_mot').submit();
        }

        function cliagreg() {
            document.getElementById('frm_cli').action = 'agreg_cli.php';
            document.getElementById('frm_cli').submit();
        }

        function modif(plogin) {
            document.getElementById('new_login5').value = plogin;
            document.getElementById('frm_cli').action = 'agreg_cli.php';
            document.getElementById('frm_cli').submit();
        }

        function agreg(pvolta, psub) {
            if (document.getElementById('new_login' + psub) > '') {
                var nlogin = document.getElementById('new_login' + psub).value;
                var nname = document.getElementById('new_name' + psub).value;
                var urld = 'usu_mod.php?opc=agre&login=' + nlogin + '&name=' + nname + '&pvolta=' + pvolta;
                if (psub == 3) {
                    urld += '&provid=' + document.getElementById('new_provid3').value;
                }
                if (psub == 4) {
                    urld += '&provid=MOT_' + document.getElementById('new_provid4').value;
                    urld += '&photo=' + document.getElementById('new_photo4').value;
                }
                window.open(urld, '_self');
            }
        }

        function modCat() {
            document.getElementById('frm_products').action = 'adm01pro.php?opc=cat';
            document.getElementById('frm_products').submit();
        }

        function modProd() {
            document.getElementById('frm_products').action = 'adm01pro.php?opc=pro';
            document.getElementById('frm_products').submit();
        }
        var fecha = new Date();
        var DMN = fecha.getDate()+"-"+(fecha.getMonth()+1)+"-"+fecha.getFullYear();
        var HIS =fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
        var date = DMN+" "+HIS;
        // alert(date);
        document.getElementsByName("fecha")[0].value = date;
    </script>
</body>

</html>
