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

    <title>SCORPS PH - PROFILE</title>
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
                            <li><a href="cart.php">View Cart</a></li>
                            <li><a class="active" href="profile.php">View Account</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <div class="row m-5 justify-content-center">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5><strong>Account Details</strong></h5>
                        </div>
                    </div>
                    <div class="mt-3 row align-items-center">
                        <label for="email" class="col-sm-4 col-form-label text-end">Email Address</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="newPassword" class="col-sm-4 col-form-label text-end">New Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="newPassword">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary" id="updateAccountDetails"
                                onclick="updateAccount()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5><strong>Shipping Details</strong></h5>
                        </div>
                    </div>
                    <div class="mt-3 row align-items-center">
                        <label for="first_name" class="col-sm-4 col-form-label text-end">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="first_name">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="last_name" class="col-sm-4 col-form-label text-end">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="last_name">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="address" class="col-sm-4 col-form-label text-end">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="city_municipality" class="col-sm-4 col-form-label text-end">City or
                            Municipality</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city_municipality">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="province" class="col-sm-4 col-form-label text-end">Province</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="province">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="postal_zip" class="col-sm-4 col-form-label text-end">Postal / Zip</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="postal_zip">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="contact" class="col-sm-4 col-form-label text-end">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="contact">
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary" id="updateShippingDetails"
                                onclick="updateShipping()">Update</button>
                        </div>
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
                            <input type="email" name="email"><input type="Update" value="Subscribe">
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

</body>

<script src="../assets/js/ashion/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/profile.js"></script>

<script>
    $(document).ready(function () {
        var userId = <?php echo $_SESSION['userId'] ?>;
        getUserProfile(userId);
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

                $('#email').empty().val(userDetails[0].email);
                $('#first_name').empty().val(userDetails[0].first_name);
                $('#last_name').empty().val(userDetails[0].last_name);
                $('#address').empty().val(userDetails[0].home);
                $('#city_municipality').empty().val(userDetails[0].city);
                $('#province').empty().val(userDetails[0].state);
                $('#postal_zip').empty().val(userDetails[0].postal);
                $('#contact').empty().val(userDetails[0].contact_no);
            },
            error: function (error) {
                console.log("Error:", error);
            },
        });
    }

    function updateAccount() {
        var userId = <?php echo $_SESSION['userId'] ?>;
        Swal.fire({
            title: 'Enter your password',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            inputAttributes: {
                autocapitalize: 'off'
            },
            preConfirm: (password) => {
                return $.ajax({
                    url: '../config/request/verifyRequest.php',
                    type: 'POST',
                    data: {
                        userId: userId,
                        password: password
                    },
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed && result.value.success) {
                $.ajax({
                    url: '../config/request/updateAccount.php',
                    type: 'POST',
                    data: {
                        userId: userId,
                        email: $('#email').val(),
                        newPassword: $('#newPassword').val(),
                    },
                    success: function (response) {
                        if (response.success === true) {
                            Swal.fire('Success', 'Data updated successfully!', 'success');
                            getUserProfile(userId);
                        }
                    },
                    error: function (error) {
                        Swal.fire('Error', 'Failed to update data!', 'error');
                        getUserProfile(userId);
                    }
                });
            } else {
                Swal.fire('Error', 'Incorrect password. Please try again.', 'error');
                getUserProfile(userId);
            }
        });

    }

    function updateShipping() {
        var userId = <?php echo $_SESSION['userId'] ?>;
        Swal.fire({
            title: 'Enter your password',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            inputAttributes: {
                autocapitalize: 'off'
            },
            preConfirm: (password) => {
                return $.ajax({
                    url: '../config/request/verifyRequest.php',
                    type: 'POST',
                    data: {
                        userId: userId,
                        password: password
                    },
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed && result.value.success) {
                $.ajax({
                    url: '../config/request/updateAddress.php',
                    type: 'POST',
                    data: {
                        userId: userId,
                        first_name: $('#first_name').val(),
                        last_name: $('#last_name').val(),
                        address: $('#address').val(),
                        city_municipality: $('#city_municipality').val(),
                        province: $('#province').val(),
                        postal_zip: $('#postal_zip').val(),
                        contact: $('#contact').val()
                    },
                    success: function (response) {
                        Swal.fire('Success', 'Data updated successfully!', 'success');
                    },
                    error: function (error) {
                        Swal.fire('Error', 'Failed to update data!', 'error');
                    }
                });
            } else {
                Swal.fire('Error', 'Incorrect password. Please try again.', 'error');
            }
        });
    }
</script>

</html>