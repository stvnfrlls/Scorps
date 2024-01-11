<?php
require_once 'config/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SCORPS PH - FAQ's</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="assets/img/icon.jpg">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css">
  <link rel="stylesheet" href="assets/css/ashion/style.css" type="text/css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style - faqs.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="index.php"><img src="assets/img/logo-icon.png" alt="" class="img-fluid"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about-us.php">About Us</a></li>
          <li><a href="shop.php">Shop</a>
          </li>
          <li><a class="active" href="faqs.php">FAQs</a></li>
          <li><a href="help-center.php">Help Center</a>
          </li>
          <li class="dropdown"><a href=""><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php
              if (!isset($_SESSION['userId'])) {
                echo '<li><a href="auth/login.php">Login</a></li>';
              }
              ?>
              <li><a href="user/cart.php">View Cart</a></li>
              <li><a href="user/profile.php">View Account</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <section id="faqs" class="info-box py-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
          <div class="content">
            <h3><strong>Frequently Asked Questions</strong></h3>
          </div>
          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> How
                  much is the TARA! Tote bag? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    For the regular TARA!, each costs PHP699. The limited edition ones are priced at PHP749 ea.
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Is the
                  bag unisex? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Yes!
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Do you
                  ship to Cebu or Davao? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Yes! We ship domestically through JRS Express(for now). The shipping rates are as follows: Metro
                    Manila - Php238/unit, Luzon - Php266/unit, Visayas - Php293/unit, Mindanao - Php306/unit.
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span> Do you
                  ship internationally?<i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    We are considering it due to high demand.
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed"><span>05</span> How
                  can I pay for the bag? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    We accept payment through BDO and Palawan Express..
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-6" class="collapsed"><span>06</span> Do you
                  do meetups? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-6" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Yes! We do meetups in the following locations:
                    <br>Manila - DLSU-M Campus, Green Residences, Robinsons Manila, The One Torre de Santo Tomas
                    <br>Taguig - Market! Market!, SM Aura, Bonifacio High Street
                    <br>Quezon - McDonald's Retiro
                    <br>Laguna - Robinsons Supermarket Pacita, Southwoods Mall, Villa Olympia 6
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-7" class="collapsed"><span>07</span> How to
                  order? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-7" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Accomplish the order form (www.tinyurl.com/TARATOTEORDERFORM) and then wait for the order
                    confirmation/updates via email/text (1-2 days). All necessary details will be sent on e the customer
                    accomplishes the form.
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-8" class="collapsed"><span>08</span> How
                  many kilos can the bag carry? <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-8" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Around 3kg.
                  </p>
                </div>
              </li>
              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-9" class="collapsed"><span>09</span> Can it
                  fit my laptop <i class="bx bx-chevron-down icon-show"></i><i
                    class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-9" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    The bag can fit up to a 14" laptop.
                  </p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>