<?php
    session_start();
    include "includes/dbConfig.php";

	$status = " ";

	if (isset($_POST['action']) && $_POST['action']=="remove") {

		if(!empty($_SESSION["shopping_cart"])) {

			foreach($_SESSION["shopping_cart"] as $key => $value) {

				if($_POST["code"] == $key) {

					unset($_SESSION["shopping_cart"][$key]);
					$status = "<div class='box' style='color:red;'>
					Product is removed from your cart!</div>";
				}
				
				if(empty($_SESSION["shopping_cart"]))

					unset($_SESSION["shopping_cart"]);
			}		
		}
	}
	
	if (isset($_POST['action']) && $_POST['action']=="change") {

	    foreach($_SESSION["shopping_cart"] as &$value) {

		    if($value['code'] === $_POST["code"]) {

		        $value['quantity'] = $_POST["quantity"];
		        break; // Stop the loop after we've found the product
		    }
		} 	
	}
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
	<title>Plaudits SA - Cart</title>
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
<div class="menu"  style="background-image: url(images/plaudits/models/model8.jpg);">

	<!-- Search -->
	<div class="menu_search">
		<form action="search/" method="get" id="menu_search_form" class="menu_search_form">
			<input type="text" name="search" class="search_input" placeholder="Search Item" required="required" >
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
			<li><a href="apparel/">Apparel</a></li>
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
					<li><a href="apparel/">Apparel</a></li>
				</ul>
			</nav>
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="search/" method="get" id="header_search_form">
						<input type="text" name="search" class="search_input" placeholder="Search Item" required="required" >
						<button type="submit" name="submit-search" class="header_search_button"><img src="images/search.png" alt=""></button>
					</form>
				</div>
				<?php
					if(!empty($_SESSION["shopping_cart"])) {
					$cart_count = count(array_keys($_SESSION["shopping_cart"]));
				?>
				<!-- Cart -->
				<div class="user"><a href="cart/"><div><img src="images/cart.svg" alt=""><div><?php echo $cart_count; ?></div></div></a></div>
				<?php
					}else {
						echo '
				<!-- Cart -->
				<div class="user"><a href="cart/"><div><img src="images/cart.svg" alt=""></div></a></div>';
					}
				?>
				<!-- User -->
				<div class="cart"><a href="user-account/"><div><img class="svg" src="images/user.svg" alt=""></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><a href="tel:+27849706769"><img src="images/phone.svg" alt=""></a></div>
					</div><div ><a href="tel:+27849706769" style="color: mediumseagreen">+27 84 970 6769</a></div>
				</div>
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>
		<?php	
			if(isset($_SESSION["shopping_cart"])) {

    			$total_price = 0;
		?>
		<!-- Home -->
		<div class="home" style="background-image: url();">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Your Cart</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="home/">Home</a></li>
							<li>Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Cart -->
		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">

							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Product</li>
									<li>Size</li>
									<li>Price</li>
									<li>Quantity</li>
									<li>Update</li>
									<li>Delete</li>
								</ul>
							</div>
							<?php		
								foreach ($_SESSION["shopping_cart"] as $product) {
							?>
							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">
									<!-- Cart Item -->
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div><div class="product_image">
												<img src='https://admin.plauditssa.co.za/uploads/product_images/<?php echo $product["image"]; ?>' alt="">
											</div></div>
											<div class="product_name_container">
												<div class="product_name">
													<a href="product.html"><?php echo $product["name"] ?></a>
												</div>
											</div>
										</div>
										<div class="product_size product_text"><span>Size: </span><?php echo $product["size"]; ?></div>
										<div class="product_price product_text"><span>Price: </span>R<?php echo $product["price"]; ?></div>
										<div class="product_size product_text"><span>Quantity: </span><?php echo $product["quantity"]; ?> Units</div>
										<div class="product_size product_text"><span>Change Quantity: </span>
											<form method='post' action=''>
												<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
												<input type='hidden' name='action' value="change" />
												<select name='quantity' style="padding-top: 20px; padding-right:15px; border-width: thin; border-color: mediumseagreen" onchange="this.form.submit()">
													<option <?php if($product["quantity"]==1) echo "selected";?> value="1"><h1>1</h1></option>
													<?php 
														if ($product["size_quantity"] > 1) {	
													?>
													<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
													<?php 
														}
														if ($product["size_quantity"] > 2) {	
													?>
													<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
													<?php 
														}
														if ($product["size_quantity"] > 3) {	
													?>
													<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
													<?php 
														}
														if ($product["size_quantity"] > 4) {	
													?>
													<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
													<?php
														}
														if ($product["size_quantity"] > 5) {	
													?>
													<option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
													<?php 
														}
														if ($product["size_quantity"] > 6) {	
													?>
													<option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
													<?php 
														}
														if ($product["size_quantity"] > 7) {	
													?>
													<option <?php if($product["quantity"]==8) echo "selected";?> value="8">8</option>
													<?php 
														}
														if ($product["size_quantity"] > 8) {	
													?>
													<option <?php if($product["quantity"]==9) echo "selected";?> value="9">9</option>
													<?php 
														}
														if ($product["size_quantity"] > 9) {	
													?>
													<option <?php if($product["quantity"]==10) echo "selected";?> value="10">10</option>
													<?php 
														}
													?>
												</select>
											</form>
										</div>
										<div class="product_total product_text">
											<form method='post' action=''>
												<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
												<input type='hidden' name='action' value="remove" />
												<button type="submit" name="send" class="checkout_button trans_200" style="color: white; margin-top: 10px;">
													<h4><strong>Delete </strong></h4>
												</button>
											</form>
										</div>
									</li>
								</ul>
							</div>
							<?php
								$total_price += ($product["price"]*$product["quantity"]);
								}
							?> 
							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_clear trans_200"><a href="clear_cart.php">Clear Cart</a></div>
									<div class="button button_continue trans_200"><a href="home/">Continue Shopping</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 cart_extra_col">
					<div class="cart_extra cart_extra_1">
						<div class="cart_extra_content cart_extra_total">
							<div class="cart_extra_title">Cart Total</div>
							<ul class="cart_extra_total_list">
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_extra_total_title">Subtotal </div>
									<div class="cart_extra_total_value ml-auto"> <?php echo "R".$total_price; ?>.00</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_extra_total_title">Delivery calculated at billing</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_extra_total_title">Total </div>
									<div class="cart_extra_total_value ml-auto"> <?php echo "R".$total_price; ?>.00</div>
								</li>
							</ul>
							<div class="checkout_button trans_200"><a href="checkout/product/">checkout</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			} else { 
		?>			
			<div class="super_container_inner">
				<div class="super_overlay"></div>
				<!-- Home -->
				<div class="home" style="background-image: url();">
					<div class="home_container d-flex flex-column align-items-center justify-content-end">
						<div class="home_content text-center">
							<div class="home_title">Your Cart Is Empty</div>
							<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
								<ul class="d-flex flex-row align-items-start justify-content-start text-center">
									<li><a href="home/">Continue Shoping Here</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php	
			}
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
<script src="js/cart.js"></script>
</body>
</html>