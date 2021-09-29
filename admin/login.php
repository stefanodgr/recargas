<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
    include('../inc/db_conex.php');
	
    db_conectar($db);

    if(isset($_POST['frm_login'])){
        $login = $_POST['frm_login'];
        $pwd1 = $_POST['frm_pwd1'];      
    }else{
        $login = "";
        $pwd1 = "";
    }

    $fn_login = 5;

    if(isset($login)&&($login>'')){
        $qry = "SELECT usuario_login,usuario_contra FROM usuario WHERE usuario_login='$login' and usuario_contra='$pwd1' ";

        $rs = mysqli_query($db, $qry);
        $dbusr = mysqli_fetch_assoc($rs);
    }

    $sqlVerif="SELECT usuario_login as verifLogin,usuario_contra as verifcontra,usuario_id as verifId ,usuario_status FROM usuario WHERE usuario_login='$login' and usuario_contra='$pwd1'" ;
    $resultLogin       =mysqli_query($db,$sqlVerif);
    $rsqlLogin        =mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
    $login       =$rsqlLogin['verifLogin'];
    $id         =$rsqlLogin['verifId'];
    $pwd1       =$rsqlLogin['verifcontra'];


    

    if($login <> null and $pwd1 <> null ){
        // if($pwd1 == $pwd1){
            $etiqbody = 'onload="loginExitoso();"';
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['usuario'] =$id;
    }else{
        $login = '';
        $pwd1 = '';
        $etiqbody = '';
        // echo "no llego";
    }
   
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/icono.ico?<?= substr(time(), -5) ?>">

    <link rel="stylesheet" href="../inc/fontawesome/css/all.min.css?<?= substr(time(), -5) ?>">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../inc/bootstrap/css/bootstrap.min.css?<?= substr(time(), -5) ?>">

    <!-- Place your stylesheet here-->
    <link href="../inc/css/home.css?<?= substr(time(), -5) ?>" rel="stylesheet" type="text/css">
</head>

<body background="../img/login_fondo_1.jpg" <?php echo $etiqbody; ?>>

    <div class="container h-100">
        <div class="container divcontainer h-100" style="padding-top: 1em;">
            <div class="col-12 text-center">
                    <form id="form_login" method="post" enctype="multipart/form-data" action="login.php">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img src="../img/logo_recarga.png?<?= substr(time(), -5) ?>" style="max-width:80%;width:auto;height:auto;"> 
                                <div class="form-group form-row">
                                    <input type="text" class="form-control text-center mb-3" maxlength="255" id="frm_login" name="frm_login" placeholder="Usuario" value="<?php echo $login; ?>" required >
                                </div>
                                <div class="form-group form-row">
                                <!-- <label>Contraseña&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="float-right" onclick="olvido();">(olvidé mi contraseña)</a></label> -->
                                    <input type="password" class="form-control text-center mb-3" maxlength="255" name="frm_pwd1" placeholder="Contraseña"  value="<?php echo $pwd1; ?>" required>
                                </div>
                                <div class="col-md-4"></div>
                                    <button class="btn btn-primary w-50 mb-3">Entrar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="../inc/jquery/jquery-3.4.1.min.js"></script>
</body>
</html>
