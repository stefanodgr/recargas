<?php

	include('db_conex.php');
	$password_options = ['cost' => 10,];

	db_conectar($db);

	$login = $_POST['frm_login'];
	$tmppw = substr(md5($login),0,8).substr(md5(time()),0,8);

	$qry = "UPDATE btc_users SET password='".password_hash($tmppw,PASSWORD_BCRYPT, $password_options)."' WHERE email='".$login."';";
	$rs = mysqli_query($db, $qry);

	$qrylog = "INSERT INTO audit_log VALUES (NOW(),'".$_POST['frm_login']."','','olvido','".$tmppw."');";
	$rslog = mysqli_query($db, $qrylog);

	$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<div align="center">
  <p><img src="https://fibanca.online/common/img/logotipo.png" width="250"></p>
  <p><font size="3" face="Arial, Helvetica, sans-serif">Estimado cliente, usted 
    ha solicitado el cambio de contrase&ntilde;a para acceder a:<strong>Fibanca.com</strong><br>
    para completar esta acci&oacute;n debe:</font></p>
  <ol>
    <li>Acceder con la contraseña temporal: <b>'.$tmppw.'</b>.</li>
    <li>Dirigirse a la sección de Seguridad.</li>
    <li>Elegir una nueva contraseña de su preferencia.</li>
  </ol>  
  <p>Este correo se genera automáticamente, bajo ningun motivo debe responderlo</p>
  <p><hr></p>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&copy; 2019 Fibanca.com. 
    &#8211; Todos los derechos reservados</strong><br>
    <a href="https://fibanca.com/legal-center/acuerdo-de-usuario/" target="_blank">Acuerdo 
    de Usuario</a> | <a href="https://fibanca.com/legal-center/privacy-policy/" target="_blank">Pol&iacute;ticas 
    de Privacidad</a></font></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>';

	ini_set("SMTP", "mail.fibanca.com");
	ini_set("sendmail_from", "noreply@fibanca.online");

	$headers = "From: noreply@fibanca.online \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$subject = "Olvido de contraseña";

	mail($login, $subject, $html, $headers) or die('Error');
	echo ".<br>";

?>
<script type="text/javascript">
	alert('Se enviaron los pasos a seguir a su correo electr\u00f3nico');
	window.open('https://fibanca.online/v2/login.php','_self');
</script>