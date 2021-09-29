<?php
    session_start();
    // $secc = $_GET['secc'];
    // if($secc == '') { $secc = 0; }
    // if(isset($_SESSION['login'])){ 
    //     $alcargar = 'ver('.$secc.');'; 
    // }else{
    //     $alcargar = 'window.open(\'login.php\',\'_self\');';
    // }
        
    include_once('../inc/db_conex.php');
    db_conectar($db);



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
    <link href="../inc/css/home.css?<?= substr(time(), -5) ?>" rel="stylesheet" >
      <!-- DataTables -->
  <link rel="stylesheet" href="../inc/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css?<?= substr(time(), -5) ?>">
  <link rel="stylesheet" href="../inc/plugins/datatables-responsive/css/responsive.bootstrap4.min.css?<?= substr(time(), -5) ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="../inc/dist/css/adminlte.min.css?<?= substr(time(), -5) ?>">
  <link rel="stylesheet" href="../inc/css/font-awesome.min.css?<?= substr(time(), -5) ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?<?= substr(time(), -5) ?>">
  <script type="text/javascript" src="js/jquery-latest.js?<?= substr(time(), -5) ?>"></script>
<script type="text/javascript" src="js/jquery.epiclock.min.js?<?= substr(time(), -5) ?>"></script>

    <style>
.headerbg{background-image:url(../img/header_bg.jpg);background-position:center;background-size:cover}
.error{
        border-color: #d83917;
    }
</style>
</head>
 <script>
 $(document).ready(function(){
//espero que cargue el DOM y llamo al plugin
  j jQuery('#reloj').epiclock({mode: EC_COUNTDOWN, format: 'V{<sup>dias</sup>} x{<sup>horas</sup>} i{<sup>minutos</sup>} s{<sup>segundos</sup>}', target: 'January 1, 2012 00:00:00'}).clocks(EC_RUN); 
});
 </script>
<body  >

<div id="header">
  <h3>Como crear una P&aacute;gina de lanzamiento. M&aacute;s tutoriales en: <a href="http://masquewordpress.com">http://masquewordpress.com</a> </h3>
</div>
<div id="wrapper">
           <div id="cuadro2" class="rounded">
               <div id="reloj" class="count_down"></div>
           </div>
 
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js?<?= substr(time(), -5) ?>" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js?<?= substr(time(), -5) ?>" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js?<?= substr(time(), -5) ?>" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                if(monto < "9999" ) {                           
                        alert('Monto es menor que el monto minimo.');
                    return false;
                }

                // VALIDAR QUE MONTO NO SUPERE EL BALANCE
                if(balance < monto) {                            
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
