<?php
	session_start();
    include 'includes/dbConfig.php';

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
	<title>Plaudits SA - Search Results</title>
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
	<link rel="stylesheet" type="text/css" href="styles/category.css">
	<link rel="stylesheet" type="text/css" href="styles/category_responsive.css">
</head>
<body>

<!-- Menu -->
<div class="menu"  style="background-image: url(images/plaudits/model7.jpg);">

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
		 if (isset($_GET['submit-search'])) {

			$search = mysqli_real_escape_string($conn,$_GET['search']);

			$sql = "SELECT * FROM products WHERE product_title LIKE '%$search%' OR product_type LIKE '%$search%' OR product_category LIKE '%$search%'";
			$result = mysqli_query($conn,$sql);
			$queryResult = mysqli_num_rows($result);
		?>
		<!-- Home -->
		<div class="home" style="background-image: url();">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title"><?php echo $queryResult ?> Results for "<?php echo $search ?>"</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="home/">Home</a></li>
							<li>Search</li>
						</ul>
					</div>
				</div>
			</div>
		</div><br>

		<!-- Products -->
		<div class="products">
			<div class="container">
				<div class="row products_row products_container grid">
					<?php
				    	if ($queryResult > 0) {

				    		while ($row = mysqli_fetch_assoc($result)) {

				    			echo '
				    				<!-- Product -->
									<div class="col-xl-4 col-md-6 grid-item new">
				    					<div class="product">
											<div class="product_image">
												<a href="https://plauditssa.co.za/product/'.$row['product_type'].'/'.$row['productID'].'/'.$row['product_titleSlug'].'"><img src="https://admin.plauditssa.co.za/uploads/product_images/'.$row['product_imageFront'].'" alt=""></a>
											</div>
										<div class="product_content">
											<div class="product_info d-flex flex-row align-items-start justify-content-start">
												<div>
													<div>
														<div class="product_name"><a href="https://plauditssa.co.za/product/'.$row['product_type'].'/'.$row['productID'].'/'.$row['product_titleSlug'].'">'.$row['product_title'].'</a></div>
														</div>
													</div>
													<div class="ml-auto text-right">
														<div class="rating_r rating_r_4 home_item_rating">In <a href="'.$row['product_type'].'/">'.$row['product_type'].'</a></div>
														<div class="product_price text-right">R'.$row['product_price'].'</div>
													</div>
												</div>
												<a href="https://plauditssa.co.za/product/'.$row['product_type'].'/'.$row['productID'].'/'.$row['product_titleSlug'].'">
												</a>
											</div>
										</div>
									</div>';
				    				}
				    			}	
				    		}
                    	?>	
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
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/Isotope/fitcolumns.js"></script>
	<script src="js/category.js"></script>
	
</body>
</html>


