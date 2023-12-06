<?php include 'connection.php';
extract($_GET);
$cid=$_SESSION['Cust_id'];
?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>book store</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_new/img/favicon.png" rel="icon">
  <link href="assets_new/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_new/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_new/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_new/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_new/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_new/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_new/css/main.css" rel="stylesheet">
  <style>

  /* Style for the search button */
  .btn-search {
    background-color: brown;
    color: white;
    transition: background-color 0.3s ease; /* Smooth transition effect */
  }

  /* Style for the search button on hover */
  .btn-search:hover {
    background-color:#dec05f; /* Change to your desired hover color */
    color: white; /* Change to your desired hover text color */
  }

  /* Style for the navbar */
  #header {
    background-color: black;
  }

  /* Style for the links in the navbar */
  #navbar ul li a {
    color: white; /* Set the link color to white or any other color you prefer */
  }
    <!-- Custom CSS -->
    /* Style for the navbar */
    #header {
      background-color: black;
    }
    
#header {
    background: rgba(0, 0, 0, 0.5); /* Set the background color to black with 50% opacity */
  }
    /* Style for the links in the navbar */
    #navbar ul li a {
      color: white; /* Set the link color to white or any other color you prefer */
    }

    /* Style for the heading "THE BOOKSPOT" */
    #header h1 {
      color: white; /* Set the heading color to white */
    }
  </style>
</head>

  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>THE BOOKSPOT<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="loggedinindex.php">HOME</a></li>
          <li><a href="customer_view_cart.php">MY CART</a></li>
          <li><a href="customer_myorders.php">ORDERS</a></li>
          <li><a href="my_profile.php">MY PROFILE</a></li>
          <li><a href="homepage.php">LOGOUT</a></li>
          
        </ul>
      </nav><!-- .navbar -->

     
    </div>
  </header><!-- End Header -->