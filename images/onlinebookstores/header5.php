<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/** {
  box-sizing: border-box;
}*/

body {
  background-color: black;
  padding: 20px;
  font-family: Arial;
  background: url(log.jpg);
}

/* Center website */
.main {
  max-width: 1000px;
  margin: 4em;
  margin-top: 5em;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: black;
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}
.add-to-cart-btn {
    background-color: white;
    color: black;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

.add-to-cart-btn:hover {
    background-color: green;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}



</style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Book Store</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 <link rel="stylesheet" type="text/css" href="styles.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 


  <!-- Template Main CSS File -->
   <link href="assets/css/style.css" rel="stylesheet">

  
</head>

<body>
<!-- Portfolio Gallery Grid -->
<div class="row">
  <div class="column nature">
    <div class="content">
      <center><img src="images/g1.jpg" alt="Mountains" style=""></center>
      <p>₹250</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g2.jpg" alt="Lights" style=""></center>
      <p>₹696.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g3.jpg" alt="Nature" style=""></center>
      <p>₹1,766.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  
  <div class="column cars">
    <div class="content">
      <center><img src="images/g4.jpg" alt="Car" style=""></center>
      <p>₹385.00</p>
       <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
    <center><img src="images/g5.jpg" alt="Car" style=""></center>
      <p>₹77.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column cars">
    <div class="content">
    <center><img src="images/g6.jpg" alt="Car" style=""></center>
       <p>₹359.00</p>
       <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>

  <div class="column people">
    <div class="content">
      <center><img src="images/g7.jpg" alt="Car" style=""></center>
      <p>₹1,911.00</p>
       <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <center><img src="images/g8.jpg" alt="Car" style=""></center>
      <p>₹1,552.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column people">
    <div class="content">
    <center><img src="images/g9.jpg" alt="Car" style=""></center>
      <p>₹937.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g11.jpg" alt="Lights" style=""></center>
      <p>₹1,260.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g12.jpg" alt="Lights" style=""></center>
      <p>₹250.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
 
  <div class="column nature">
    <div class="content">
    <center><img src="images/g13.jpg" alt="Lights" style=""></center>
      <p>₹800.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g14.jpg" alt="Lights" style=""></center>
      <p>₹299.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g15.jpg" alt="Lights" style=""></center>
      <p>₹511.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g16.jpg" alt="Lights" style=""></center>
      <p>₹158.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g17.jpg" alt="Lights" style=""></center>
      <p>₹494.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g18.jpg" alt="Lights" style=""></center>
      <p>₹5,080.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g19.jpg" alt="Lights" style=""></center>
      <p>₹1,139.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g20.jpg" alt="Lights" style=""></center>
      <p>₹200.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g21.jpg" alt="Lights" style=""></center>
      <p>₹359.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>
  <div class="column nature">
    <div class="content">
    <center><img src="images/g22.jpg" alt="Lights" style=""></center>
      <p>₹283.00</p>
      <button class="add-to-cart-btn" data-price="1199.00">Add to Cart</button>
    </div>
  </div>

   
<!-- END GRID -->
</div>

<!-- END MAIN -->
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

<!--       <h1 class="logo me-auto me-lg-0"><a href="index.html">The Book Spot</a></h1>
 -->      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <div class="navbar" id="navbar" >
    <h1 class="logo me-auto me-lg-0"><a href="index.html">The Book Spot</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    <nav id="navbar" class="navbar order-last order-lg-0" style="margin-left:20em">
        <ul>
            <li><a class="nav-link scrollto active" href="homepage.php">Home</a></li>
       
           
            <li><a class="nav-link scrollto" href="login1.php">Login</a></li>

            <li><a class="nav-link scrollto" href="login1.php">SignUp</a></li>
            
         
        <li><a class="nav-link scrollto" href="books.php">Books</a></li><form action="/search" method="GET">  
     <input type="text" name="q" placeholder="Search...">  
      <input type="submit" value="Search">  
 </form>  

            <li><a class="fa fa-shopping-cart" style="font-size:24px" href="cart.php"></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
</div>


  </header><!-- End Header -->
<style type="text/css">
  
/* CSS for the fixed navigation bar */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Adjust the background color and opacity as needed */
    z-index: 1000; /* Set a high z-index value to ensure it overlaps other content */
    padding: 10px 0; /* Add padding to improve visibility */
    transition: background-color 0.3s; /* Add a smooth transition effect for background color */
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Style the logo */
.logo a {
    color: white;
    text-decoration: none;
    font-size: 24px; /* Adjust the font size as needed */
}

/* Adjust the styles for the links inside the navigation bar */
.navbar ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

.navbar ul li {
    margin-right: 20px; /* Adjust the margin between links as needed */
}

.navbar a {
    color: white;
    text-decoration: none;
    font-size: 16px; /* Adjust the font size as needed */
}

/* Update the styles when the user scrolls */
.navbar.scrolled {
    background-color: rgba(0, 0, 0, 0.9); /* Change the background color when scrolled */
    padding: 5px 0; /* Adjust the padding when scrolled */
}


</style>