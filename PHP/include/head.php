<?php include 'db.php';
if(!isset($_SESSION['id'])){
    header('location: logout.php');
}
//if the session exist we take the user info
$currentUser = $db->prepare('SELECT * FROM users WHERE id = ?');
$currentUser->execute(array($_SESSION['id']));
$cu = $currentUser->fetch();
$ut = array('Student', 'Teacher', 'Administrator');
$PT = isset($PT) ? $PT : 'GodSMS';
$PH = isset($PH) ? $PH : '';
$_SESSION['t'] = $cu['usertype'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $PT; ?></title>
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
      <div class="page form-page">
          <?php include './PHP/include/header.php'; ?>
          <div class="page-content d-flex align-items-stretch">
              <?php include './PHP/include/'. $ut[$cu['usertype'] - 1]. '.menu.php'; ?>
              <div class="content-inner">
                  <!-- Page Header-->
                  <header class="page-header">
                    <div class="container-fluid">
                      <h2 class="no-margin-bottom"><?php echo $PH; ?></h2>
                    </div>
                  </header>
