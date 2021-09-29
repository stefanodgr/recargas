<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
    include('../inc/db_conex.php');
    $password_options = ['cost' => 10,];
    $dbusr = '';
	
    db_conectar($db);

    if(isset($_POST['frm_login'])){
        $login = $_POST['frm_login'];
        $pwd1 = $_POST['frm_pwd1'];      
    }else{
        $login = "";
        $pwd1 = "";
    }

    $password_options = ['cost' => 10,];

    $msg[0] = "Usuario no existe";
    $msg[1] = "Login exitoso";
    $msg[2] = "Usuario inactivo";
    $msg[3] = "Usuario no registrado";
    $msg[4] = "Login fallido";

    $fn_login = 5;

    if(isset($login)&&($login>'')){
        $qry = "SELECT c.cli_login, c.cli_nombre,c.cli_constra FROM clientes AS c WHERE c.cli_login='$login' and c.cli_constra='$pwd1' ";

        $rs = mysqli_query($db, $qry);
        $dbusr = mysqli_fetch_assoc($rs);

        // if((strlen($dbusr['passwd']) == 8)&&($pwd2 > '')&&($pwd1 == $pwd2)){
        //     $qryact = "UPDATE persons SET passwd='".password_hash($pwd1,PASSWORD_BCRYPT, $password_options)."' WHERE login='$login';";
        //     $rsact = mysqli_query($db, $qryact);
        //     $cmd = 'password_change('.$login.')';
        //     sp_allog($login, '', 'login', $cmd);
        //     $fn_login = 1;
        // }else{
        //     if (password_verify($pwd1, $dbusr['passwd'])&&($dbusr['activo']==1)){
        //         $fn_login = 1;
        //     }else{
        //         $fn_login = 5;
        //     }
        // }
        // if($dbusr['provider_id']!='TUORDENYA'){
        //     $fn_login = 5;    
        // }
    }

    $sqlVerif="SELECT cli_login as verifLogin, cli_nombre as verifNombre,cli_constra as verifcontra,cli_id as verifId FROM clientes WHERE cli_login='$login' and cli_constra='$pwd1'" ;
    $resultLogin       =mysqli_query($db,$sqlVerif);
    $rsqlLogin        =mysqli_fetch_array($resultLogin,MYSQLI_ASSOC);
    $login       =$rsqlLogin['verifLogin'];
    $name       =$rsqlLogin['verifNombre'];
    $id         =$rsqlLogin['verifId'];
    $pwd1       =$rsqlLogin['verifcontra'];


    

    if($login <> null and $pwd1 <> null ){
        // if($pwd1 == $pwd1){
            $etiqbody = 'onload="loginExitoso();"';
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['usuario'] = $dbusr['cli_nombre'];
            $_SESSION['cli_id'] =$id;
            // echo "llego";
            // echo "----->Pass-->".$pwd1;
            // $cmd = 'login('.$login.')';
            // sp_allog($login, '', 'login', $cmd);
        // }else{
        //     $etiqbody = '';
        // }
        // echo "llego";
        //     echo "----->Pass-->".$pwd1;
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
    <link rel="icon" href="../img/favicon.ico?<?= substr(time(), -5) ?>">

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
                                <img src="../img/logo_nuevo.png?<?= substr(time(), -5) ?>" style="max-width:80%;width:auto;height:auto;"> 
                                <div class="form-group form-row">
                                    <input type="text" class="form-control text-center mb-3" maxlength="255" id="frm_login" name="frm_login" placeholder="Usuario" value="<?php echo $login; ?>" required >
                                </div>
                                <div class="form-group form-row">
                                <!-- <label>Contraseña&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="float-right" onclick="olvido();">(olvidé mi contraseña)</a></label> -->
                                    <input type="password" class="form-control text-center mb-3" maxlength="255" name="frm_pwd1" placeholder="Contraseña"  value="<?php echo $pwd1; ?>" required>
                                </div>
                                <div class="col-md-4"></div>
                                    <button class="btn btn-primary w-50 mb-3">Entrar</button>
                                <div class="col-12">
                                    <a href="#">¿Olvidó su contraseña?</a><br>
                                </div>
                        
                            </div>
                      
                        </div>
                </form>
                <div class="w-100 mb-3">
                    <form role="form"   action="adm_regis_cli.php"> 
                        <button type="submit"   class="btn btn-link"  >Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
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
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="../inc/jquery/jquery-3.4.1.min.js"></script>
</body>
</html>
