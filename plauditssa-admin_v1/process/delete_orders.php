<?php 

  include "../includes/dbConfig.php";


	$id_order = $_GET['id'];

	$sql = "DELETE FROM orders WHERE orderID = $id_order";

	$query = $conn->query($sql);

	echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/orders.php">';
 ?>