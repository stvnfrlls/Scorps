<?php
require_once 'config/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SCORPS PH</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="assets/img/icon.jpg">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/boxicons/css/boxicons.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/ashion/style.css" type="text/css">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style="overflow-x: hidden">
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="assets/img/slide/1.png" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Tara na't<span> magbuy!</span></h2>
                                <a href="#shop"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/img/slide/2.png" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">it's what's on the inside that counts
                                </h2>
                                <a href="#shop"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/img/slide/5.png" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">check out the black <br>
                                    tara tote bag now! </h2>
                                <a href="#shop"
                                    class="btn-get-started animate__animated animate__fadeInUp scrollto">shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-background"><img src="assets/img/slide/4.png" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Did you know that <br>
                                    5% of our total gross profit will be <br>
                                    donated to the children who are in need</h2>
                                <a href="" class="btn-get-started animate__animated ">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="index.php"><img src="assets/img/logo-icon.png" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="about-us.php">About Us</a></li>
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
        <section id="about" class="about">
            <div class="container">
                <div class="section-title">
                    <h2>About Us</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/img/aboutus.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>Why Tara?</h3>
                        <p>
                            In the native language of Filipino. "Tara!" is an expression used when one desires to
                            venture to a place.
                        </p>
                        <p>
                            In this context, the Tara! Tote Bag aims to be your go-tote bag that one can use and bring
                            to any place that he or she desires.
                        </p>
                        <div class="skills-content">
                            <div class="progress">
                                <span class="skill">Quality: <i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress">
                                <span class="skill">Color: <i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress">
                                <span class="skill">Use: <i class="val">98%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="progress">
                                <span class="skill">Price: <i class="val">88%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0"
                                        aria-valuemax="100"></div>
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
        <section class="totebagfeatures section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>TARA Tote Bag Features</h2>
                    <div class="card-body">
                        <div class="card-body">
                            <img src="assets/img/totebaginterior.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="card-body">
                            <p class="card-text">A 2-in-1 tote bag with organizer, is made out of synthetic leather and
                                is water-repellent, scratch-proof, and locally-made.</p>
                        </div>
                        <div class="card-body">
                            <a href="shop.php" class="btn">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="shop" class="more-services section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>OUR BEST SELLING TARA TOTE BAGS</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="card">
                                <img src="assets/img/feature bags/1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="cappucino-tote-bag.php">Cappucino Tara Tote Bag <br>
                                            ₱779.00<br></a></h5>
                                    <a href="cappucino-tote-bag.php" class="btn">buy now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="card">
                                <img src="assets/img/feature bags/2.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="ivory-tote-bag.php">Ivory Tara Tote Bag
                                            <br> ₱749.00 <br></a></h5>
                                    <a href="ivory-tote-bag.php" class="btn">buy now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="card">
                                <img src="assets/img/feature bags/3.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="black-tote-bag.php">Black Tara Tote Bag
                                            <br> ₱749.00 <br> </a></h5>
                                    <a href="black-tote-bag.php" class="btn">buy now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta">
            <div class="container">
                <div class="text-center">
                    <a class="cta-btn" href="shop.php">See More Products</a>
                </div>
            </div>
        </section>
        <section class="info-box py-0">
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                        <div class="content">
                            <h3><strong>Frequently Asked Questions</strong></h3>
                        </div>
                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1"><span>01</span> How much is the TARA! Tote
                                        bag? <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            For the regular TARA!, each costs PHP699. The limited edition ones are
                                            priced at PHP749 ea.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed"><span>02</span> Is the bag unisex? <i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Yes!
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed"><span>03</span> Do you ship to Cebu or Davao? <i
                                            class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Yes! We ship domestically through JRS Express(for now). The shipping rates
                                            are as follows: Metro Manila - Php238/unit, Luzon - Php266/unit, Visayas -
                                            Php293/unit, Mindanao - Php306/unit.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center">
                                <a href="faqs.php"><button type="button" class="btn">see more</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style="background-image: url(assets/img/faqs.png);">&nbsp;</div>
                </div>
            </div>
        </section>
        <section id="testimonials" class="section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>highlighted reviews</h2>
                </div>

                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/highlightedreviews/1.png" class="testimonial-img" alt="">
                                <h3>Rafael Gonzales</h3>
                                <h4>Student</h4>
                                <p>
                                    Sobrang talaga ko na gusting bilhin ang bag na 'to. Super worth it!
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/highlightedreviews/2.png" class="testimonial-img" alt="">
                                <h3>Ara Magallanes</h3>
                                <h4>Student</h4>
                                <p>
                                    I really like the style bec it will fit on any outfit that you will wear, super
                                    recommended the black tara tote bag!
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/highlightedreviews/3.png" class="testimonial-img" alt="">
                                <h3>Antonette Garcia</h3>
                                <h4>Influencer</h4>
                                <p>
                                    Been eyeing this bag since last year and I finally got it! It's really pretty and
                                    I'm in love with the design and the compartments included.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/highlightedreviews/4.png" class="testimonial-img" alt="">
                                <h3>Matthew Agapito</h3>
                                <h4>Freelancer</h4>
                                <p>
                                    best purchase so far, the bag is vv nice,,, love how it has multiple compartments :D
                                    quality is superb!! will order again from this shop.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
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
                            <li><i class="bx bx-chevron-right"></i> <a href="featured-products.php">Featured
                                    Products</a></li>
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