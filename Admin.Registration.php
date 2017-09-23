<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bootstrap Dashboard by Bootstrapious.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/timetablejs.css">
  <link rel="stylesheet" href="css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Font Awesome CDN-->
  <!-- you can replace it by local Font Awesome-->
  <link rel="stylesheet" href="Css/fa47/css/font-awesome.css" id="theme-stylesheet">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
  <body>
      <div class="alert-list">
          <?php include 'PHP/Script/Admin.Registration.php'; ?>
      </div>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Registration</h1>
                  </div>
                  <p>After the registration the database will be created with the name <mark>&quot;GodSMS&quot;</mark> and you will be redirected to the admin dashboard</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="register-form" method="post" action="Admin.Registration.php">
                    <div class="form-group">
                      <input id="register-username" type="text" name="fn" <?php if ($hasVal): ?> value="<?php echo $_POST['fn']; ?>" <?php endif; ?>required class="input-material">
                      <label for="register-username" class="label-material">FullName</label>
                    </div>
                    <div class="form-group">
                      <input id="register-pass" type="password" name="ps" <?php if ($hasVal): ?> value="<?php echo $_POST['ps']; ?>" <?php endif; ?>required class="input-material">
                      <label for="register-pass" class="label-material">Password</label>
                    </div>
                    <div class="form-group">
                      <input id="register-confi" type="password" name="cn" <?php if ($hasVal): ?> value="<?php echo $_POST['cn']; ?>" <?php endif; ?>required class="input-material">
                      <label for="register-confi" class="label-material">Confirm password</label>
                    </div>
                    <input id="register" type="submit" value="Register" name="Register" class="btn btn-primary">
                </form><small>Already have an account? </small><a href="./" class="signup">Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>
