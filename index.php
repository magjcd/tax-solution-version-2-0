<?php ob_start(); ?>
<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>Dashboard - TaxSol </title>

  <meta content="" name="description">

  <meta content="" name="keywords">



  <!-- Favicons -->

  <link href="assets/img/favicon.png" rel="icon">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">



  <!-- Google Fonts -->

  <link href="https://fonts.gstatic.com" rel="preconnect">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



  <!-- Vendor CSS Files -->

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">

  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">

  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">



  <!-- Template Main CSS File -->

  <link href="assets/css/style.css" rel="stylesheet">



  <!-- CDNs added by ALI -->

  <script type="text/javascript" src="public/js/jquery-3.5.1.js"></script>

  <script type="text/javascript" src="public/js/myfunc.js"></script>

  <link rel="stylesheet" type="text/css" href="public/fontawesome/css/all.css">

  <link rel="stylesheet" type="text/css" href="public/css/style.css">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" href="./public/bootstrap-3.4.1/css/bootstrap.min.css">

  <script src="./public/ajax/libs/jquery/3_7_1/jquery.min.js"></script>

  <script src="./public/bootstrap-3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="public/fontawesome/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- =======================================================

  * Template Name: 

  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

  * Updated: Apr 20 2024 with Bootstrap v5.3.3

  * Author: BootstrapMade.com

  * License: https://bootstrapmade.com/license/

  ======================================================== -->

</head>



<body style="background-color: #000;">

  <?php

  // ini_set('display_errors', '1');
  // ini_set('display_startup_errors', '1');
  // error_reporting(E_ALL);
  session_start();

  include("autoLoad.php");

  date_default_timezone_set('Asia/Karachi');

  $ContObj = new Controller;

  if (count($_SESSION) == 0) {

    header('location: login');
  }

  ?>

  <!-- ======= Header ======= -->

  <?php require_once(__DIR__ . '/layout/top_navigation.php'); ?>

  <!-- End Heade-->



  <!-- ======= Sidebar ======= -->

  <?php require_once(__DIR__ . '/layout/side_navigation.php'); ?>

  <!-- End Sidebar-->



  <?php



  if (isset($_GET['page'])) {

    $page = $_GET['page'];

    $path = ('view/' . $page . '.php');

    if (file_exists($path)) {

      include($path);
    } else {

      echo "<p>No Page</p>" . $page;
    }
  } else {

  ?>

    <!-- ======= Dashboard ======= -->

    <?php

    require_once(__DIR__ . '/layout/dashboard.php');

    ?>

    <!-- End Dashboard-->

  <?php

  }

  ?>



  <!-- ======= Footer ======= -->

  <?php require_once(__DIR__ . '/layout/footer.php'); ?>

  <!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/vendor/chart.js/chart.umd.js"></script>

  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <script src="assets/vendor/quill/quill.js"></script>

  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <script src="assets/vendor/php-email-form/validate.js"></script>



  <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>

</body>

</html>
<?php
ob_end_flush();
?>