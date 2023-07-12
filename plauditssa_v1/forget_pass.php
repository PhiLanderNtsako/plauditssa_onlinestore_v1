<?php
	session_start();

    include 'includes/dbConfig.php';
    
    $errors = array();

  	if (isset($_POST['send'])) 
  	{
    $user_phone = $_POST['phone'];
    $user_email = mysqli_real_escape_string($conn,$_POST['email']);
    $old_password = mysqli_real_escape_string($conn,$_POST['old_password']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
	$password2 = mysqli_real_escape_string($conn,$_POST['password2']);

		if ($password != $password2) 
		{
			array_push($errors, " Passwords do not match.");
		}
		    
    		$user_check_query = "SELECT * FROM users WHERE user_email ='$user_email' OR user_phone = '$user_phone' LIMIT 1";
    	    $result = mysqli_query($conn, $user_check_query);
    	    $user = mysqli_fetch_assoc($result);

                	if ($user['user_email'] != $user_email) 
                	{
                		array_push($errors, " Email Does Not Match Our Records.");
                	}
                	if ($user['user_phone'] != $user_phone) 
                	{
                		array_push($errors, " Email Does Not Match Our Records.");
                	}


        if (count($errors) == 0) 
        {
        	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
        	$query = "UPDATE users SET user_password = '$hashPassword' WHERE user_email = '$user_email'";
        	mysqli_query($conn, $query);
			mysqli_close($conn);		
        	
			echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/login/">';
			exit;	
        }

		}


  
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Plaudits SA - Password Change</title>
<base href="https://plauditssa.co.za/">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Login to track orders and deliveries. Plaudits SA - Ambition To Infinity">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/user_login.css">
	<link rel="stylesheet" type="text/css" href="styles/user_login_responsive.css">
</head>
<body>

<!-- Menu -->
<div class="menu"  style="background-image: url(images/plaudits/model13.jpg);">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="images/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li class="active"><a href="home/">Home</a></li>
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
					<li class="active"><a href="home/">Home</a></li>
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
					<form action="#" id="header_search_form">
						<input type="text" class="search_input" placeholder="Search Item" required="required">
						<button class="header_search_button"><img src="images/search.png" alt=""></button>
					</form>
				</div>
				<!-- User -->
				<div class="user">
					<a href="user-account/"><div><img src="images/user.svg" alt=""></div></a> 
				</div>
				<!-- Cart -->
				<div class="cart"><a href="#"><div><img class="svg" src="images/cart.svg" alt=""></div></a></div>
				<!-- Phone -->
				<div class="header_phone d-flex flex-row align-items-center justify-content-start">
					<div><div><a href="tel:+27849706769"><img src="images/phone.svg" alt=""></a></div></div>
					<div ><a href="tel:+27849706769" style="color: mediumseagreen">+27 84 970 6769</a></div>
				</div>
			</div>
		</div>
	</header>

	<div class="super_container_inner">
		<div class="super_overlay"></div>
		<!-- Checkout -->
		<div class="checkout">
			<div class="container">
				<div class="row">

					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title">Change Password</div>
								<?php if (count($errors) > 0) : ?>
							 		<?php foreach ($errors as $error) : ?>
							 			<small style="color: red"><?php echo $error ?></small>
							 		<?php endforeach ?>
							 	<?php endif ?>
								<div class="checkout_form_container">
									<form action="" method="post" id="checkout_form" class="checkout_form" autocomplete="new-password">
										<div>
											<!-- Email -->
											<input type="email" name="email" id="email" class="checkout_input" placeholder="Email" required="required" pattern="[A-z0-9.]+@[A-z]+\.[A-z]{3,}" autocomplete="new-password">
										</div>
										<div>
											<!-- Old Password -->
											<input type="password" name="old_password" id="old_password" class="checkout_input" placeholder=" Old Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password">
										</div>
										<div>
											<!-- New Password -->
											<input type="password" name="password" id="password" class="checkout_input" placeholder=" New Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
										</div>
										<small style="color: red">Must contain at least one number, one uppercase and special character, and at least 8 or more characters</small>
										<div>
											<!-- Password -->
											<input type="password" name="password2" id="password2" class="checkout_input" placeholder="Confirm New Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
										</div>
										<div class="checkout_extra">
											<div class="breadcrumbs d-flex flex-column align-items-left justify-content-left">
												<ul class="d-flex flex-row align-items-start justify-content-start text-center">
													<li><a href="login/">Login Instead</a></li>
												</ul>
											</div>
											<div>
												<button type="submit" name="send" class="checkout_button trans_200" style="color: white">
													<h4><strong> S U B M I T </strong></h4>
												</button>
											</div>
										</div>
										<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
											<ul class="d-flex flex-row align-items-start justify-content-start text-center">
												<li><small>New To Plaudits SA? </small><a href="register/"><strong> Create Account</strong></a></li>
											</ul>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Cart Total -->
					<div class="col-lg-6 cart_col">
						<div class="cart_total">
							<div class="cart_extra_content cart_extra_total">
								<div class="checkout_title">Features</div>
								<div class="cart_text">
									<p>Login into your account profile so that you can be able to...</p>
									<p>Track Orders</p>
									<p>Make payments on orders that you haven't paid for</p>
									<p>Change and update profile information</p>
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