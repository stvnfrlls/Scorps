<?php
require_once '../config/function.php';
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
    <link rel="icon" href="../assets/img/icon.jpg">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/others/products/css/karma/main.css">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body style="overflow-x: hidden">
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="../index.php"><img src="../assets/img/logo-icon.png" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../about-us.php">About Us</a></li>
                    <li><a class="active" href="../shop.php">Shop</a>
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
                            <li><a href="../user/cart.php">View Cart</a></li>
                            <li><a href="../user/profile.php">View Account</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <main id="main">
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">
                        <div class="portfolio-details-slider swiper-container">
                            <div class="align-items-center">
                                <div class="prod-img">
                                    <img id="productImage" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <form>
                                <input type="hidden" name="prod_name" value="Black Tara Tote Bag">
                                <input type="hidden" name="prod_price" value="749">
                                <div class="product-details">
                                    <h3 id="productName"></h3>
                                    <h2 id="productPrice"></h2>

                                    <div class="availability my-2 d-flex align-items-center">
                                        <div class="fw-bold me-1">In Stock: </div>
                                        <div id="inStock"></div>
                                    </div>

                                    <ul class="product-features">
                                        <li>- Synthetic leather material</li>
                                        <li>- Water repellent</li>
                                        <li>- Scratch-proof</li>
                                        <li>- Locally made</li>
                                        <li>- Dimensions: 11 in x 3 in x 14 in</li>
                                    </ul>
                                </div>
                                <div class="product__details__button my-2">
                                    <div class="quantity mb-0">
                                        <span>Quantity:</span>
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="qty" id="itemQty">
                                        </div>
                                    </div>
                                </div>
                                <div class="card_area d-flex align-items-center" id="buttonContainer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="product_description_area">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description-pane" type="button" role="tab" aria-controls="description-pane"
                            aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="reminders-tab" data-bs-toggle="tab" data-bs-target="#reminders-pane"
                            type="button" role="tab" aria-controls="reminders-pane" aria-selected="false">Reminders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-pane"
                            type="button" role="tab" aria-controls="reviews-pane" aria-selected="false">Reviews</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description-pane" role="tabpanel"
                        aria-labelledby="description-pane">
                        <h4>Durability</h4>
                        <p>The bag can only carry five kilograms of mass; exceeding this limit may result in damage. The
                            tote bag is durable and scratch-proof; however, it also has its weaknesses if not taken care
                            of, like any other product.</p>

                        <h4>Size</h4>
                        <p>A laptop compartment has been added to the bag to address users' concerns about the safety of
                            their laptops. However, this is limited to 13-inch laptops and below.</p>

                        <h4>Cleaning</h4>
                        <p>The exterior of the product is made of leather. It is water-repellent, meaning it can
                            withstand a certain level of water flow. Cleaning should be done by dusting or wiping; hand
                            wash and machine wash are highly discouraged.</p>

                        <h4>Product Liability</h4>
                        <p>The business has established an exchange policy within seven days after purchase. However,
                            S.Corps only considers defects present prior to purchase and is not held liable for damages
                            caused by external factors affecting the product.</p>

                        <h4>Disclaimer</h4>
                        <ul>
                            <li>Actual shade may vary from the pictures posted.</li>
                            <li>The material used for all bags is synthetic leather, but the texture may vary.</li>
                            <li>The bag can only carry three (3) kilograms of weight; exceeding this limit may result in
                                damage.</li>
                            <li>The bag is water-repellent, meaning it can withstand a certain level of water.</li>
                            <li>It is advisable to dust or wipe the product for cleaning. Hand-wash and machine-wash are
                                highly discouraged.</li>
                            <li>Pre-order form may close without prior notice.</li>
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="reminders-pane" role="tabpanel" aria-labelledby="reminders-pane">
                        <ul>
                            <li>Strictly NO CANCELLATION of orders.</li>
                            <li>Check your email for your order confirmation and payment instructions. You will receive
                                this within five (5) days.</li>
                            <li>Pre-orders take about 4 to 6 weeks for production.</li>
                            <li>A down payment of 50% for pre-orders should be paid to secure reservations.</li>
                            <li>Customers must pay in full before the product is shipped. No Cash-on-Delivery.</li>
                            <li>Additional fees such as remittance and shipping fees shall be shouldered by the
                                customer.</li>
                            <li>Orders are handed over to our chosen courier every Saturday.</li>
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="reviews-pane" role="tabpanel" aria-labelledby="reviews-pane">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row total_rate">
                                    <div class="col-4">
                                        <div class="box_total">
                                            <h5>Overall</h5>
                                            <h4>0</h4>
                                            <h6>0</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="rating_list">
                                            <h3>Based on 0</h3>
                                            <ul class="list">
                                                <li>
                                                    <a href="">
                                                        5 Star
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="">
                                                        4 Star
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="">
                                                        3 Star
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="">
                                                        2 Star
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="">
                                                        1 Star
                                                        <i class="bi bi-star-fill" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                        <i class="bi bi-star" style="color:#C58B8B"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="review_list">
                                            <div class="review_item">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4>NAME</h4>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique
                                                    aut quia
                                                    officiis quae tempora reiciendis id minima? Perferendis ipsa tempore
                                                    fugit
                                                    iure repellendus accusantium impedit!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="review_box">
                                            <h4>Add a Review</h4>
                                            <p>Your Rating:</p>
                                            <ul class="list">
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                            <p>Outstanding</p>
                                            <form class="row contact_form" id="contactForm">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Your Full name" onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Your Full name'">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Email Address" onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Email Address'">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="number"
                                                            name="number" placeholder="Phone Number"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Phone Number'">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" id="message"
                                                            rows="1" placeholder="Review"
                                                            onfocus="this.placeholder = ''"
                                                            onblur="this.placeholder = 'Review'"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" value="submit" class="primary-btn"
                                                        style="background-color: #C58B8B">Submit Now</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Karma JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>

    <!-- ashion Js Plugins -->
    <script src="../assets/js/ashion/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/ashion/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/ashion/jquery.countdown.min.js"></script>
    <script src="../assets/js/ashion/jquery-ui.min.js"></script>
    <script src="../assets/js/ashion/jquery.slicknav.js"></script>
    <script src="../assets/js/ashion/owl.carousel.min.js"></script>
    <script src="../assets/js/ashion/jquery.nicescroll.min.js"></script>
    <script src="../assets/js/ashion/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/utils.js"></script>
    <script src="../assets/js/products.js"></script>
    <script src="../assets/js/cart.js"></script>
    <script>
        var userId = <?php echo json_encode($_SESSION['userId']); ?>;

        $(document).ready(function () {
            var urlParams = getUrlParameters();
            var productId = urlParams.product_id;

            getProductDetails(productId);
        });
    </script>
</body>

</html>