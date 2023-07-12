<?php 

  include "../includes/dbConfig.php";


	$id_postOrder = $_GET['id'];

	$sql = "UPDATE post_orders SET postOrder_deliveryStatus = 'Delivered' WHERE postOrderID = $id_postOrder";

	$query = $conn->query($sql);
	echo mysqli_error($conn);

	echo '<meta http-equiv="refresh" content="10; https://admin.plauditssa.co.za/orders.php">';
 ?>