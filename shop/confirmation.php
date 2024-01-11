<?php
require_once '../config/function.php';

if (!isset($_SESSION['userId'])) {
    header('Location: ../auth/login.php');
}
if (!isset($_GET['orderId'])) {
    header('Location: ../user/profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Order Status</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="../assets/img/icon.jpg">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/css/ashion/style.css" type="text/css">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="../assets/css/style - confirmation.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
                    <li><a href="../shop.php" class="active">Shop</a></li>
                    <li><a href="../faqs.php">FAQs</a></li>
                    <li><a href="../help-center.php">Help Center</a></li>
                    <li class="dropdown">
                        <a href="#">
                            <span>Profile</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
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
        <section class="breadcrumb breadcrumb_bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="breadcrumb_iner">
                            <div class="breadcrumb_iner_item">
                                <div class="text-center">
                                    <h2>Order Status</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="confirmation_part padding_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-4">
                            <strong id="text-status"></strong>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="single_confirmation_details">
                            <h4>Order Information</h4>
                            <ul>
                                <li>
                                    <p>Order Number:</p>
                                    <div id="order-number" class="text-truncate"></div>
                                </li>
                                <li>
                                    <p>Date Ordered:</p>
                                    <div id="date-ordered"></div>
                                </li>
                                <li>
                                    <p>Total (no shipping fee added):</p>
                                    <div id="total-amount"></div>
                                </li>
                                <li>
                                    <p>Payment method:</p>
                                    <div id="payment-method"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-lx-4">
                        <div class="single_confirmation_details">
                            <h4>shipping Address</h4>
                            <ul>
                                <li>
                                    <p>Address</p>
                                    <div id="address" class="text-truncate"></div>
                                </li>
                                <li>
                                    <p>Barangay</p>
                                    <div id="barangay" class="text-truncate"></div>
                                </li>
                                <li>
                                    <p>City</p>
                                    <div id="city" class="text-truncate"></div>
                                </li>
                                <li>
                                    <p>Postal Code</p>
                                    <div id="postal-code" class="text-truncate"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="order_details_iner">
                            <h3>Order Details</h3>
                            <table class="table table-borderless text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="orders">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="fw-bold">Total Amount</th>
                                        <th id="order-total-amount"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
    <!-- Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Template Main JS File -->
    <script src="../assets/js/checkout/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/checkout/jquery-ui.js"></script>
    <script src="../assets/js/checkout/popper.min.js"></script>
    <script src="../assets/js/checkout/bootstrap.min.js"></script>
    <script src="../assets/js/utils.js"></script>
    <script src="../assets/js/orders.js"></script>
    <script src="../assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            var urlParams = getUrlParameters();
            var orderId = urlParams.orderId;

            getOrderDetails(orderId)
        });
    </script>
</body>

</html>