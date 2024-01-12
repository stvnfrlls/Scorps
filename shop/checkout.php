<?php
require_once '../config/function.php';

if (!isset($_SESSION['userId'])) {
    header('Location: ../auth/login.php');
}
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    echo '<script>var userId = ' . json_encode($userId) . ';</script>';
} else {
    echo '<script>var userId = null;</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Checkout Scorps</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="../assets/img/icon.jpg">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style - checkout.css" rel="stylesheet">
</head>

<body style="overflow-x: hidden">
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="index.php"><img src="../assets/img/logo-icon.png" alt="" class="img-fluid"></a>
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
                    <div class="col-lg-8">
                        <div class="breadcrumb_iner">
                            <div class="breadcrumb_iner_item">
                                <div class="text-center">
                                    <h2>Product Checkout</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="checkout_area padding_top">
            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <h2 class="h3 mb-3 text-black">Billing Details</h2>
                            <div class="p-3 p-lg-5 border">
                                <div class="form-group row mb-1">
                                    <div class="col-md-6">
                                        <label for="first_name" class="text-black">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="text-black">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>

                                <div class="form-group row mb-1">
                                    <div class="col-md-12">
                                        <label for="address" class="text-black">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>

                                <div class="form-group row mb-1">
                                    <div class="col-md-12">
                                        <label for="city_municipality" class="text-black">City or
                                            Municipality <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city_municipality"
                                            name="city_municipality">
                                    </div>
                                </div>

                                <div class="form-group row mb-1">
                                    <div class="col-md-6">
                                        <label for="province" class="text-black">Province <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="province" name="province">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="postal_zip" class="text-black">Postal / Zip <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="postal_zip" name="postal_zip">
                                    </div>
                                </div>

                                <div class="form-group row mb-1">
                                    <div class="col-md-6">
                                        <label for="email" class="text-black">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact" class="text-black">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="contact" name="contact">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <h2 class="h3 mb-3 text-black">Your Order</h2>
                                    <div class="p-3 p-lg-5 border">
                                        <table class="table text-center site-block-order-table mb-5">
                                            <thead>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody id="cart"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3" class="fw-bolder">Total Price</td>
                                                    <td id="cartTotal"></td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <div class="border p-3 mb-3">
                                            <h3 class="h6 mb-0">
                                                <a class="d-block" data-toggle="collapse" href="#collapsebank"
                                                    role="button" aria-expanded="false" aria-controls="collapsebank">
                                                    Pay via GCASH
                                                </a>
                                            </h3>
                                            <div class="collapse" id="collapsebank">
                                                <div class="py-2">
                                                    <p class="mb-0">
                                                        Make your payment directly into our bank account. Please use
                                                        your Order ID as the payment reference. Your order won’t be
                                                        shipped until the funds have cleared in our account.
                                                    </p>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary" name="gcash_pmthd"
                                                        onclick="checkout()">Place Order via GCASH Money
                                                        Transfer</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border p-3 mb-3">
                                            <h3 class="h6 mb-0">
                                                <a class="d-block" data-toggle="collapse" href="#collapsecheque"
                                                    role="button" aria-expanded="false" aria-controls="collapsecheque">
                                                    Pay via BDO Bank Transfer
                                                </a>
                                            </h3>
                                            <div class="collapse" id="collapsecheque">
                                                <div class="py-2">
                                                    <p class="mb-0">
                                                        Make your payment directly into our bank account. Please use
                                                        your Order ID as the payment reference. Your order won’t be
                                                        shipped until the funds have cleared in our account.
                                                    </p>
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-primary" name="BDO_pmthd"
                                                            onclick="checkout()">Place Order via BDO Bank
                                                            Transfer</button>
                                                    </div>
                                                </div>
                                            </div>
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
                            <strong>Phone:</strong> 09164388363<br>
                            <strong>Email:</strong> <a href="mailto:scorpsph@gmail.com">scorpsph@gmail.com</a>
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
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Pre-order Form</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Get the latest updates about our new products and news related to our store!</p>
                        <form action="" method="post">
                            <input type="email" name="email" required>
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Scorps PH</span></strong>.<br>All Rights Reserved 2021.
            </div>
        </div>
    </footer>

    <!-- Template Main JS File -->
    <script src="../assets/js/checkout/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/checkout/jquery-ui.js"></script>
    <script src="../assets/js/checkout/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/checkout/bootstrap.min.js"></script>
    <script src="../assets/js/checkout.js"></script>

    <script>
        $(document).ready(function () {
            displayCartData();
            getUserProfile(userId);
        });

        $(window).on('beforeunload', function () {
            revertToCart();
        });
        function getUserProfile(userId) {
            $.ajax({
                type: "POST",
                url: "../config/request/getUserDetails.php",
                dataType: "json",
                data: {
                    userId: userId
                },
                success: function (response) {
                    var userDetails = response.data;

                    $('#first_name').empty().val(userDetails[0].first_name);
                    $('#last_name').empty().val(userDetails[0].last_name);
                    $('#address').empty().val(userDetails[0].home);
                    $('#city_municipality').empty().val(userDetails[0].city);
                    $('#province').empty().val(userDetails[0].state);
                    $('#postal_zip').empty().val(userDetails[0].postal);
                    $('#email').empty().val(userDetails[0].email);
                    $('#contact').empty().val(userDetails[0].contact_no);
                },
                error: function (error) {
                    console.log("Error:", error);
                },
            });
        }
    </script>
</body>

</html>