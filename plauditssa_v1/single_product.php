<?php
    session_start();
    include 'includes/dbConfig.php';

    $status = " ";

	if (isset($_POST['size']) && isset($_POST['product_id'])) {

		$product_id = $_POST['product_id'];
		$size = $_POST['size_name'];

		$result = mysqli_query($conn,"SELECT * FROM `products`,`product_size` WHERE product_size.productID = products.productID AND products.productID = '$product_id'");
		$row = mysqli_fetch_assoc($result);

		$name = $row['product_title'];
		$productsku_id = $row['productSKUID'];
		$productSize_id = $row['productSizeID'];
		$price = $row['product_price'];
		$image = $row['product_imageFront'];
		$code = $_POST['size'];
		$size_quantity = $_POST['size_quantity'];

		switch ($code) {

			case ''.$productsku_id.'OneSize':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;

			case ''.$productsku_id.'XSmall':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;

			case ''.$productsku_id.'Small':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;

			case ''.$productsku_id.'Medium':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;

			case ''.$productsku_id.'Large':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;

			case ''.$productsku_id.'XLarge':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;

			case ''.$productsku_id.'2XLarge':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;	

			case ''.$productsku_id.'3XLarge':

				$cartArray = array(
					$code=>array(
					'name'=>$name,
					'code'=>$code,
					'id'=>$product_id,
					'size_id'=>$productSize_id,
					'price'=>$price,
					'size'=>$size,
					'size_quantity'=>$size_quantity,
					'quantity'=>1,
					'image'=>$image)
				); break;			
		}
		
		if(empty($_SESSION["shopping_cart"])) {

			$_SESSION["shopping_cart"] = $cartArray;
			$status = "Product is added to your cart!";
		}else {

			$array_keys = array_keys($_SESSION["shopping_cart"]);
			if(in_array($code,$array_keys)) {

				$status = "Product is already added to your cart!";	
			} else {

				$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
				$status = "Product is added to your cart!";
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
	<title>Plaudits SA - Product Details</title>
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
	<link rel="stylesheet" type="text/css" href="styles/product.css">
	<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>

<!-- Menu -->
<div class="menu"  style="background-image: url(images/plaudits/models/model8.jpg);">

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
        $slug = $_GET['slug'];
        $product_id = $_GET['id'];

        $sql="SELECT * FROM products, product_size WHERE product_size.productID = products.productID AND products.productID = '$product_id' AND product_titleSlug = '$slug'";
		$result_set=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result_set) 
    ?>

	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->
		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Product</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="home/">Home</a></li>
							<li><a href="<?php echo $row['product_type']?>/"><?php echo $row['product_type']?></a></li>
							<li>Product Info</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Product -->
		<div class="product">
			<div class="container">
				<div class="row">
					<!-- Product Image -->
					<div class="col-lg-6">
						<div class="product_image_slider_container">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<li>
										<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>"/>
									</li>
									<li>
										<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageBack'] ?>" />
									</li>
									<li>
										<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageModel'] ?>" />
									</li>
								</ul>
							</div>
							<div class="carousel_container">
								<div id="carousel" class="flexslider">
									<ul class="slides">
										<li>
											<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageFront'] ?>" />
										</li>
										<li>
											<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageBack'] ?>" />
										</li>
										<li>
											<img src="https://admin.plauditssa.co.za/uploads/product_images/<?php echo $row['product_imageModel'] ?>" />
										</li>
									</ul>
								</div>
								<div class="fs_prev fs_nav disabled"><i class="fa fa-chevron-up" aria-text="true"></i></div>
								<div class="fs_next fs_nav"><i class="fa fa-chevron-down" aria-text="true"></i></div>
							</div>
						</div>
					</div>

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<div class="product_info">
							<div class="product_name"><?php echo $row['product_title'] ?></div>
							<div class="product_category">In <a href="<?php echo $row['product_type'] ?>/"><?php echo $row['product_type'] ?></a></div>
							<div class="product_price">R<?php echo $row['product_price']?></div>
							<div class="product_size">
								<?php 
									if(!empty($row['product_quantity_oneSize'])) {
										echo '<div class="product_size_title">Add Size To Cart: <small>"Fits All" (one size)</small></div>';
									}else{
										echo '<div class="product_size_title">Add Size To Cart</div>';
									}
								?>
								<ul class="d-flex flex-row align-items-start justify-content-start">
								<?php 
									if ($row['product_quantity_XS'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_XS'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_XS'].'">
													<input type="hidden" name="size_name" value="XS">
													<input type="radio" id="radio_1" name="product_radio" class="regular_radio radio_1" onclick="this.form.submit()">
														<label for="radio_1">XS</label>
												</form>
											</li>	
												';
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_1" disabled name="order_size" class="regular_radio radio_1">
												<label for="radio_1">XS</label>
											</li>';
									}

									if ($row['product_quantity_S'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_S'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_S'].'">
													<input type="hidden" name="size_name" value="S">
													<input type="radio" id="radio_2" name="product_radio" class="regular_radio radio_2" onclick="this.form.submit()">
														<label for="radio_2">S</label>
												</form>
											</li>	
												';
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_2" disabled name="product_radio" class="regular_radio radio_2">
												<label for="radio_2">S</label>
											</li>';
									}

									if ($row['product_quantity_M'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_M'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_M'].'">
													<input type="hidden" name="size_name" value="M">
													<input type="radio" id="radio_3" name="product_radio" class="regular_radio radio_3" onclick="this.form.submit()">
														<label for="radio_3">M</label>
												</form>
											</li>	
												';
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_3" disabled name="product_radio" class="regular_radio radio_3">
												<label for="radio_3">M</label>
											</li>';
									}
 
									if ($row['product_quantity_L'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_L'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_L'].'">
													<input type="hidden" name="size_name" value="L">
													<input type="radio" id="radio_4" name="product_radio" class="regular_radio radio_4" onclick="this.form.submit()">
														<label for="radio_4">L</label>
												</form>
											</li>	
												';
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_4" disabled name="product_radio" class="regular_radio radio_4">
												<label for="radio_4">L</label>
											</li>';
									}

									if ($row['product_quantity_XL'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_XL'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_XL'].'">
													<input type="hidden" name="size_name" value="XL">
													<input type="radio" id="radio_5" name="product_radio" class="regular_radio radio_5" onclick="this.form.submit()">
														<label for="radio_5">XL</label>
												</form>
											</li>	
												';
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_5" disabled name="product_radio" class="regular_radio radio_5">
												<label for="radio_5">XL</label>
											</li>';
									}
 
									if ($row['product_quantity_2XL'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_2XL'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_2XL'].'">
													<input type="hidden" name="size_name" value="2XL">
													<input type="radio" id="radio_6" name="product_radio" class="regular_radio radio_6" onclick="this.form.submit()">
														<label for="radio_6">2XL</label>
												</form>
											</li>
												';	
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_6" disabled name="product_radio" class="regular_radio radio_6">
												<label for="radio_6">2XL</label>
											</li>';
									}

									if(!empty($row['product_quantity_oneSize'])) {

										if ($row['product_quantity_oneSize'] > 0) {
											echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_oneSize'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_oneSize'].'">
													<input type="hidden" name="size_name" value="Fits All">
													<input type="radio" id="radio_8" name="product_radio" class="regular_radio radio_8" onclick="this.form.submit()">
														<label for="radio_8">Size</label>
												</form>
											</li>	
												';
										} else {
									    	echo '
												<li>
													<input type="radio" id="radio_1" disabled name="order_size" class="regular_radio radio_1">
													<label for="radio_1">XS</label>
												</li>';
										}
									}else {

										if ($row['product_quantity_3XL'] > 0) {
										echo '
											<li>
												<form method="post" action="" id="form">
													<input type="hidden" name="product_id" value="'.$row['productID'].'">
													<input type="hidden" name="size" value="'.$row['product_size_3XL'].'">
													<input type="hidden" name="size_quantity" value="'.$row['product_quantity_3XL'].'">
													<input type="hidden" name="size_name" value="3XL">
													<input type="radio" id="radio_7" name="product_radio" class="regular_radio radio_7" onclick="this.form.submit()">
														<label for="radio_7">3XL</label>
												</form>
											</li>	
												';
									} else {
									    echo '
											<li>
												<input type="radio" id="radio_7" disabled name="product_radio" class="regular_radio radio_7">
												<label for="radio_7">3XL</label>
											</li>';
									}
									}
								?>
							</ul>
						</div><br>
						<div class="product_name"><?php echo $status; ?></div>
					</div>
					<div class="product_text">
						<h5><?php echo $row['product_description']?></h5>
					</div>
				</div>
			</div>
		</div><br><br>

		<div class="boxes">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="box d-flex flex-row align-items-center justify-content-start">
							<div class="mt-auto">
								<div class="box_image"><img src="images/boxes_1.png" alt=""></div>
							</div>
							<div class="box_content">
								<div class="box_title"><a href="size-guide/">Size Guide</a></div>
								<div class="box_text">Check our size guide here</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 box_col">
						<div class="box d-flex flex-row align-items-center justify-content-start">
							<div class="mt-auto">
								<div class="box_image"><img src="images/boxes_2.png" alt=""></div></div>
							<div class="box_content">
								<div class="box_title"><a href="delivery-info/">Delivery</a></div>
								<div class="box_text">Read and Know more about our delivery methods her</div>
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
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/progressbar/progressbar.min.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
	<script src="js/product.js"></script>
</body>
</html>