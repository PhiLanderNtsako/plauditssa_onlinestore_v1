<?php 

  include "../includes/dbConfig.php";


	$id_postOrder = $_GET['id'];

	$sql = "UPDATE post_orders SET postOrder_paymentStatus = 'Paid' WHERE postOrderID = $id_postOrder";

	$query = $conn->query($sql);

	echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/orders.php">';
 ?>