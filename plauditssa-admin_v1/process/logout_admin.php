<?php 
	session_start();

	unset($_SESSION['adminID']);
	session_destroy();

	echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/index.php">';
 ?>