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
	<title>Plaudits SA - Home</title>
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
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<!-- Menu -->
<div class="menu"  style="background-image: url(images/plaudits/models/model8.jpg);">

	<!-- Search -->
	<div style="color: black;"><h3>Plaudits SA</h3></div>
	<div class="menu_search">
		<form action="search/" method="get" id="menu_search_form" class="menu_search_form">
			<input type="text" name="search" class="search_input" placeholder="Search Item" required>
			<button type="submit" name="submit-search" class="menu_search_button"><img src="images/search.png" alt=""></button>
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

		<!-- Home -->
		<div class="home">
			<!-- Home Slider -->
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">
					
					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url(images/plaudits/models/model1.jpg)"></div>
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col fill_height">
									<div class="home_container d-flex flex-column align-items-center justify-content-start">
										<div class="home_content">
											<div class="home_title">New Arrivals</div>
											<div class="home_subtitle">Winter Wear</div>
											<div class="home_items">
												<div class="row">
													<div class="col-sm-3 offset-lg-1">
														<?php
															$sql="SELECT * FROM products WHERE product_type = 'headwear' ORDER BY productID LIMIT 1";
															$result_set=mysqli_query($conn,$sql);
															$row=mysqli_fetch_array($result_set);
															$rows_fetched=mysqli_num_rows($result_set); 
														
															if($rows_fetched > 0){ 
														?>
															<div class="home_item_side">
																<a href="https://plauditssa.co.za/product/<?php echo $row['product_type'] ?>/<?php echo $row['productID'] ?>/<?php echo $row['product_titleSlug'] ?>">
																	<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>" alt="">
																</a>
															</div>
														<?php
															}
														?>
													</div>
													<?php
														$sql="SELECT * FROM products WHERE product_type = 'hoodies' ORDER BY productID LIMIT 1";
														$result_set=mysqli_query($conn,$sql);
														$row=mysqli_fetch_array($result_set);
														$rows_fetched=mysqli_num_rows($result_set);  
													
														if($rows_fetched > 0){
													?>
														<div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
															<div class="product home_item_large">
																<div class="product_tag d-flex flex-column align-items-center justify-content-center">
																	<div>
																		<div>R<?php echo $row['product_price'] ?></div>
																	</div>
																</div>
																<div class="product_image">
																	<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>" alt="">
																</div>
																<div class="product_content">
																	<div class="product_info d-flex flex-row align-items-start justify-content-start">
																		<div>
																			<div>
																				<div class="product_name">
																					<a href="https://plauditssa.co.za/product/<?php echo $row['product_type'] ?>/<?php echo $row['productID'] ?>/<?php echo $row['product_titleSlug'] ?>"><?php echo $row['product_title'] ?></a>
																				</div>
																				<div class="product_category">In <a href="#"><?php echo $row['product_type'] ?></a>
																				</div>
																			</div>
																		</div>
																		<div class="ml-auto text-right">
																			<div class="product_price text-right">R<?php echo $row['product_price'] ?></div>
																		</div>
																	</div>
																	<div class="product_buttons">
																		<div class="button load_more ml-auto mr-auto">
																			<a href="https://plauditssa.co.za/product/<?php echo $row['product_type'] ?>/<?php echo $row['productID'] ?>/<?php echo $row['product_titleSlug'] ?>">Buy Now</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php
														}
													
														$sql="SELECT * FROM products WHERE product_type = 'long-sleeves' ORDER BY productID LIMIT 1";
														$result_set=mysqli_query($conn,$sql);
														$row=mysqli_fetch_array($result_set);
														$rows_fetched=mysqli_num_rows($result_set); 
													
														if($rows_fetched > 0){
													?>
														<div class="col-sm-3">
															<div class="home_item_side">
																<a href="https://plauditssa.co.za/product/<?php echo $row['product_type'] ?>/<?php echo $row['productID']?> /<?php echo $row['product_titleSlug'] ?>"><img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>" alt=""></a>
															</div>
														</div>
													<?php	
														}		
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>	
			</div>
		</div>

		<!-- Products -->
		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="section_title text-center" class="active">Fresh Merch</div>
					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								<li><a href="t-shirts/">Tees</a></li>
								<li><a href="kids-collection/">Kids</a></li>
								<li><a href="winter-collection/">Winter</a></li>
								<li><a href="headwear/">Headwear</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row products_row">
					<?php
                        $sql="SELECT * FROM products ORDER BY productID DESC LIMIT 6";
                        $result_set=mysqli_query($conn,$sql);

                        while($row=mysqli_fetch_array($result_set)) 
                        {
                    ?>
					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image">
								<a href="https://plauditssa.co.za/product/<?php echo $row['product_type'] ?>/<?php echo $row['productID'] ?>/<?php echo $row['product_titleSlug'] ?>">
									<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>" alt="">
								</a>
							</div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name">
												<a href="https://plauditssa.co.za/product/<?php echo $row['product_type'] ?>/<?php echo $row['productID'] ?>/<?php echo $row['product_titleSlug'] ?>"><?php echo $row['product_title'] ?></a>
											</div>
											<div class="product_category">In <a href="<?php echo $row['product_type'] ?>/"><?php echo $row['product_type'] ?></a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="product_price text-right">R<?php echo $row['product_price']?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
 						}
 					?>					
				</div>
				<div class="row load_more_row">
					<div class="col">
						<div class="button load_more ml-auto mr-auto"><a href="apparel/">apparel</a></div>
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
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>
