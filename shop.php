<?php
require_once 'config/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SCORPS PH - Shop</title>
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
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style - shop.css" type="text/css">
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
          <li><a class="active" href="shop.php">Shop</a>
          </li>
          <li><a href="faqs.php">FAQs</a></li>
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
  <main id="main">
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-best">Best Seller</li>
              <li data-filter=".filter-alpha">Coffee Series</li>
            </ul>
          </div>
        </div>
        <div class="row portfolio-container" id="portfolio-container">
        </div>
      </div>
    </section>
  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

  <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/others/products/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/cart.js"></script>
  <script src="assets/js/shop.js"></script>

  <script>
    var userId = <?php echo json_encode($_SESSION['userId']); ?>;
  </script>

</body>

</html>