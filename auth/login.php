<?php
require_once '../config/function.php';

if (isset($_SESSION['userId'])) {
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="../assets/img/icon.jpg">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style - login.css" rel="stylesheet">
</head>

<body>
  <main id="main">
    <section>
      <div class="container">
        <div class="user signinBx">
          <div class="imgBx"><img src="../assets/img/login/loginpic.png" /></div>
          <div class="formBx">
            <form>
              <div id="response"></div>
              <h2>Sign In</h2>
              <input type="email" name="email" id="emailInput" placeholder="Email Address" required>
              <input type="password" name="password" id="passwordInput" placeholder="Password" required>
              <button type="button" onclick="login()">Login</button>
              <p class="signup">
                Don't have an account ?
                <a role="button" onclick="toggleForm();">Sign Up.</a>
              </p>
              <p class="forget-password">
                <a href="reset-password.php">Forget Password </a>
              </p>
            </form>
          </div>
        </div>
        <div class="user signupBx">
          <div class="formBx">
            <form>
              <h2>Create an account</h2>
              <div id="SignUpresponse">
              </div>
              <input type="text" name="firstnameSignUp" id="firstnameSignUp" placeholder="First Name" required />
              <input type="text" name="lastnameSignUp" id="lastnameSignUp" placeholder="Last Name" required />
              <input type="email" name="emailSignUp" id="emailSignUp" placeholder="Email Address" required />
              <input type="password" name="passwordSignUp" id="passwordSignUp" placeholder="Create Password" required />
              <input type="password" name="cpasswordSignUp" id="cpasswordSignUp" placeholder="Confirm Password"
                required />
              <button type="button" onclick="register()">Sign up</button>
              <p class="signup">
                Already have an account ?
                <a role="button" onclick="toggleForm();">Sign in.</a>
              </p>
            </form>
          </div>
          <div class="imgBx"><img src="../assets/img/login/signuppic.png" alt="" /></div>
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

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="../assets/js/login.js"></script>
</body>

</html>