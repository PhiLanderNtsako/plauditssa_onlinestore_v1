<?php
    session_start();

    $_SESSION['rdurl'] = $_SERVER['REQUEST_URI'];

    include "includes/dbConfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168153445-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
		gtag('config', 'UA-168153445-1');
	</script>
	<title>Plaudits SA - Checkout Confirmation | Payment</title>
	<base href="https://plauditssa.co.za/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Plaudits SA it's a clothing brand which expresses enthusiasms and it let's everyone to know that it's important to reach out to opportunities. The name was derived from the word 'Applause'.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/checkout.css">
	<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<!-- Menu -->
<div class="menu"  style="background-image: url(images/plaudits/model5.jpg);"></div>

	<div class="super_container">

	<!-- Header -->
	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="home/">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/plaudits/logo3.png" alt=""></div>
						<div>Plaudits SA</div>
					</div>
				</a>	
			</div>
		</div>
	</header>

	<?php
        $preOrder_id = $_GET['id'];

        $sql="SELECT * FROM pre_orders, orders, users WHERE orders.preOrderID = pre_orders.preOrderID AND pre_orders.userID = users.userID AND pre_orders.preOrderID = '$preOrder_id'";
        $result_set=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result_set);
        $order_size = $row['order_size'];
    ?>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Confirmation</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="home/">Home</a></li>
							<li>Confirmation</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Checkout -->
		<div class="checkout">
			<div class="container">
				<div class="row">

					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Billing Details</div>
							<div class="checkout_form_container">
								<form action="" method="post" id="checkout_form" class="checkout_form">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title"><?php echo $row['user_firstName'] ?> <?php echo $row['user_lastName'] ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title"><?php echo $row['preOrder_streetAddress'] ?>, <?php echo $row['preOrder_suburb'] ?>
										</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title"><?php echo $row['preOrder_towncity'] ?>, <?php echo $row['preOrder_zipcode'] ?>	
										</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title"><?php echo $row['user_province'] ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title"><?php echo $row['preOrder_phone'] ?></div>
									</li><br><br><br>
									<div class="coupon_text">Our Online Payment System is Fast, Secure and Reliable. Powered by PayFast.</div>
								</form>
							</div>
						</div>
					</div>
<style>
	.dropdown {
		cursor: pointer;
	}
	.dropdown-content {
		display: none;
	}
	.dropdown:hover .dropdown-content {
		display: block;
	}
</style>
					<?php
				        $preOrder_id = $_GET['id'];

				        $sql="SELECT * FROM pre_orders INNER JOIN orders ON orders.preOrderID = pre_orders.preOrderID INNER JOIN products ON orders.productID = products.productID WHERE orders.preOrderID = '$preOrder_id'";
				        $result_set=mysqli_query($conn,$sql);		    		
					?>
					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title dropdown">View Cart Info <small><i>click</i></small>
									<?php 
									$total_price = 0; 
									while($row=mysqli_fetch_array($result_set)) {
	    								
	    					?>
								<ul class="cart_extra_total_list dropdown-content">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">
											<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>"style="height: 40px" >
										</div>
										<div class="cart_extra_total_value ml-auto"><?php echo $row['product_title'] ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Price</div>
										<div class="cart_extra_total_value ml-auto">R<?php echo $row['product_price'] ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Size</div>
										<div class="cart_extra_total_value ml-auto"><?php echo $row['order_size'] ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Quantity</div>
										<div class="cart_extra_total_value ml-auto"><?php echo $row['order_quantity'] ?> units</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total Price</div>
										<div class="cart_extra_total_value ml-auto"><?php echo "R". $subtotal = $row["product_price"]*$row["order_quantity"]; ?></div>
									</li>
								</ul><br>
								<?php 
									$total_price += $subtotal; } 

									$preOrder_id = $_GET['id'];

							        $sql="SELECT * FROM pre_orders INNER JOIN post_orders ON post_orders.preOrderID = pre_orders.preOrderID WHERE post_orders.preOrderID = '$preOrder_id'";
							        $result_set=mysqli_query($conn,$sql);
							        $row2=mysqli_fetch_array($result_set);	
								?><hr>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto">R<?php echo $total_price ?>.00</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Delivery
											<small>
											<?php 
												if ($row2['postOrder_deliveryMethod'] == '60') {
													echo 'Pep Store (PAXI)';
												}elseif ($row2['postOrder_deliveryMethod'] == '100') {
													echo 'Aramex';
												}elseif ($row2['postOrder_deliveryMethod'] == '0') {
													echo 'Personal PickUp';
												}
											?>
											</small>
										</div>
										<div class="cart_extra_total_value ml-auto">R<?php echo $row2['postOrder_deliveryMethod'] ?>.00</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto">R<?php echo $row2['postOrder_totalPrice'] ?></div>
									</li>
								</ul>
								<div class="checkout_extra">
									<div>
										<!--https://www.payfast.co.za/eng/process" name="form_d564d0e0a28fc325048552bd062c27b1-->
										<form action="payment_success.php" onsubmit="return click_d564d0e0a28fc325048552bd062c27b1( this );" method="post">
                                            <input type="hidden" name="cmd" value="_paynow">
                                            <input type="hidden" name="receiver" value="13583702">
                                            <input type="hidden" name="item_name" value="<?php echo $product['name'] ?>">
                                            <input type="hidden" name="amount" value="<?php echo $row['postOrder_totalPrice'] ?>">
                                            <input type="hidden" name="item_description" value="Order ID: PLDTS#<?php echo $row['preOrderID'] ?>">
                                            <input type="hidden" name="return_url" value="https://plauditssa.co.za/payment-success/">
                                            <input type="hidden" name="cancel_url" value="https://plauditssa.co.za/payment-cancel/">	
											<button type="submit" name="send" class="checkout_button trans_200" style="color: white">
												<h4><strong> CONTINUE TO PAYMENT </strong></h4>
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include 'includes/footer.php';
	?>
</div>
</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap-4.1.2/popper.js"></script>
	<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/checkout.js"></script>
</body>
</html>