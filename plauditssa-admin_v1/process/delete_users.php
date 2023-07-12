<?php 

  include "../includes/dbConfig.php";


	$id_user = $_GET['id'];

	$sql = "DELETE FROM users WHERE userID = $id_user";

	$query = $conn->query($sql);

	echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/users.php">';
 ?>