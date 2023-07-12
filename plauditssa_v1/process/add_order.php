<?php 
	session_start();
  	include "../includes/dbConfig.php";
	
	$user_firstName = mysqli_real_escape_string($conn,$_POST['checkout_firstName']);
	$user_lastName = mysqli_real_escape_string($conn,$_POST['checkout_lastName']);
	$user_company = mysqli_real_escape_string($conn,$_POST['checkout_company']);
	$user_email = mysqli_real_escape_string($conn,$_POST['checkout_email']);
	$user_phone = $_POST['checkout_phone'];

	$order_streetAddress = mysqli_real_escape_string($conn,$_POST['checkout_streetAddress']);
	$order_suburb = mysqli_real_escape_string($conn,$_POST['checkout_suburb']);
	$order_towncity = mysqli_real_escape_string($conn,$_POST['checkout_towncity']);
	$order_province = mysqli_real_escape_string($conn,$_POST['checkout_province']);
	$order_zipcode = $_POST['checkout_zipcode'];

	$order_deliveryMethod = $_POST['shipping_radio'];
	$referral_code = mysqli_real_escape_string($conn,$_POST['referral_code']);

    $total_price = 0;

    $sql123="SELECT COALESCE(MAX(order_groupID), 0) + 1 AS newGroupID FROM orders";
	$res=mysqli_query($conn,$sql123);
	$row123=mysqli_fetch_array($res);
	$groupID = $row123['newGroupID'];
        
	$sql="SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1";
	$result_set=mysqli_query($conn,$sql);
        
    if (!empty($row=mysqli_fetch_array($result_set))) {
        	
 	    if ($row['user_email'] == $user_email) {
 	   		
 	   		$userid = $row['userID'];

 	   		$preOrders_ins = "INSERT INTO pre_orders (preOrder_streetAddress, preOrder_suburb, preOrder_towncity, preOrder_zipcode, preOrder_province, preOrder_phone, preOrder_date, userID)
				VALUES ('$order_streetAddress', '$order_suburb', '$order_towncity', '$order_zipcode', '$order_province', '$user_phone', now(), '$userid')";
					mysqli_query($conn, $preOrders_ins);
					$preOrder_id = mysqli_insert_id($conn);

 	   		foreach ($_SESSION["shopping_cart"] as $product) {
	
							$product_id = $product['id'];
							$productSize_id = $product['size_id'];
							$order_size = $product['size'];
							$order_quantity = $product['quantity'];
							$product_title = $product['name'];
							$product_image = $product['image'];
							$product_price = $product['price'];
							$size_quantity = $product['size_quantity'];

							$total_price += ($product["price"]*$product["quantity"]);
							
 	   			$orders_ins = "INSERT INTO orders (order_productTitle, order_productImage, order_size, order_quantity, order_groupID, productID, preOrderID)
						VALUES ('$product_title', '$product_image', '$order_size', '$order_quantity', '$groupID', '$product_id', '$preOrder_id')";
					mysqli_query($conn, $orders_ins);
					echo mysqli_error($conn);

				if ($order_size == 'Fits All'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql0 = "UPDATE product_size SET product_quantity_oneSize='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql0);

				}if ($order_size == 'XS'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql9 = "UPDATE product_size SET product_quantity_XS='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql9);

				}if ($order_size == 'S'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql8 = "UPDATE product_size SET product_quantity_S='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql8);
				}if ($order_size == 'M'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql7 = "UPDATE product_size SET product_quantity_M='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql7);
			    		echo mysqli_error($conn);
				
				}if ($order_size == 'L'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql6 = "UPDATE product_size SET product_quantity_L='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql6);
				
				}if ($order_size == 'XL'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql5 = "UPDATE product_size SET product_quantity_XL='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql4);
				
				}if ($order_size == '2XL'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql3 = "UPDATE product_size SET product_quantity_2XL='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql3);
				
				}if ($order_size == '3XL'){
					$product_quantityLeft = $size_quantity - $order_quantity;
					$sql2 = "UPDATE product_size SET product_quantity_3XL='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    		mysqli_query($conn, $sql2);
				}

			}
					
			$order_totalPrice = $total_price + $order_deliveryMethod;
			$postOrders_ins = "INSERT INTO post_orders (postOrder_deliveryMethod, postOrder_totalPrice, postOrder_paymentStatus, postOrder_deliveryStatus, order_groupID, preOrderID, referral_code)
				VALUES ('$order_deliveryMethod','$order_totalPrice', 'Payment Pending', 'On The Way', '$groupID', '$preOrder_id', '$referral_code')";
			mysqli_query($conn, $postOrders_ins);
			echo mysqli_error($conn);

			if (isset($_POST['send'])) {

				$to = "$user_email";

				$subject = 'Plaudits SA - Order PLDTS#'.$preOrder_id.' Placed';

				foreach ($_SESSION["shopping_cart"] as $product){
	
						$product_id = $product['id'];
						$productSize_id = $product['size_id'];
						$order_size = $product['size'];
						$order_quantity = $product['quantity'];
						$product_title = $product['name'];
						$product_image = $product['image'];
						$product_price = $product['price'];
						$size_quantity = $product['size_quantity'];
						$total_price += ($product["price"]*$product["quantity"]);

					$message = ' 
						<p><h5>Order Details</h5></p><br>
						<br><p>Product: '.$product_title.'</p>
						<p>Size: '.$order_size.'</p>
						<p>Product: '.$product_price.'</p>
						<p>Quantity: '.$order_quantity.'</p>
						<p>Delivery: R'.$order_deliveryMethod.'</p><br><hr>
						<p>Subtotal: R'.$order_totalPrice.'</p><hr><br><br>
					';
					}
					$message .= '
					<p><h5>Delivery Details</h5></p>
					<p>'.$user_firstName.' '.$user_lastName.'</p>
					<p>'.$user_phone.'</p>
					<p>'.$order_streetAddress.'</p>
					<p>'.$order_suburb.'</p>
					<p>'.$order_towncity.'</p>
					<p>'.$order_province.'</p>
					<p>'.$order_zipcode.'</p>

					<p><a href="https://plauditssa.co.za/user-account/">View Order Here </a></p>
				';	


				$headers =  "From: info@plauditssa.co.za" ."\r\n".
						"Reply-To: plauditssa@gmail.com" ."\r\n".
						"CC: plauditssa@gmail.com" ."\r\n".
						"MIME-Version: 1.0" ."\r\n".
						"Content-type: text/html; charset=UTF-8" ."\r\n".
						"X-Mailer: PHP/".phpversion();	
				mail($to, $subject, $message, $headers);
		}

		unset($_SESSION["shopping_cart"]);

		echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/confirm-order/'.$preOrder_id.'">';

 	   	}
 	}else {
	
 	   	$user_ins = "INSERT INTO users (user_firstName, user_lastName, user_phone, user_email, user_streetAddress, user_suburb, user_towncity, user_zipcode, user_province)
			VALUES ('$user_firstName', '$user_lastName', '$user_phone', '$user_email', '$order_streetAddress', '$order_suburb', '$order_towncity', '$order_zipcode', '$order_province')"; 
		mysqli_query($conn, $user_ins);
		$userid = mysqli_insert_id($conn);

		$preOrders_ins = "INSERT INTO pre_orders (preOrder_streetAddress, preOrder_suburb, preOrder_towncity, preOrder_zipcode, preOrder_province, preOrder_phone, preOrder_date, userID)
			VALUES ('$order_streetAddress', '$order_suburb', '$order_towncity', '$order_zipcode', '$order_province', '$user_phone', now(), '$userid')";
		mysqli_query($conn, $preOrders_ins);
		$preOrder_id = mysqli_insert_id($conn);

		foreach ($_SESSION["shopping_cart"] as $product){
	
			$product_id = $product['id'];
			$productSize_id = $product['size_id'];
			$order_size = $product['size'];
			$order_quantity = $product['quantity'];
			$product_title = $product['name'];
			$product_image = $product['image'];
			$product_price = $product['price'];
			$size_quantity = $product['size_quantity'];
			$total_price += ($product["price"]*$product["quantity"]);
							
 	   		$orders_ins = "INSERT INTO orders (order_productTitle, order_productImage, order_size, order_quantity, order_groupID, productID, preOrderID)
					VALUES ('$product_title', '$product_image', '$order_size', '$order_quantity', '$groupID', '$product_id', '$preOrder_id')";
			mysqli_query($conn, $orders_ins);
			echo mysqli_error($conn);

			if ($order_size == 'Fits All'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql0 = "UPDATE product_size SET product_quantity_oneSize='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    mysqli_query($conn, $sql0);  		
			}
			if ($order_size == 'XS'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql9 = "UPDATE product_size SET product_quantity_XS='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    mysqli_query($conn, $sql9);

			}if ($order_size == 'S'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql8 = "UPDATE product_size SET product_quantity_S='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    mysqli_query($conn, $sql8);
			}if ($order_size == 'M'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql7 = "UPDATE product_size SET product_quantity_M='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			   	mysqli_query($conn, $sql7);
				
			}if ($order_size == 'L'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql6 = "UPDATE product_size SET product_quantity_L='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    mysqli_query($conn, $sql6);
				
			}if ($order_size == 'XL'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql5 = "UPDATE product_size SET product_quantity_XL='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			   	mysqli_query($conn, $sql4);
				
			}if ($order_size == '2XL'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql3 = "UPDATE product_size SET product_quantity_2XL='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			   	mysqli_query($conn, $sql3);
				
			}if ($order_size == '3XL'){
				$product_quantityLeft = $size_quantity - $order_quantity;
				$sql2 = "UPDATE product_size SET product_quantity_3XL='$product_quantityLeft' WHERE productSizeID = '$productSize_id'";
			    mysqli_query($conn, $sql2);
			}

		}
					
		$order_totalPrice = $total_price + $order_deliveryMethod;
		$postOrders_ins = "INSERT INTO post_orders (postOrder_deliveryMethod, postOrder_totalPrice, postOrder_paymentStatus, postOrder_deliveryStatus, order_groupID, preOrderID, referral_code)
			VALUES ('$order_deliveryMethod','$order_totalPrice', 'Payment Pending', 'On The Way', '$groupID', '$preOrder_id', '$referral_code')";
		mysqli_query($conn, $postOrders_ins);

		if (isset($_POST['send'])) {

				$to = "$user_email";

				$subject = 'Plaudits SA - Order PLDTS#'.$preOrder_id.' Placed';

				foreach ($_SESSION["shopping_cart"] as $product){
	
						$product_id = $product['id'];
						$productSize_id = $product['size_id'];
						$order_size = $product['size'];
						$order_quantity = $product['quantity'];
						$product_title = $product['name'];
						$product_image = $product['image'];
						$product_price = $product['price'];
						$size_quantity = $product['size_quantity'];
						$total_price += ($product["price"]*$product["quantity"]);

					$message = ' 
						<p><h5>Order Details</h5></p><br>
						<br><p>Product: '.$product_title.'</p>
						<p>Size: '.$order_size.'</p>
						<p>Product: '.$product_price.'</p>
						<p>Quantity: '.$order_quantity.'</p>
						<p>Delivery: R'.$order_deliveryMethod.'</p><br><hr>
						<p>Subtotal: R'.$order_totalPrice.'</p><hr><br><br>
					';
					}
					$message .= '
					<p><h5>Delivery Details</h5></p>
					<p>'.$user_firstName.' '.$user_lastName.'</p>
					<p>'.$user_phone.'</p>
					<p>'.$order_streetAddress.'</p>
					<p>'.$order_suburb.'</p>
					<p>'.$order_towncity.'</p>
					<p>'.$order_province.'</p>
					<p>'.$order_zipcode.'</p>

					<p><a href="https://plauditssa.co.za/user-account/">View Order Here </a></p>
				';	


				$headers =  "From: info@plauditssa.co.za" ."\r\n".
						"Reply-To: plauditssa@gmail.com" ."\r\n".
						"CC: plauditssa@gmail.com" ."\r\n".
						"MIME-Version: 1.0" ."\r\n".
						"Content-type: text/html; charset=UTF-8" ."\r\n".
						"X-Mailer: PHP/".phpversion();	
				mail($to, $subject, $message, $headers);
		}

		unset($_SESSION["shopping_cart"]);

		echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/confirm-order/'.$preOrder_id.'">';
 	}
 	    
 	echo mysqli_error($conn);

 ?>

