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


   $login= trim($_SESSION['login']);

   
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

    <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css?<?= substr(time(), -5) ?>">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../inc/bootstrap/css/bootstrap.min.css?<?= substr(time(), -5) ?>">

    <!-- Place your stylesheet here-->
    <link href="../inc/css/home.css" rel="stylesheet" type="text/css">
    <link href="../inc/css/general.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.js?<?= substr(time(), -5) ?>"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="../../assets/js/jquery-1.10.2.js"></script> -->



    <style>
    .error{
        border-color: #d83917;
    }
    </style>
    <script type="text/javascript">

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
            <form id="frm_regis_cli" method="post" role="form" action="agreg_pago.php" style="border:0px;">
                <input   name="xsocio" value="<?php echo $login; ?> " type="hidden">
                <fieldset class="w-100">
                    <legend >DATOS DE LA RECARGA</legend>
                    <hr class="azul">
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Cuentas Bancarias
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cuentas Bancarias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       BANCO MERCANTIL - V23947064 - Stefano De Genaro
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    <div class="row">
                        <div class="form-group col-md-12 col-xs-12 col-lg-3" style="display:none;">
                            <label for="sel1">FECHA :</label>
                            <input  id="fecha" name="fecha" type="hidden">
                        </div>
                            <div class="form-group col-md-12 col-xs-12 col-lg-4">
                                    <label for="sel1">BANCO :</label>
                                    <select class="form-control" name="xbanco" id="xbanco">
                            <?php
                            $sql01 = "SELECT banco_id,banco_nombre,banco_codigo from banco WHERE banco_status=1 order by banco_id";
                            $rsql01 = mysqli_query($db, $sql01);
                            echo "<option value='0'>--</option>";
                            if ($row2 = mysqli_fetch_array($rsql01, MYSQLI_ASSOC)) {
                                do {
                                echo '<option value="' . $row2['banco_id'] . '" title ="' . $row2['banco_codigo'] . '">' . $row2['banco_nombre'] . '</option>';
                                } while ($row2 = mysqli_fetch_array($rsql01, MYSQLI_ASSOC));
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-4">
                            <label for="sel1">MONTO :</label>
                            <input id="xmonto" name="xmonto" type="text" class="form-control validar" required  onkeyup="calcular();">
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-4">
                            <label for="sel1">TOTAL :</label>
                            <input id="xtotal" name="xtotal" type="text" class="form-control money" readonly>
                            <input id="xtotal2" name="xtotal2" type="hidden" class="form-control" readonly>
                        </div>
                        <div class="alert alert-danger col-md-12 col-xs-12 col-lg-6">
                        <strong>Atencion!</strong> colocar el Numero de Referencia  que sale en su pago movil.
                        </div>
                        <div class="form-group col-md-12 col-xs-12 col-lg-6">
                            <label for="sel1">N° Referencia :</label>
                            <input id="xref" name="xref" type="text" placeholder="" class="form-control validar"   style="text-transform: uppercase"  required >
                        </div>
                        <div class="alert alert-info col-md-12 col-xs-12 col-lg-12">
                        <strong>Atencion!</strong> con el pago realizo generar su reporte de pago para ser asignado a su balance.
                        </div>



                      
                        
                    </div>
                </fieldset>

                <div class="row">
                

                  
            </form>
            <div class="form-group col-6 text-right ">
                        <button  class="btn btn-success btn-md" id="Guardar" name="Guardar" value="Insertar">Reporte Pago</button>
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

    function calcular() {         

        var n1 = document.getElementById('xmonto').value;
        if(n1 == "0" || n1 == ""){
            alert("Monto Invalido");
        }else{
            var porce=Math.floor(n1*4)/100;
            var resul   = parseFloat(n1) + parseFloat(porce);
            var resul2  = parseFloat(resul) - parseFloat(n1);
            document.getElementsByName("xtotal")[0].value = resul;
            document.getElementsByName("xtotal2")[0].value = resul2;
    
        }
    }
    var fecha = new Date();

        // alert("Día: "+fecha.getDate()+"\nMes: "+(fecha.getMonth()+1)+"\nAño: "+fecha.getFullYear());
        // alert("Hora: "+fecha.getHours()+"\nMinuto: "+fecha.getMinutes()+"\nSegundo: "+fecha.getSeconds());
        var DMN = fecha.getDate()+"-"+(fecha.getMonth()+1)+"-"+fecha.getFullYear();
        var HIS =fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
        var date = DMN+" "+HIS;
        // alert(date);
        document.getElementsByName("fecha")[0].value = date;


  

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

        $(document).ready(function() {
        $('#Guardar').on('click', function(){
            // alert("llego");
                var monto           = document.getElementById("xmonto").value; 

                

                // VALIDAR MONTO MINIMO
                if(monto > "5000" ) {                           
                        alert('Monto Mínimo 5.000.00.BsS');
                    return false;
                }
        });

        
    });   


    </script>

</body>

</html>
