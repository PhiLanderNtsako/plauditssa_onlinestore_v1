<?php 
	
  include "../includes/dbConfig.php";

	$product_title = mysqli_real_escape_string($conn,$_POST['title']);
	$titleSlug = mysqli_real_escape_string($conn,$_POST['titleSlug']);
	$product_titleSlug = str_replace(' ', '-', strtolower($titleSlug));
	$product_type = mysqli_real_escape_string($conn,$_POST['type']);
	$product_category = mysqli_real_escape_string($conn,$_POST['category']);
	$product_about = mysqli_real_escape_string($conn,$_POST['about']);
	$product_price = $_POST['price'];
	$product_quantity_oneSize = $_POST['oneSize_quantity'];
	$product_quantity_XS = $_POST['xsmall_quantity'];
	$product_quantity_S = $_POST['small_quantity'];
	$product_quantity_M = $_POST['medium_quantity'];
	$product_quantity_L = $_POST['large_quantity'];
	$product_quantity_XL = $_POST['xlarge_quantity'];
	$product_quantity_2XL = $_POST['2xlarge_quantity'];
	$product_quantity_3XL = $_POST['3xlarge_quantity'];

	$product_imageFront = $_FILES['imageFront']['name'];
	$product_imageBack = $_FILES['imageBack']['name'];
	$product_imageModel = $_FILES['imageModel']['name'];

	move_uploaded_file($_FILES['imageFront']['tmp_name'],'../uploads/product_images/'.$product_imageFront);
	move_uploaded_file($_FILES['imageBack']['tmp_name'],'../uploads/product_images/'.$product_imageBack);
	move_uploaded_file($_FILES['imageModel']['tmp_name'],'../uploads/product_images/'.$product_imageModel);

	$productIns = "INSERT INTO products (product_title, product_titleSlug, product_type, product_category, product_price, product_description, product_imageFront, product_imageBack, product_imageModel, product_date)
		VALUES ( '$product_title', '$product_titleSlug', '$product_type', '$product_category', '$product_price','$product_about', '$product_imageFront', '$product_imageBack', '$product_imageModel', now())"; 
	mysqli_query($conn, $productIns);
	$product_id = mysqli_insert_id($conn);
	echo mysqli_error($conn);

	$productskuIns = "INSERT INTO productsku (SKU) VALUES('PLDTS-#".$product_id."')";
	mysqli_query($conn, $productskuIns);
	$productSKU_id = mysqli_insert_id($conn);

	if ($product_type == 'headwear' || $product_category == 'Beanie' || $product_category == 'Bucket Hat' || $product_category == 'Scarf') {

		$product_quantity_oneSize = $_POST['oneSize_quantity'];
		$productSize_Ins = "INSERT INTO product_size (product_size_oneSize, product_quantity_oneSize, productSKUID, productID) VALUES ('".$productSKU_id."OneSize', '$product_quantity_oneSize', '$productSKU_id', '$product_id')";
			mysqli_query($conn, $productSize_Ins);
	}else {

		$productSize_Ins = "INSERT INTO product_size (product_size_XS, product_size_S, product_size_M, product_size_L, product_size_XL, product_size_2XL, product_size_3XL, product_quantity_XS, product_quantity_S, product_quantity_M, product_quantity_L, product_quantity_XL, product_quantity_2XL, product_quantity_3XL, productSKUID, productID) 
			VALUES ('".$productSKU_id."XSmall', '".$productSKU_id."Small', '".$productSKU_id."Medium', '".$productSKU_id."Large', '".$productSKU_id."XLarge', '".$productSKU_id."2XLarge', '".$productSKU_id."3XLarge', '$product_quantity_XS', '$product_quantity_S', '$product_quantity_M', '$product_quantity_L', '$product_quantity_XL', '$product_quantity_2XL', '$product_quantity_3XL','$productSKU_id', '$product_id')"; 
			mysqli_query($conn, $productSize_Ins);
	}
	echo mysqli_error($conn);
	//echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/index.php">';


 ?>
