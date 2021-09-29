<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "u772532990_recargas");
	define("DB_PASSWORD", "Caracas2020");
	define("DB_DATABASE", "u772532990_recargas");
    
    function db_conectar(&$db){
       $db = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE, 3306) or die('Error en la conexion: '.mysqli_error($db));
    }

    function sp_allog($puser, $preqid, $ppage, $pcmd){
        global $db;
        $qrylog = "INSERT INTO auditlog (fchhrs, user, req_id, page, cmd) VALUES ";
        $qrylog .= "(NOW(), '".$puser."', '".$preqid."', '".$ppage."', '".addslashes(json_encode($pcmd))."');";
        mysqli_query($db, $qrylog);
    }
 
?>
