<?php
require_once '../config/function.php';

if (!isset($_SESSION['userId'])) {
  header('Location: ../auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>SCORPS PH - CART</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="../assets/img/icon.jpg">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="../assets/css/ashion/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/ashion/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/ashion/style.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.min.css" type="text/css">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/style - shop.css" type="text/css">
</head>

<body>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="../index.php"><img src="../assets/img/logo-icon.png" alt="" class="img-fluid"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../about-us.php">About Us</a></li>
          <li><a href="../shop.php">Shop</a>
          </li>
          <li><a href="../faqs.php">FAQs</a></li>
          <li><a href="../help-center.php">Help Center</a>
          </li>
          <li class="dropdown"><a href=""><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php
              if (!isset($_SESSION['userId'])) {
                echo '<li><a href="../auth/login.php">Login</a></li>';
              }
              ?>
              <li><a class="active" href="../user/cart.php">View Cart</a></li>
              <li><a href="../user/profile.php">View Account</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <div class="row m-5 justify-content-center">
    <div class="col-lg-8" style="height: 80vh; overflow-y: auto;">
      <div class="shop__cart__table">
        <table class="text-center">
          <thead class="sticky-top" style="background: #F6E7E4">
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="cart"></tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col-12">
          <div class="cart__total__procced">
            <h6>Cart total</h6>
            <ul>
              <li>Total <span id="cart-total"></span></li>
            </ul>
            <a href="../shop/checkout.php" class="primary-btn" onclick="checkoutItem()">Proceed to checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Scorps PH</h3>
            <p>
              San Pedro 4023, Laguna <br>
              <br>
              <strong>Phone:</strong> 09164388363<br>
              <strong>Email:</strong> scorpsph@gmail.com<br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about-us.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="faqs.php">FAQs</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="help-center.php">Help Center</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Shop</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="featured-products.php">Featured Products</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="shop.php">All Products</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="">Pre-order Form</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Get the latest updates about our new products and news-related to our store!</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Scorps PH</span></strong>. <br> All Rights Reserved 2021.
      </div>
    </div>
  </footer>
  <!-- Footer -->

  <!-- Js Plugins -->
  <script src="../assets/js/ashion/jquery-3.3.1.min.js"></script>
  <script src="../assets/js/ashion/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../assets/js/cart.js"></script>
  <script>
    $(document).ready(function () {
      displayCartData();
    });
  </script>
</body>

</html>