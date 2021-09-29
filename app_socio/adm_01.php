<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

    session_start();
    $varsesion = $_SESSION['socio'];

    if($varsesion == null || $varsesion = '' ){
      session_destroy();
      header("Location: login.php");

    }
    include_once('../inc/db_conex.php');
    db_conectar($db);


    $id=$_SESSION['socio'];


    $qryPago = "SELECT * FROM socio_pago WHERE socio_pago_status = '0'  ";
    $rs_pag1 = mysqli_query($db,$qryPago);    $pago1tbl = '';   
    while($pag1 = mysqli_fetch_assoc($rs_pag1)){
        $pago1tbl .= '<tr><td>       
                        <form role="form" target="_blank"  action="admin_orden.php" method="post"> 
                            <button type="submit" name="idOrd" target="_black" class="btn btn-link" style="font-size: 100%;"  value="'.utf8_encode($pag1['socio_pago_ref']).'" >'.utf8_encode($pag1['socio_pago_ref']).'</button>
                        </form></td>'.PHP_EOL;
        $pago1tbl .= '<td>'.$pag1['socio_pago_fech'].'</td>'.PHP_EOL;
        $pago1tbl .= '<td>'.number_format($pag1['socio_pago_monto'],2,",",".").'</td></tr>'.PHP_EOL;
}

$qryPagoAccetp = "SELECT * FROM socio_pago WHERE socio_pago_status = '1'  ";
$rs_pag2 = mysqli_query($db,$qryPagoAccetp);    $pago2tbl = '';   
while($pag2 = mysqli_fetch_assoc($rs_pag2)){
    $pago2tbl .= '<tr><td>       
                    <form role="form" target="_blank"  action="admin_orden.php" method="post"> 
                        <button type="submit" name="idOrd" target="_black" class="btn btn-link" style="font-size: 100%;"  value="'.utf8_encode($pag2['socio_pago_ref']).'" >'.utf8_encode($pag2['socio_pago_ref']).'</button>
                    </form></td>'.PHP_EOL;
    $pago2tbl .= '<td>'.$pag2['socio_pago_fech'].'</td>'.PHP_EOL;
    $pago2tbl .= '<td>'.number_format($pag2['socio_pago_monto'],2,",",".").'</td></tr>'.PHP_EOL;
}

$qryPagoCliPent = "SELECT * FROM operacion_recarga WHERE socio_id = '$id' and ope_recarga_status ='0'  ";
$rs_pag3 = mysqli_query($db,$qryPagoCliPent);    $pago3tbl = '';   
while($pag3 = mysqli_fetch_assoc($rs_pag3)){
    $pago3tbl .= '<tr><td>'.$pag3['ope_recarga_fech'].'</td>'.PHP_EOL;
    $pago3tbl .= '<td>'.$pag3['ope_recarga_num'].'</td>'.PHP_EOL;
    $pago3tbl .= '<td>'.number_format($pag3['ope_recarga_monto'],2,",",".").'</td></tr>'.PHP_EOL;
}

$qryPagoCliAcetp = "SELECT * FROM operacion_recarga WHERE socio_id = '$id' and ope_recarga_status ='1'  ";
$rs_pag4 = mysqli_query($db,$qryPagoCliAcetp);    $pago4tbl = '';   
while($pag4 = mysqli_fetch_assoc($rs_pag4)){
    $pago4tbl .= '<tr><td>'.$pag4['ope_recarga_fech'].'</td>'.PHP_EOL;
    $pago4tbl .= '<td>'.$pag4['ope_recarga_num'].'</td>'.PHP_EOL;
    $pago4tbl .= '<td>'.number_format($pag4['ope_recarga_monto'],2,",",".").'</td></tr>'.PHP_EOL;
}


$sqlOpeEntrada = "SELECT 
socio_id,
ope_monto,
ope_status
FROM operacion 
WHERE socio_id = '$id' and ope_status ='1' ";
$resultOpeEntrada        = mysqli_query($db, $sqlOpeEntrada);
$rsqOpeEntrada           = mysqli_fetch_array($resultOpeEntrada, MYSQLI_ASSOC);

$montoEntrada        = $rsqOpeEntrada['ope_monto'];

$totalMontoEn  = number_format($montoEntrada,2,",",".");


$sqlOpeSalida = "SELECT 
socio_id,
ope_monto,
ope_status
FROM operacion 
WHERE socio_id = '$id' and ope_status ='2' ";
$resultOpeSalida        = mysqli_query($db, $sqlOpeSalida);
$rsqOpeSalida           = mysqli_fetch_array($resultOpeSalida, MYSQLI_ASSOC);

$MontoSalida        = $rsqOpeSalida['ope_monto'];


$MontoTotal = $montoEntrada - $MontoSalida;

$totalMonto  = number_format($MontoTotal,2,",",".");


$sqlSocioBloq = "SELECT 
socio_id,
socio_pago_monto,
socio_pago_status
FROM socio_pago 
WHERE socio_id = '$id' and socio_pago_status ='0' ";
$resultSoBloq        = mysqli_query($db, $sqlSocioBloq);
$rsqSocioBloq           = mysqli_fetch_array($resultSoBloq, MYSQLI_ASSOC);

$montoSocioBloq        = $rsqSocioBloq['socio_pago_monto'];

$totalSocioBloq  = number_format($montoSocioBloq,2,",",".");


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RcargaService</title>
    <link rel="icon" href="../img/icono.ico?<?= substr(time(), -5) ?>">

    <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css?<?= substr(time(), -5) ?>" type="text/css">
    <link rel="stylesheet" href="../inc/css/style.css?<?= substr(time(), -5) ?>" type="text/css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../inc/bootstrap/css/bootstrap.min.css?<?= substr(time(), -5) ?>" type="text/css">

    <!-- Place your stylesheet here-->
    <link href="../inc/css/home.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css" >
      <!-- DataTables -->
  <link rel="stylesheet" href="../inc/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?<?= substr(time(), -5) ?>" type="text/css">
  <link rel="stylesheet" href="../inc/plugins/datatables-responsive/css/responsive.bootstrap4.min.css?<?= substr(time(), -5) ?>" type="text/css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../inc/dist/css/adminlte.min.css?<?= substr(time(), -5) ?>" type="text/css">
  <link rel="stylesheet" href="../inc/css/font-awesome.min.css?<?= substr(time(), -5) ?>" type="text/css">
  
  

    <style>
.headerbg{background-image:url(../img/header_bg.jpg);background-position:center;background-size:cover}
.error{
        border-color: #d83917;
    }
</style>
</head>

<body style="overflow-x:hidden" onload="<?php echo $alcargar; ?>" >
        <div class="row mt-3 align-bottom">
            <div class="col-10 col1">
                <h4>Bienvenido: <?php echo utf8_encode($_SESSION['login']); ?></h4>
            </div>
            <div class="col-2 col3 text-right">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i><br>Cerrar sesión</a>
            </div>
        </div>
        <hr>
  <div class="container-fluid">
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active" id="li0">
                        <a class="nav-link" href="#" onclick="ver(0);">Inicio</a>
                    </li>
                    <li class="nav-item" id="li1">
                      <a class="nav-link" href="#" onclick="ver(1);">Saldo</a>
                    </li>
                    <li class="nav-item" id="li2">
                      <a class="nav-link" href="#" onclick="ver(2);">Saldo-Aprovado</a>
                    </li>
                    <li class="nav-item" id="li3">
                      <a class="nav-link" href="#" onclick="ver(3);">Recargar</a>
                    </li>
                    <li class="nav-item" id="li4">
                      <a class="nav-link" href="#" onclick="ver(4);">Listado Recargas</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div  id="INICIO">
                <div class="row">
                  <div class="col-md-6 col-xs-12 col-lg-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3><?php echo $totalMonto; ?>.BsS</h3>

                          <p>Saldo Disponible</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-balance-scale"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-lg-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3><?php echo $totalSocioBloq; ?>.BsS</h3>

                          <p>Saldo Bloqueado</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-bank"></i>
                        </div>
                      </div>
                    </div>
                </div>
            <div class="col-md-12">
            
                <ul id="tabs" class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="nav-item"><a class="nav-link active"  aria-controls="numero" role="tab">
                        <span class="tab-text-content"></span>
                        <span class="number-circle">1</span></span>
                        <span class="tab-text">Ingresa tu Número y Monto a Recargar</span></span></a>
                    </li>
                </ul>
            </div>
            <br><br>
            <div class="row">
                <div class="form-group col-md-3 col-xs-12 col-lg-4">
                    <form role="form"  action="agreg_recarga.php" method="post">
                      <input type="hidden" name="fecha">
                      <input type="hidden" id="balance" value="<?php echo $MontoTotal; ?>">
                      <input type="hidden" name="id_socio" value="<?php echo $id; ?>">
                            <select class="form-control" id="slc_codigo" name="slc_codigo" required>
                            <option value="0" >Servicios..</option>
                            <option value="0414">Movistar-0414</option>
                            <option value="0424">Movistar-0424</option>
                            <option value="0412">Digitel-0412</option>
                            <option value="0426">Movilnet-0426</option>
                            <option value="0416">Movilnet-0416</option>
                            </select>
                        </div>
                        <div class="input-group  mb-3 col-md-4 col-xs-12 col-lg-4 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Telefono:</span>
                            </div>
                            <input type="text"  name="xtelf" id="xtelf" class="form-control validar " maxlength="7" aria-label="Amount (to the nearest dollar)" required>
                        </div>
                        <div class="input-group  mb-3 col-md-5 col-xs-12 col-lg-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Monto:</span>
                            </div>
                            <input type="text"  name="xmonto" id="xmonto"class="form-control validar "  aria-label="Amount (to the nearest dollar)" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00 BsS</span>
                            </div>
                        </div>
                        <div class="form-group col-12 text-right ">
                        <button type="button" class="btn btn-sm btn-danger" disabled> <strong>Atencion!</strong> Monto Minimo : 10.000.00 BsS .</button>
                        </div>
  


                        <div class="form-group col-12 text-center ">
                            <button  class="btn btn-success btn-md" id="Guardar_Pago" name="Guardar_Pago">Realizar transacción</button>
                        </div>
                    </form>
                </div>
            </div>
    <div class="row " id="PAGO" style="display: none;">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recargas-Proveedor Pendientes</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Numero Referencia</th>
                      <th>Fecha</th>
                      <th>Monto BsS</th>
                    </tr>
                    </thead>
                    <tbody>
                  <?php echo $pago1tbl; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
          <div class="form-group col-12 text-left ">
                            <form role="form"   action="regis_balance.php"  > 
                            <button  class="btn btn-info btn-md"> AGREGAR</button>
                            </form>     
          </div>
    </div>
    <div class="row " id="RECARGALIST" style="display: none;">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Lista de Recargas-Proveedor Aprovada</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Numero Referencia</th>
                    <th>Fecha</th>
                    <th>Monto BsS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php echo $pago2tbl; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row " id="RECARCLIEN" style="display: none;">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Lista de Recargas-Cliente Pendiente</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Numero</th>
                    <th>Monto BsS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php echo $pago3tbl; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
      <!-- /.row -->
      <div class="row " id="RECARCLIENACETP" style="display: none;">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Lista de Recargas-Cliente Aprovada</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Numero</th>
                    <th>Monto BsS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php echo $pago4tbl; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
      <!-- /.row -->
        <div class="row" id="FOOTER">
            <div class="col-12 footer-copyright text-center py-3">© 2020 Copyright: Recargas</div>
        </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js?<?= substr(time(), -5) ?>" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js?<?= substr(time(), -5) ?>" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js?<?= substr(time(), -5) ?>" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?<?= substr(time(), -5) ?>" type="text/css">
    <!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="../inc/plugins/bootstrap/js/bootstrap.bundle.min.js?<?= substr(time(), -5) ?>"></script>
<!-- DataTables -->
<script src="../inc/plugins/datatables/jquery.dataTables.min.js?<?= substr(time(), -5) ?>"></script>
<script src="../inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js?<?= substr(time(), -5) ?>"></script>

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


        var menu = Array('INICIO', 'PAGO','RECARGALIST','RECARCLIEN','RECARCLIENACETP');
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
        
            var fecha = new Date();

        var DMN = fecha.getDate()+"-"+(fecha.getMonth()+1)+"-"+fecha.getFullYear();
        var HIS =fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
        var date = DMN+" "+HIS;
        // alert(date);
        document.getElementsByName("fecha")[0].value = date;

    $(document).ready(function() {
        $('#Guardar_Pago').on('click', function(){
            // alert("llego");
                var slc_codigo      = document.getElementById("slc_codigo").value; 
                var balance         = document.getElementById("balance").value; 
                var monto           = document.getElementById("xmonto").value; 
                var telf           = document.getElementById("xtelf").value; 
                alert(balance);
                
                if(slc_codigo == "0") {                            // SELECT CODIGO
                        alert('Ingrese el Servicio.');
                        $('#slc_codigo').addClass('error');
                    return false;
                }
                if(telf == "0" || telf == ""  ) {                            // SELECT CODIGO
                        alert('Ingrese el Numero.');
                    return false;
                }
                

                // VALIDAR MONTO MINIMO
                if(monto <= 9999 ) {                           
                        alert('Monto es menor que el monto minimo.');
                    return false;
                }

                // VALIDAR QUE MONTO NO SUPERE EL BALANCE
                if(monto > balance) {                            
                        alert('Monto supera su balance.');
                    return false;
                }

        });

        
    });   

    $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": true,
    });
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": true,
    });

    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": true,
    });

    
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });

  });
    </script>
</body>

</html>
