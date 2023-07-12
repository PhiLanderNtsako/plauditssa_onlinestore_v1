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
	<title>Plaudits SA - Checkout</title>
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

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Checkout</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="home/">Home</a></li>
							<li>Checkout</li>
						</ul>
					</div>
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

		<!-- Checkout -->
		<div class="checkout">
			<div class="container">
				<div class="row">
				<?php	
					if(isset($_SESSION["shopping_cart"])){
    					$total_price = 0;
				?>
					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title dropdown">View Cart Info <small><i>click</i></small>
								<?php		
									foreach ($_SESSION["shopping_cart"] as $product){
								?>
									<ul class="cart_extra_total_list dropdown-content">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title"><img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $product['image'] ?>"style="height: 40px" ></div>
											<div class="cart_extra_total_value ml-auto"><?php echo $product['name'] ?></div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Price</div>
											<div class="cart_extra_total_value ml-auto">R<?php echo $product['price'] ?></div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Size</div>
												<div class="cart_extra_total_value ml-auto"><?php echo $product['size'] ?></div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Quantity</div>
											<div class="cart_extra_total_value ml-auto"><?php echo $product['quantity'] ?> units</div>
										</li>
										
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Total Price</div>
											<div class="cart_extra_total_value ml-auto"><?php echo "R".$product["price"]*$product["quantity"]; ?></div>
										</li>
									</ul><br>
									<?php $total_price += ($product["price"]*$product["quantity"]); } 
									?><hr>
									<ul class="cart_extra_total_list">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">delivery is calulated at billing</div>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<div class="cart_extra_total_title">Subtotal</div>
											<div class="cart_extra_total_value ml-auto"><?php echo "R".$total_price; ?></div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php
						} 
				        if (isset($_SESSION['userID'])) {

					        $product_id = $product['id'];
							$user_id = $_SESSION['userID'];

					        $sql="SELECT * FROM products, users WHERE users.userID = '$user_id' AND products.productID = '$product_id'";
							$result_set=mysqli_query($conn,$sql);
					        $row=mysqli_fetch_array($result_set); 
				    ?>
					
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Contact Information</div><br><br>
							<div>
								<h3><?php echo $row['user_firstName']?> <?php echo $row['user_lastName']?></h3>
								(<?php echo $row['user_email']?>)
							</div><br>
							<a href="login/">Log Out</a>
							<div class="checkout_form_container">
								<form action="process/add_order.php" method="POST" id="checkout_form" class="checkout_form">
									<div>
										<!-- Hidden -->
										<input type="hidden" name="checkout_firstName" value="<?php echo $row['user_firstName']?>">
										<input type="hidden" name="checkout_lastName" value="<?php echo $row['user_firstName']?>">
										<input type="hidden" name="checkout_email" value="<?php echo $row["user_email"] ?>">
										<input type="hidden" name="subtot" value="<?php echo $product["price"]*$product["quantity"]; ?>">
										<input type="hidden" name="order_size" value="<?php echo $product['size']?>">
										<input type="hidden" name="product_id" value="<?php echo $product['id']  ?>">
										<input type="hidden" name="order_quantity" value="<?php echo $product['quantity']?>">
										<input type="hidden" name="product_title" value="<?php echo $row['product_title'] ?>">
										<input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>">
										<input type="hidden" name="size_quantity" value="<?php echo $product['size_quantity']?>">
										<input type="hidden" name="total_price" value="<?php echo $total_price?>">
									</div>
									<div class="checkout_extra">
										<ul>
											<li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_3" name="newsletter_checkbox" class="billing_checkbox" checked>
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Keep me up to date on news and exclusive offers</span>
												</label>
											</li>
										</ul>
									</div>
									<div class="checkout_title">Delivery Address</div>
									<div>
										<!-- Address -->
										<input type="text" name="checkout_streetAddress" id="checkout_address" class="checkout_input" placeholder="Street name & Number" value="<?php echo $row['user_streetAddress']?>" required>
										<input type="text" name="checkout_suburb" id="checkout_address_2" class="checkout_input checkout_address_2" placeholder="Suburb" value="<?php echo $row['user_suburb']?>" required>
										<input type="text" name="checkout_towncity" id="checkout_address_2" class="checkout_input checkout_address_2" placeholder="Town or City" value="<?php echo $row['user_towncity']?>" required> 
									</div>
									<div>
										<!-- Province -->
										<select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" required>
											<option value="<?php echo $row['user_province']?>"><?php echo $row['user_province']?></option>
											<option value="Eastern Cape">Eastern Cape</option>
											<option value="Free State">Free State</option>
											<option value="Gauteng">Gauteng</option>
											<option value="KwaZulu Natal">KwaZulu Natal</option>
											<option value="Limpopo">Limpopo</option>
											<option value="Mpumalanga">Mpumalanga</option>
											<option value="North West">North West</option>
											<option value="Northern Cape">Northern Cape</option>
											<option value="Western Cape">Western Cape</option>
										</select>
									</div>
									<div>
										<!-- Zipcode -->
										<input type="text" name="checkout_zipcode" id="checkout_zipcode" class="checkout_input" placeholder="Postal Code" value="<?php echo $row['user_zipcode']?>" pattern="[0-9]{4}" required>
									</div>
									<div>
										<!-- Phone no -->
										<input type="tel" name="checkout_phone" id="checkout_phone" class="checkout_input" placeholder="Phone No." value="<?php echo $row['user_phone']?>" pattern="[0-9]{10}" required>
									</div>
									<div class="shipping">
										<div class="checkout_title">Delivery Method</div><br>
										<ul>
											<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
												<label class="radio_container">
													<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio" value="100" hidden checked>
													<span class="radio_mark"></span>
													<span class="radio_text">Door to Door Courier - 3 &mdash; 5 Days </span>
												</label>
												<div class="shipping_price ml-auto">R100.00</div>
											</li>
											<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
												<label class="radio_container">
													<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio" value="60" hidden>
													<span class="radio_mark"></span>
													<span class="radio_text">Collect at Pep Store - 5 &mdash; 9 Days</span>
												</label>
												<div class="shipping_price ml-auto">R60.00 </div>
											</li>
											<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
												<label class="radio_container">
													<input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" value="0" hidden>
													<span class="radio_mark"></span>
													<span class="radio_text">Personal Pickup</span>
												</label>
												<div class="shipping_price ml-auto">Free</div>
											</li>
										</ul>
									</div>
									<div>
										<!-- Referral -->
										<input type="text" name="referral_code" id="checkout_zipcode" class="checkout_input" placeholder="Referral Code (optional)">
									</div>
									<div class="checkout_extra">
										<div>
											<button type="submit" name="send" class="checkout_button trans_200" style="color: white">
												<h4><strong> P L A C E   .  O R D E R </strong></h4>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php 
						}else {
					?>
					<!-- Billing -->
					<div class="col-lg-6">
						<div class="billing">
							<div class="checkout_title">Contact Information</div>
							<div class="checkout_form_container">
								<form action="process/add_order.php" method="POST" id="checkout_form" class="checkout_form">
									<div>
										<!-- Hidden -->
										<input type="hidden" name="checkout_email" value="<?php echo $row["user_email"] ?>">
										<input type="hidden" name="subtot" value="<?php echo $product["price"]*$product["quantity"]; ?>">
										<input type="hidden" name="order_size" value="<?php echo $product['size']?>">
										<input type="hidden" name="product_id" value="<?php echo $product['id']  ?>">
										<input type="hidden" name="order_quantity" value="<?php echo $product['quantity']?>">
										<input type="hidden" name="product_title" value="<?php echo $row['product_title'] ?>">
										<input type="hidden" name="product_price" value="<?php echo $row['product_price'] ?>">
										<input type="hidden" name="size_quantity" value="<?php echo $product['size_quantity']?>">
										<input type="hidden" name="total_price" value="<?php echo $total_price?>">
										
									</div>
									<div>
										<!-- Email -->
										<input type="email" name="checkout_email" id="checkout_email" placeholder="Email" class="checkout_input" pattern="[A-z0-9.]+@[A-z]+\.[A-z.]+" required>
										<small>Already Have an Account? </small> <a href="login/">Log In</a>
									</div>
									<div class="checkout_extra">
										<ul>
											<li class="billing_info d-flex flex-row align-items-center justify-content-start">
												<label class="checkbox_container">
													<input type="checkbox" id="cb_3" name="newsletter_checkbox" class="billing_checkbox" checked>
													<span class="checkbox_mark"></span>
													<span class="checkbox_text">Keep me up to date on news and exclusive offers</span>
												</label>
											</li>
										</ul>
									</div>
									<div class="checkout_title">Delivery Address</div>
									<div class="row">
										<div class="col-lg-6">
											<!-- Name -->
											<input type="text" name="checkout_firstName" id="checkout_name" class="checkout_input" placeholder="First Name" required>
										</div>
										<div class="col-lg-6">
											<!-- Last Name -->
											<input type="text" name="checkout_lastName" id="checkout_last_name" class="checkout_input" placeholder="Last Name" required>
										</div>
									</div>
									<div>
										<!-- Company -->
										<input type="text" name="checkout_company" id="checkout_company" placeholder="Company (optional)" class="checkout_input">
									</div>
									<div>
										<!-- Address -->
										<input type="text" name="checkout_streetAddress" id="checkout_address" class="checkout_input" placeholder="Street name & Number" required>
										<input type="text" name="checkout_suburb" id="checkout_address_2" class="checkout_input checkout_address_2" placeholder="Suburb" required>
										<input type="text" name="checkout_towncity" id="checkout_address_2" class="checkout_input checkout_address_2" placeholder="Town or City" required>
									</div>
									<div>
										<!-- Province -->
										<select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" required>
											<option value="">Select Province</option>
											<option value="Eastern Cape">Eastern Cape</option>
											<option value="Free State">Free State</option>
											<option value="Gauteng">Gauteng</option>
											<option value="KwaZulu Natal">KwaZulu Natal</option>
											<option value="Limpopo">Limpopo</option>
											<option value="Mpumalanga">Mpumalanga</option>
											<option value="North West">North West</option>
											<option value="Northern Cape">Northern Cape</option>
											<option value="Western Cape">Western Cape</option>
										</select>
									</div>
									<div>
										<!-- Zipcode -->
										<input type="text" name="checkout_zipcode" id="checkout_zipcode" class="checkout_input" placeholder="Postal Code" pattern="[0-9]{4}" required>
									</div>
									<div>
										<!-- Phone no -->
										<input type="tel" name="checkout_phone" id="checkout_phone" class="checkout_input" placeholder="Phone No." pattern="[0-9]{10}" required>
									</div>
									<div class="shipping">
										<div class="checkout_title">Delivery Method</div><br>
										<ul>
											<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
												<label class="radio_container">
													<input type="radio" id="radio_1" name="shipping_radio" class="shipping_radio" value="100" hidden checked>
													<span class="radio_mark"></span>
													<span class="radio_text">Door to Door Courier - 3 &mdash; 5 Days </span>
												</label>
												<div class="shipping_price ml-auto">R100.00</div>
											</li>
											<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
												<label class="radio_container">
													<input type="radio" id="radio_2" name="shipping_radio" class="shipping_radio" value="60" hidden>
													<span class="radio_mark"></span>
													<span class="radio_text">Collect at Pep Store - 5 &mdash; 9 Days</span>
												</label>
												<div class="shipping_price ml-auto">R60.00 </div>
											</li>
											<li class="shipping_option d-flex flex-row align-items-center justify-content-start">
												<label class="radio_container">
													<input type="radio" id="radio_3" name="shipping_radio" class="shipping_radio" value="0" hidden>
													<span class="radio_mark"></span>
													<span class="radio_text">Personal Pickup</span>
												</label>
												<div class="shipping_price ml-auto">Free</div>
											</li>
										</ul>
									</div>
									<div>
										<!-- Referral -->
										<input type="text" name="referral_code" id="checkout_zipcode" class="checkout_input" placeholder="Referral Code (optional)">
									</div>
									<div class="checkout_extra">
										<div>
											<button type="submit" name="send" class="checkout_button trans_200" style="color: white">
												<h4><strong> P L A C E   .  O R D E R </strong></h4>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php 
						}
					?>
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