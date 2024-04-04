<?php
include_once "config.php";
require "session.php";
// // Mulai sesi

// Periksa apakah tombol "Add to Cart" ditekan
if (isset($_POST['add_to_cart'])) {
  // Ambil data produk dari formulir
  $product = json_decode($_POST['product'], true);

  // Tambahkan produk ke dalam keranjang (Anda dapat melakukan logika penyimpanan produk ke dalam keranjang di sini)
  // Contoh:
  $_SESSION['cart'][] = $product;

  // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
  echo '<script>alert("Produk berhasil ditambahkan ke keranjang!");</script>';
}


$products = array(
  array("Champagne Problem", "Gourmet", "55000", "images/prod_1.png"),
  array("False God", "Floral", "54000", "images/prod_2.png"),
  array("You're on Your Own Kid", "Seasonal", "48000", "images/prod_3.png"),
  array("Lavender Haze", "Floral", "60000", "images/prod_4.png"),
  array("Styles", "Woody", "49000", "images/prod_5.png"),
  array("Speak Now", "Aromatherapy", "48000", "images/prod_6.png"),
  array("Cruel Summer", "Seasonal", "58000", "images/prod_7.png"),
  array("Sparks Fly", "Fruity", "45000", "images/prod_8.png"),
  array("State of Grace", "Seasonal", "68000", "images/prod_9.png"),
  array("Folklore", "Woody", "54000", "images/prod_10.png"),
  array("Midnight Rain", "Gourmet", "55000", "images/prod_11.png"),
  array("Enchanted", "Floral", "58000", "images/prod_12.png")
);

$user_id = $_SESSION['user_id'];
$sql = "SELECT cart.*, p.* FROM cart JOIN products p ON p.id_products = cart.id_products WHERE id_users = '$user_id'";
$result = $con->query($sql);
$carts = $result->fetch_all(MYSQLI_ASSOC);

$can_checkout = false;
foreach ($carts as $cart) {
  if ($cart['checked'] == 1) {
    $can_checkout = true;
    break;
  }
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

  <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>

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
          <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Cart <i class="fa fa-chevron-right"></i></span></p>
          <h2 class="mb-0 bread">My Cart</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="table-wrap">
          <table class="table">
            <thead class="thead-primary">
              <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Memastikan ada sesi yang aktif sebelum mengakses data cart
              $subtotal = 0;
              if (!empty($carts)) {
                foreach ($carts as $cart) {
                  $product_id = $cart['id_products'];
                  $product_name = $cart['products_name'];
                  $price = $cart['price'];
                  $image = $cart['img'];
                  $qty = $cart['quantity'];
                  $stocks = $cart['stocks'];
                  $checked = $cart['checked'] == 1 ? 'checked' : '';

                  echo '<tr>';
                  echo '<td>';
                  echo '<label class="checkbox-wrap checkbox-primary">';
                  echo '<input class="checked" name="checked" type="checkbox" ' . $checked . ' hx-post="updatecart.php?id=' . $product_id . '&checkbox=1" hx-swap="none" hx-trigger="click">';
                  echo '<span class="checkmark"></span>';
                  echo '</label>';
                  echo '</td>';
                  echo '<td>';
                  echo '<div class="img" style="background-image: url(images/' . $image . ');"></div>';
                  echo '</td>';
                  echo '<td>';
                  echo '<div class="email">';
                  echo '<span>' . $product_name . '</span>';
                  echo '</div>';
                  echo '</td>';
                  echo '<td data-price="' . $price . '">Rp ' . number_format($price, 0, ',', '.') . '</td>';
                  echo '<td>';
                  echo '<div class="input-group">';
                  echo '<input type="text" name="quantity" class="quantity form-control input-number" value="' . $qty . '" min="1" max="' . $stocks . '" hx-post="updatecart.php?id=' . $product_id . '" hx-swap="none" hx-trigger="keyup changed">';
                  echo '</div>';
                  echo '</td>';
                  echo '<td>Rp ' . number_format($price * $qty, 0, ',', '.') . '</td>';
                  echo '<td>';
                  echo '<td>';
                  echo '<a href="remove_from_cart.php?id=' . $product_id . '" class="close delete-product" aria-label="Close" data-product-name="' . $product_name . '" onclick="return confirm(\'Are you sure you want to delete this item?\')">';
                  echo '<span aria-hidden="true"><i class="fa fa-close"></i></span>';
                  echo '</a>';
                  echo '</td>';
                  echo '</tr>';

                  if ($can_checkout)
                    $subtotal += $price * $qty;
                }
              } else {
                echo '<tr>';
                echo '<td colspan="7" class="text-center">Your cart is empty.</td>';
                echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>


  </div>
  <?php if (!empty($carts)) : ?>
    <div class="row justify-content-end">
      <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Cart Totals</h3>
          <!-- <p class="d-flex">
          <span>Subtotal</span>
          <span>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span>
        </p>
        <p class="d-flex">
          <span>Delivery</span>
          <span>Rp 5.000</span>
        </p>
        <p class="d-flex">
          <span>Discount</span>
          <span>Rp 5.000</span>
        </p> -->
          <hr>
          <p class="d-flex total-price">
            <span>Total</span>
            <span class="grandtotal">Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span>
          </p>
        </div>
        <p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4 checkout">Proceed to Checkout</a></p>
      </div>
    </div>
  <?php endif; ?>
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
                <li><a href="about.php"><span class="fa fa-chevron-right mr-2"></span>About us</a></li>
                <li><a href="product.php"><span class="fa fa-chevron-right mr-2"></span>Catalog</a></li>
                <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>Contact us</a></li>
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

  <script>
    $(document).ready(function() {
      $(".quantity").on("keyup change", function() {
        var quantity = $(this).val();
        var price = $(this).closest("tr").find("td[data-price]").data("price");
        var total = quantity * price;
        $(this).closest("tr").find("td").eq(5).text("Rp " + total.toLocaleString().replace(/,/g, "."));

        var grandtotal = 0;
        $(".quantity").each(function() {
          var qty = $(this).val();
          var price = $(this).closest("tr").find("td[data-price]").data("price");
          grandtotal += qty * price;
        });

        if (can_checkout) {
          $(".grandtotal").text("Rp " + grandtotal.toLocaleString().replace(/,/g, "."));
        }
      });

      let can_checkout = false;
      $(".checked").each(function() {
        if ($(this).is(":checked")) {
          can_checkout = true;
        }
      });

      $(".checked").on("click", function() {
        var grandtotal = 0;
        $(".checked").each(function() {
          if ($(this).is(":checked")) {
            var qty = $(this).closest("tr").find(".quantity").val();
            var price = $(this).closest("tr").find("td[data-price]").data("price");
            grandtotal += qty * price;
          }

        });
        $(".grandtotal").text("Rp " + grandtotal.toLocaleString().replace(/,/g, "."));

        $(".checked").each(function() {
          if ($(this).is(":checked")) {
            can_checkout = true;
            return false;
          } else {
            can_checkout = false;
          }
        });
      });

      $(".checkout").on("click", function() {
        if (!can_checkout) {
          alert("Mohon checklist produk terlebih dahulu.");
          return false;
        }
      });
    });
  </script>

</body>

</html>
