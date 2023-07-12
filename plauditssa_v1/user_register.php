<?php 
	
  	session_start();
  	
  	include "includes/dbConfig.php";

  	$errors = array();
  	if (isset($_POST['send'])) {

		$user_email = mysqli_real_escape_string($conn,$_POST['email']);

	    $user_check_query = "SELECT * FROM users WHERE user_email = '$user_email' LIMIT 1";
	    $result = mysqli_query($conn, $user_check_query);
	    $user = mysqli_fetch_assoc($result);

        if($user) {

        	if ($user['user_email'] === $user_email) {

        		$unique_id = uniqid();
        		$rand_start = mt_rand(1,5);
        		$verification_code = substr($unique_id, $rand_start);
        		$user_id = $user['userID'];

        		$query = "UPDATE users SET verification_code = '$verification_code' WHERE userID = '$user_id'";
		        	mysqli_query($conn, $query);

				$to = ''.$user['user_email'].'';

				$subject = "Plaudits SA - User Verification";
						
				$message = '<h2>Email Confirmation for '.$user['user_email'].'</h2><br>

							<p>Click The Link Below To Confirm Your Email and Verify Your account</p>

							<p><a href="https://plauditssa.co.za/user_registration.php?code='.$verification_code.'&email='.$user['user_email'].'">Verify Here </a></p>

							<p>Or Copy and Paste this link on your browser</p>

							<p><a href="https://plauditssa.co.za/user_registration.php?code='.$verification_code.'&email='.$user['user_email'].'">https://plauditssa.co.za/user_registration.php?code='.$verification_code.'&email='.$user['user_email'].'</a></p>

							<p>IF YOU DID NOT REQUEST THIS ACTION OR YOU DID NOT SIGN UP FOR PLAUDITS SA IGNORE THIS EMAIL.</p>
				';			

				$headers =  "From: info@plauditssa.co.za" ."\r\n".
							"Reply-To: plauditssa@gmail.co.za" ."\r\n".
							"CC: plauditssa@gmail.com" ."\r\n".
							"MIME-Version: 1.0" ."\r\n".
							"Content-type: text/html; charset=UTF-8" ."\r\n".
							"X-Mailer: PHP/".phpversion();	

				mail($to, $subject, $message, $headers);
	
		        $message2 = "Email Is Sent To ".$user_email." For Verification.";

		        echo "<script type='text/javascript'>alert('$message2')</script>";

		        echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/">';
        	}
        }else {
        		
        	$unique_id = uniqid();
        	$rand_start = mt_rand(1,5);
        	$verification_code = substr($unique_id, $rand_start);
        		
       		$query = "INSERT INTO users (user_email, verification_code) VALUES ('$user_email','$verification_code')";
        	mysqli_query($conn, $query);

        	$to = ''.$user_email.'';

			$subject = "Plaudits SA - User Verification";
						
			$message = '<h2>Email Confirmation for '.$user_email.'</h2><br>

						<p>Click The Link Below To Confirm Your Email and Verify Your account</p>

						<p><a href="https://plauditssa.co.za/user_registration.php?code='.$verification_code.'&email='.$user_email.'">Verify Here </a></p>

						<p>Or Copy and Paste this link on your browser</p>

						<p><a href="https://plauditssa.co.za/user_registration.php?code='.$verification_code.'&email='.$user_email.'">https://plauditssa.co.za/user_registration.php?code='.$verification_code.'&email='.$user_email.'</a></p>

						<p>IF YOU DID NOT REQUEST THIS ACTION OR YOU DID NOT SIGN UP FOR PLAUDITS SA IGNORE THIS EMAIL.</p>
				';			

			$headers =  "From: info@plauditssa.co.za" ."\r\n".
						"Reply-To: plauditssa@gmail.co.za" ."\r\n".
						"CC: plauditssa@gmail.com" ."\r\n".
						"MIME-Version: 1.0" ."\r\n".
						"Content-type: text/html; charset=UTF-8" ."\r\n".
						"X-Mailer: PHP/".phpversion();	

			mail($to, $subject, $message, $headers);
	
		    $message2 = "Email Is Sent To ".$user_email." For Verification.";

		    echo "<script type='text/javascript'>alert('$message2')</script>";

        	echo '<meta http-equiv="refresh" content="0; url= https://plauditssa.co.za/">';		
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
	<title>Plaudits SA - User Registration</title>
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
	<link rel="stylesheet" type="text/css" href="styles/user_login.css">
	<link rel="stylesheet" type="text/css" href="styles/user_login_responsive.css">
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
								<div class="checkout_title">Sign Up</div><br>
								 <?php if (count($errors) > 0) : ?>
							 		<?php foreach ($errors as $error) : ?>
							 			<small style="color: red"><?php echo $error ?></small>
							 		<?php endforeach ?>
							 	<?php endif ?>
								<div class="checkout_form_container">
									<form action="" method="post" id="checkout_form" class="checkout_form">
										<div>
											<!-- Email -->
											<input type="email" name="email" id="checkout_email" class="checkout_input" placeholder="Email" required="required" pattern="[A-z0-9.]+@[A-z]+\.[A-z.]+">
										</div>
										<div class="checkout_extra">
											<div>
												<button type="submit" name="send" class="checkout_button trans_200" style="color: white">
													<h4><strong> R E G I S T E R </strong></h4>
												</button>
											</div>
										</div>
										<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
											<ul class="d-flex flex-row align-items-start justify-content-start text-center">
												<li>
													<small>Already registered?</small> <a href="login/"><strong> Login Here</strong></a>
												</li>
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
									<p>Register an account profile so that you can be able to...</p>
									<p>Track Orders</p>
									<p>Make payments on orders that you haven't paid for</p>
									<p>Change and update profile information</p>
									<p style="color: red"><strong>We Won't Share or Sell Your Personal Information with anyone. Please use a strong secured password. An alpha-numeric password is recommended</strong> </p>
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