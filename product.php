<?php
require "config.php";
// Dummy data produk lilin
// $products = array(
//   array("Champagne Problem", "Gourmet", "55000", "images/prod_1.png"),
//   array("False God", "Floral", "54000", "images/prod_2.png"),
//   array("You're on Your Own Kid", "Seasonal", "48000", "images/prod_3.png"),
//   array("Lavender Haze", "Floral", "60000", "images/prod_4.png"),
//   array("Styles", "Woody", "49000", "images/prod_5.png"),
//   array("Speak Now", "Aromatherapy", "48000", "images/prod_6.png"),
//   array("Cruel Summer", "Seasonal", "58000", "images/prod_7.png"),
//   array("Sparks Fly", "Fruity", "45000", "images/prod_8.png"),
//   array("State of Grace", "Seasonal", "68000", "images/prod_9.png"),
//   array("Folklore", "Woody", "54000", "images/prod_10.png"),
//   array("Midnight Rain", "Gourmet", "55000", "images/prod_11.png"),
//   array("Enchanted", "Floral", "58000", "images/prod_12.png")
// );

$products = $con->query("SELECT * FROM products")->fetch_all(MYSQLI_ASSOC);
$products = array_map(function ($product) {
  return array($product['products_name'], $product['desc'], $product['price'], $product['img'], $product['id_products']);
}, $products);

$products = array_slice($products, 0, 12);

// Pisahkan produk berdasarkan kategori
$categorizedProducts = array();
foreach ($products as $product) {
  $category = $product[1];
  if (!isset($categorizedProducts[$category])) {
    $categorizedProducts[$category] = array();
  }
  array_push($categorizedProducts[$category], $product);
}
?>

<style>
  .ftco-footer {
    width: max-content;
  }
</style>


<!DOCTYPE html>
<php lang="en">

  <head>
    <title>Candle store</title>
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
              <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span>0812345618</a>
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
            <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Products <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">Products</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="products-container">
              <div class="row mb-4">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                  <h4 class="product-select">Select Types of Candles</h4>
                  <select id="product-select" class="selectpicker" multiple>
                    <option>Fruity</option>
                    <option>Floral</option>
                    <option>Seasonal</option>
                    <option>Woody</option>
                    <option>Gourmet</option>
                    <option>Aromatherapy</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <?php
                $count = 0;
                foreach ($products as $product) {
                  if ($count % 3 == 0 && $count != 0) {
                    echo '</div><div class="row">';
                  }
                  echo '<div class="col-md-4">';
                  echo '<div class="product ftco-animate">';
                  echo '<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/' . $product[3] . ');">';
                  echo '<div class="desc">';
                  echo '<p class="meta-prod d-flex">';
                  echo '<a href="#" class="d-flex align-items-center justify-content-center add-to-cart" data-product="' . htmlspecialchars(json_encode($product)) . '"><span class="flaticon-shopping-bag"></span></a>';
                  echo '</p>';
                  echo '</div>';
                  echo '</div>';
                  echo '<div class="text text-center">';
                  echo '<h2>' . $product[0] . '</h2>';
                  echo '<span class="category">' . $product[1] . '</span>';
                  echo '<p class="mb-0"><span class="price">Rp ' . number_format($product[2], 0, ',', '.') . '</span></p>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  $count++;
                }
                ?>
              </div>
              <div class="row mt-5">
                <div class="col text-center">
                  <div class="block-27">
                  </div>
                </div>
              </div>
            </div>

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

            <script>
              document.addEventListener('DOMContentLoaded', function() {
                var productSelect = document.getElementById('product-select');
                productSelect.addEventListener('change', function() {
                  var selectedOptions = Array.from(productSelect.selectedOptions).map(option => option.value);
                  filterProducts(selectedOptions);
                });

                function filterProducts(selectedOptions) {
                  var products = document.querySelectorAll('.product');
                  products.forEach(function(product) {
                    var category = product.querySelector('.category').textContent;
                    if (selectedOptions.includes(category)) {
                      product.style.display = 'block';
                    } else {
                      product.style.display = 'none';
                    }
                  });

                  // Periksa apakah tidak ada opsi yang dipilih
                  if (selectedOptions.length === 0) {
                    // Lakukan refresh halaman secara smooth
                    smoothPageRefresh();
                  }
                }

                function smoothPageRefresh() {
                  // Menambahkan efek fade-out ke halaman
                  document.body.style.opacity = '0';
                  // Set timeout untuk memberi waktu efek fade-out terjadi
                  setTimeout(function() {
                    // Lakukan refresh halaman
                    window.location.reload(true);
                  }, 500); // Waktu dalam milidetik sebelum refresh halaman
                }
              });
            </script>

            <script>
              // Menambahkan event listener ke setiap tombol "Add to Cart"
              document.addEventListener('DOMContentLoaded', function() {
                var addToCartButtons = document.querySelectorAll('.add-to-cart');
                addToCartButtons.forEach(function(button) {
                  button.addEventListener('click', function(event) {
                    event.preventDefault(); // Mencegah aksi default dari tombol

                    // Mendapatkan data produk dari atribut data-product
                    var productData = JSON.parse(button.getAttribute('data-product'));

                    // Kirim data produk ke cart.php menggunakan AJAX
                    addToCart(productData);
                  });
                });

                // Fungsi untuk menambahkan produk ke keranjang menggunakan AJAX
                function addToCart(productData) {
                  var xhr = new XMLHttpRequest();
                  xhr.open('POST', 'addtocart.php', true);
                  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                  xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                        // Respon dari server setelah berhasil menambahkan produk ke keranjang
                        alert('Product added to cart successfully!');
                        // Refresh halaman setelah berhasil menambahkan produk ke keranjang
                        // location.reload();
                      } else if (xhr.status === 401) {
                        alert('Anda harus login terlebih dahulu');
                        location.href = 'login.php';
                      } else {
                        // Handle error jika terjadi masalah saat mengirim data ke server
                        alert('Error: ' + xhr.status);
                      }
                    }
                  };
                  // Encode data produk sebagai parameter POST
                  var formData = 'add_to_cart=true&product=' + encodeURIComponent(JSON.stringify(productData));
                  xhr.send(formData);
                }
              });
            </script>

            <script>
              document.addEventListener('DOMContentLoaded', function() {
                var productSelect = document.getElementById('product-select');
                productSelect.addEventListener('change', function() {
                  var selectedOptions = Array.from(productSelect.selectedOptions).map(option => option.value);
                  filterProducts(selectedOptions);
                });

                function filterProducts(selectedOptions) {
                  var products = document.querySelectorAll('.product');
                  products.forEach(function(product) {
                    var category = product.querySelector('.category').textContent;
                    if (selectedOptions.includes(category)) {
                      product.style.display = 'block';
                    } else {
                      product.style.display = 'none';
                    }
                  });
                }
              });
            </script>

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
</php>
