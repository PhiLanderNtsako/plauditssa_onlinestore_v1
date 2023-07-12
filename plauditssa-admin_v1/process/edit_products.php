<?php 
	session_start();
  	include "../includes/dbConfig.php";

	$product_quantity_oneSize = $_POST['oneSize_quantity'];
	$product_quantity_XS = $_POST['xsmall_quantity'];
	$product_quantity_S = $_POST['small_quantity'];
	$product_quantity_M = $_POST['medium_quantity'];
	$product_quantity_L = $_POST['large_quantity'];
	$product_quantity_XL = $_POST['xlarge_quantity'];
	$product_quantity_2XL = $_POST['2xlarge_quantity'];
	$product_quantity_3XL = $_POST['3xlarge_quantity'];

	$product_id = $_POST['product_id'];
	$size_id = $_POST['size_id'];


			$query = "UPDATE product_size SET product_quantity_oneSize='$product_quantity_oneSize', product_quantity_XS='$product_quantity_XS', product_quantity_S='$product_quantity_S', product_quantity_M='$product_quantity_M', product_quantity_L='$product_quantity_L', product_quantity_XL='$product_quantity_XL', product_quantity_2XL='$product_quantity_2XL', product_quantity_3XL='$product_quantity_3XL' WHERE productID = '$product_id' AND productSizeID = '$size_id'";

			mysqli_query($conn, $query);
			echo mysqli_error($conn);
			mysqli_close($conn);
			echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/index.php">';

 ?>
