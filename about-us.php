<?php
require_once 'config/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SCORPS PH - About Us</title>
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
  <link href="assets/css/style - about us.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!-- Header -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="index.php"><img src="assets/img/logo-icon.png" alt="" class="img-fluid"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a class="active" href="about-us.php">About Us</a></li>
          <li><a href="shop.php">Shop</a>
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
    <div class="text-center">
      <img src="assets/img/about us/banner2.png" class="img-fluid">
    </div>
    <section id="about" class="section-padding">
      <div class="container">
        <div class="text-head">
          <h2>about us</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-center h-100">
              <img src="assets/img/about us/abouttry.png" class="img-fluid align-self-center" alt="...">
              <span class="icon-play"></span>
            </div>
          </div>
          <div class="col-md-6">
            <h3 class="mb-4">Welcome to Scorps PH!</h3>
            <p>S.Corps is a company established by five business students which aims to provide high-quality innovative
              products while adhering to its missions to the community and the environment.</p>
            <div class="row">
              <div class="col-md-12">
                <div class="tabulation-2 mt-4 Center">
                  <ul class="nav nav-pills nav-fill d-md-flex d-block">
                    <li class="nav-item mb-md-0 mb-2">
                      <a class="nav-link active py-2" data-toggle="tab" href="#home1">Our Mission</a>
                    </li>
                    <li class="nav-item px-lg-2 mb-md-0 mb-2">
                      <a class="nav-link py-2" data-toggle="tab" href="#home2">Our Vision</a>
                    </li>
                  </ul>
                  <div class="tab-content bg-light rounded mt-2">
                    <div class="tab-pane container p-5 active" id="home1">
                      <p>“S.Corps aims to provide solutions to satisfy the needs of customers by ensuring that their
                        products are of outstanding quality, environmentally-friendly, and offer value for money within
                        a short span of time.”</p>
                    </div>
                    <div class="tab-pane container p-5 fade" id="home2">
                      <p>“S.Corps aspires to be a nationally-recognized, leading provider of innovative products,
                        serving as a catalyst for the economic growth of local brands.”</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="whytara" class="section-padding">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center ">
          <div class="col-md-6 ">
            <h3 class="user-title">
              Did you know?
            </h3>
            <p>
              that in buying our tote bags, 5% of our total gross profit will be alloted to purchase school supplies for
              the indegenous children in Sagada, Mountain Province. Since the TARA! Tote Bags aims to help students
              organize their items, we would want to reach out to those who have no school supplies to begin with.
            </p>
          </div>
          <div class="col-md-6 ">
            <div class="text-center">
              <img alt="" class="img-fluid" src="assets/img/about us/about2.png">
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="about" class="about">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center ">
          <div class="col-lg-6">
            <img src="assets/img/aboutus.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6">
            <h3 class="user-title">Why Tara?</h3>
            <p>
              In the native language of Filipino. "Tara!" is an expression used when one desires to venture to a
              place.
            </p>
            <p>
              In this context, the Tara! Tote Bag aims to be your go-tote bag that one can use and bring to any place
              that he or she desires.
            </p>

            <div class="skills-content">
              <div class="progress">
                <span class="skill">Quality: <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100">
                  </div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">Color: <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                    aria-valuemax="100">
                  </div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">Use: <i class="val">98%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0"
                    aria-valuemax="100">
                  </div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">Price: <i class="val">88%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0"
                    aria-valuemax="100">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="counts section-bg">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-handbag"></i>
              <span data-purecounter-start="0" data-purecounter-end="2000" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong> Tara tote bags were sold </strong> </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-chat-square-text"></i>
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Reviews posted</strong></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-truck"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Bags shipped internationally</strong></p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Years in the making selling the best quality tote bags</strong></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="team" class="team">
      <div class="container">
        <div class="section-title">
          <div class="text-center">
            <h2>Our Team</h2>
          </div>
        </div>
        <div class="row  d-flex align-items-center justify-content-center ">
          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member">
              <img src="assets/img/team/team-img4.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Hannah Prado</h4>
                  <span>Chief Executive Officer</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member">
              <img src="assets/img/team/team-img1.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sophia Deverala</h4>
                  <span>Operations Department</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member">
              <img src="assets/img/team/team-img2.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Jay Baculi</h4>
                  <span>Marketing Department</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row  d-flex align-items-center justify-content-center ">
          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member">
              <img src="assets/img/team/team-img3.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Reila Diongzon</h4>
                  <span>Chief Technology Officer & Human Resources Manager</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div class="member">
              <img src="assets/img/team/team-img5.png" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Marcia Tuazon</h4>
                  <span>Finance Department</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

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
  <script src="assets/others/about us/js1/jquery.min.js"></script>
  <script src="assets/others/about us/js1/popper.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/others/about us/js1/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>