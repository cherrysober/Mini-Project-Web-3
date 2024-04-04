<?php
include_once "config.php";
require "session.php";

$user_id = $_SESSION['user_id'];
$sql = "SELECT cart.*, p.* FROM cart JOIN products p ON p.id_products = cart.id_products WHERE cart.id_users = '$user_id' AND cart.checked = 1";
$result = $con->query($sql);
$carts = $result->fetch_all(MYSQLI_ASSOC);

$total = 0;
foreach ($carts as $cart) {
	$total += $cart['price'] * $cart['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Candle Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<div class="wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-6 d-flex align-items-center">
					<p class="mb-0 phone pl-md-2">
						<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 0812345618</a>
						<a href="#"><span class="fa fa-paper-plane mr-1"></span> candlestore@gmail.com</a>
					</p>
				</div>
				<div class="col-md-6 d-flex justify-content-md-end">
					<div class="social-media mr-4">
						<p class="mb-0 d-flex">
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
						</p>
					</div>
					<div class="reg">
						<p class="mb-0">
							<a href="register.php" class="mr-2">Sign Up</a>
							<span class="mr-2"><a href="login.php">Log In</a></span>
							<a href="account.php">My Account</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Candle <span>store</span></a>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="product.php">Products</a>
							<a class="dropdown-item" href="cart.php">Cart</a>
							<a class="dropdown-item" href="checkout.php">Checkout</a>
						</div>
					</li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Checkout <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Checkout</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 ftco-animate">
					<form action="#" class="billing-form">
						<h3 class="mb-4 billing-heading">Billing Details</h3>
						<div class="row align-items-end">
							<div class="col-md-6">
								<div class="form-group">
									<label for="firstname">Firt Name</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="lastname">Last Name</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="country">State / Country</label>
									<div class="select-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="" id="" class="form-control">
											<option value="">France</option>
											<option value="">Italy</option>
											<option value="">Philippines</option>
											<option value="">South Korea</option>
											<option value="">Hongkong</option>
											<option value="">Japan</option>
										</select>
									</div>
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="streetaddress">Street Address</label>
									<input type="text" class="form-control" placeholder="House number and street name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="towncity">Town / City</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="postcodezip">Postcode / ZIP *</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="w-100"></div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="emailaddress">Email Address</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>
							<div class="w-100"></div>
						</div>
					</form><!-- END -->



					<div class="row mt-5 pt-3 d-flex">
						<div class="col-md-6 d-flex">
							<div class="cart-detail cart-total p-3 p-md-4">
								<h3 class="billing-heading mb-4">Cart Total</h3>
								<!-- <p class="d-flex">
									<span>Subtotal</span>
									<span>$20.60</span>
								</p>
								<p class="d-flex">
									<span>Delivery</span>
									<span>$0.00</span>
								</p>
								<p class="d-flex">
									<span>Discount</span>
									<span>$3.00</span>
								</p> -->
								<hr>
								<p class="d-flex total-price">
									<span>Total</span>
									<span>Rp. <?= number_format($total, 0, ',', '.') ?></span>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="cart-detail p-3 p-md-4">
								<h3 class="billing-heading mb-4">Payment Method</h3>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> QRIS</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Gopay</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
											<label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
										</div>
									</div>
								</div>
								<p><a href="checkout_proses.php" class="btn btn-primary py-3 px-4">Place an order</a></p>
							</div>
						</div>
					</div>
				</div> <!-- .col-md-8 -->
			</div>
		</div>
	</section>

	<footer class="ftco-footer">
		<div class="container">
			<div class="row mb-5">
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2 logo"><a href="#">Candle <span>Store</span></a></h2>
						<p>In a world where chaos reigns, find solace in the gentle flicker and comforting scents of Candle Store candles.</p>
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">My Accounts</h2>
						<ul class="list-unstyled">
							<li><a href="account.php"><span class="fa fa-chevron-right mr-2"></span>My Account</a></li>
							<li><a href="register.php"><span class="fa fa-chevron-right mr-2"></span>Register</a></li>
							<li><a href="login.php"><span class="fa fa-chevron-right mr-2"></span>Log In</a></li>
							<li><a href="cart.php"><span class="fa fa-chevron-right mr-2"></span>My Cart</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About us</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Catalog</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">0812345618</span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">candlestore@gmail.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0 py-5 bg-black">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<p class="mb-0" style="color: rgba(255,255,255,.5);"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
					</div>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>