<?php
	session_start();	
    include('../inc/db_conex.php');
	
	db_conectar($db);

    sp_allog($_SESSION['login'], '', 'logout', 'logout('.$_SESSION['login'].')');	
	
	session_unset();
	session_destroy();
?>
<script type="text/javascript">
    window.open('login.php', '_self');

</script>
