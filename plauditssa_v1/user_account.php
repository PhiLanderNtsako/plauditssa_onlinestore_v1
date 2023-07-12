<?php
    session_start();
    $_SESSION['rdurl'] = $_SERVER['REQUEST_URI'];
    $session_timeout = 9000;

    if (!isset($_SESSION['last_visit'])) {
    	$_SESSION['last_visit'] = time();
	} 	
	if ((time() - $_SESSION['last_visit']) > $session_timeout) {
	    unset($_SESSION['userID']);

	    if (isset($_SESSION['rdurl'])) {
	        echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/'.$_SESSION['rdurl'].'/">';
	        exit;
	    }
	}

    $_SESSION['last_visit'] = time();

    if(!isset($_SESSION['userID'])) {

      echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/login/">';
    }

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
	<title>Plaudits SA - User Account</title>
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
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>
<body>

<!-- Menu -->
<div class="menu"  style="background-image: url(images/plaudits/model5.jpg);">

	<!-- Search -->
	<div class="menu_search">
		<form action="search/" method="get" id="menu_search_form" class="menu_search_form">
			<input type="text" name="search" class="search_input" placeholder="Search Item" required>
			<button type="submit" name="submit-search" class="menu_search_button"><img src="images/search.png" alt=""></button>
		</form>
	</div>

	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li><a href="home/">Home</a></li>
			<li><a href="t-shirts/">T-Shirts</a></li>
			<li><a href="hoodies/">Hoodies</a></li>
			<li><a href="headwear/">Headwear</a></li>
			<li><a href="long-sleeves/">Long Sleeves</a></li>
			<li><a href="kids-collection/">Kids Collection</a></li>
			<li><a href="winter-collection/">Winter Collection</a></li>
			<li><a href="pride-merch/">Pride Merch</a></li>
			<li class="active"><a href="apparel/">Apparel</a></li>
		</ul>
	</div>

	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><a href="tel:+27849706769"><img src="images/phone.svg" alt=""></a></div></div>
			<div ><a href="tel:+27849706769" style="color: mediumseagreen">+27 84 970 6769</a></div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="https://facebook.com/Plaudits.SA/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/plaudits_sa/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/Plaudits_SA" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://wa.me/27849706769" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->
	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="home/">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/plaudits/logo3.png" alt=""></div>
						<div>Plaudits SA</div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="home/">Home</a></li>
					<li><a href="t-shirts/">T-Shirts</a></li>
					<li><a href="hoodies/">Hoodies</a></li>
					<li><a href="headwear/">Headwear</a></li>
					<li><a href="long-sleeves/">Long Sleeves</a></li>
					<li><a href="kids-collection/">Kids Collection</a></li>
					<li><a href="winter-collection/">Winter Collection</a></li>
					<li><a href="pride-merch/">Pride Merch</a></li>
					<li class="active"><a href="apparel/">Apparel</a></li>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">

				<!-- Search -->
				<div class="header_search">
					<form action="search/" method="get" id="header_search_form">
						<input type="text" name="search" class="search_input" placeholder="Search Item" required>
						<button type="submit" name="submit-search" class="header_search_button"><img src="images/search.png" alt=""></button>
					</form>
				</div>
				<?php
					if(!empty($_SESSION["shopping_cart"])) {
					$cart_count = count(array_keys($_SESSION["shopping_cart"]));
				?>

				<!-- Cart -->
				<div class="user">
					<a href="cart/"><div><img src="images/cart.svg" alt=""><div><?php echo $cart_count; ?></div></div></a>
				</div>
				<?php
					}else {
				?>

				<!-- Cart -->
				<div class="user">
					<a href="cart/"><div><img src="images/cart.svg" alt=""></div></a>
				</div>
				<?php
					}
				?>

				<!-- User -->
				<div class="cart"><a href="user-account/"><div><img class="svg" src="images/user.svg" alt=""></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><a href="tel:+27849706769"><img src="images/phone.svg" alt=""></a></div></div>
					<div><a href="tel:+27849706769" style="color: mediumseagreen">+27 84 970 6769</a></div>
				</div>
			</div>
		</div>
	</header>
	<?php
		$id = $_SESSION['userID'];

        $sql2="SELECT * FROM users WHERE users.userID = '$id'";
        $result_set2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($result_set2) 
    ?>
	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Welcome <?php echo $row2['user_firstName'] ?></i></div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="home/">Home</a></li>
							<li>Your Account</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Cart -->
		<div class="cart_section">
			<div class="container">
				<div class="row cart_extra_row">
					<div class="col-lg-6">
						<div class="cart_extra cart_extra_1">
							<div class="cart_extra_content cart_extra_coupon">
								<div class="cart_extra_title">
									<?php echo $row2['user_firstName']?> <?php echo $row2['user_lastName']?>
								</div>
								<div class="coupon_text">
									<?php echo $row2['user_email']?><br>
									<?php echo $row2['user_phone']?><br>
								</div>
								<div class="coupon_text">
									<?php echo $row2['user_streetAddress']?><br>
									<?php echo $row2['user_suburb']?><br>
									<?php echo $row2['user_towncity']?>, 
									<?php echo $row2['user_province']?>, 
									<?php echo $row2['user_zipcode']?>
								</div>
								<div class="checkout_button trans_200"><a href="process/user_logout.php">Log Out</a></div>
							</div>
						</div>
					</div>
				</div><br><br>

				<div class="cart_extra_title">Your Orders</div>				
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto"></li>
									<li>Order ID</li>
									<li>Delivery Address</li>
									<li>Delivery Method</li>
									<li>Delivery Status</li>
									<li>Total Payment</li>
									<li>Payment Status</li>
									<li>Track Order</li>
								</ul>
							</div>

							<!-- Cart Items -->
							<?php
							    $id = $_SESSION['userID'];

							    $sql="SELECT * FROM users, pre_orders, post_orders WHERE users.userID = '$id' AND pre_orders.userID = users.userID AND post_orders.preOrderID = pre_orders.preOrderID ORDER BY pre_orders.preOrderID DESC";
							    $result_set=mysqli_query($conn,$sql);

							    while ($row=mysqli_fetch_array($result_set)) 
							    { 
							?>
							<div class="cart_items">
								<ul class="cart_items_list">
									<!-- Cart Item -->
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div class="product_name_container">
												<div class="product_name">
													<div class="button button_continue trans_200" ><a href="https://plauditssa.co.za/order_details.php?id=<?php echo $row['preOrderID'] ?>">Order Details</a></div>
												</div>
											</div>
											<div><div class="product_number"><small><?php echo $row['preOrder_date'] ?></small></div></div>
										</div>
										<div class="product_color product_text">
											<span>Order ID: </span>PLDTS#<?php echo $row['preOrderID'] ?>
										</div>
										<div class="product_size product_text">
											<span>Delivery Address: </span><?php echo $row['preOrder_suburb'] ?>, <?php echo $row['preOrder_towncity'] ?>, <?php echo $row['preOrder_province'] ?>, <?php echo $row['preOrder_zipcode'] ?>
										</div>
										<div class="product_price product_text">
											<?php
												if($row['postOrder_deliveryMethod'] == '50.00')
	                                        		{
	                                        			echo '<span>Delivery Method: </span>
	                                        			PepStore (PAXI): R50.00
	                                        					';
	                                                }elseif ($row['postOrder_deliveryMethod'] == '100.00') {
	                                                	echo '<span>Delivery Method: </span> Aramex: R100.00
	                                        					';
	                                                }elseif ($row['postOrder_deliveryMethod'] == '0') {
	                                                	echo '<span>Delivery Method: </span> Personal: R0.00
	                                        					';
	                                                } 
											?>
											
										</div>
										<div class="product_total product_text">
											<?php 
												if($row['postOrder_paymentStatus'] == 'Paid')
	                                        		{
	                                        			if ($row['postOrder_deliveryMethod'] == '0') {
	                                        				echo "Personal PickUp";
	                                        			}else{
	                                        			echo '<span>Delivery Status: </span> '.$row['postOrder_deliveryStatus'].'';
	                                        		}
	                                                }else{
	                                                	echo '<span>Delivery Status: </span> Payment Pending';
	                                                }
											?>
										</div>
										<div class="product_total product_text">
											<span>Total Price: </span>R<?php echo $row['postOrder_totalPrice'] ?>
										</div>
										<div class="product_total product_text">
											<?php
												if($row['postOrder_paymentStatus'] == 'Payment Pending')
	                                        		{
	                                        			echo '
	                                        				<span>Pay Here: </span>
	                                        				<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
																<div class="button button_continue trans_200"><a href="https://plauditssa.co.za/confirm-order/'.$row['preOrderID'].'">pay</a></div>
															</div>';
	                                                }else
	                                                {
	                                                	echo '<span>Payment Staus: </span> "'.$row['postOrder_paymentStatus'].'"';
	                                                }
											?>
										</div>
										<div class="product_total product_text">
											<?php
												if($row['postOrder_deliveryMethod'] == '60.00')
	                                        		{
	                                        			echo '
	                                        				<span>Trak Order: </span> 
	                                        				<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
																<div class="button button_continue trans_200">
																	<a href="https://paxi.co.za">paxi
																	</a>
																</div>
															</div>
	                                        					';
	                                                }elseif ($row['postOrder_deliveryMethod'] == '100.00') {
	                                                	echo '<span>Trak Order: </span> 
	                                        				<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
																<div class="button button_continue trans_200">
																	<a href="https://aramex.co.za">aramex</a>
																</div>
															</div>
	                                        					';
	                                                }elseif ($row['postOrder_deliveryMethod'] == '0') {
	                                                	echo '<span>Delivery Method: </span> Personal Pick Up
	                                        					';
	                                                } 
											?>
										</div>
									</li>
								</ul>
							</div>
							<?php 
								} 
							?>			
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			include 'includes/footer.php';
		?>		

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
	<script src="js/cart.js"></script>
</body>
</html>