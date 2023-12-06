<?php include 'connection.php';
extract($_GET);
 $r=$_SESSION['res'];

 ?>
  <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online book store</title>
    <!-- Template CSS Style link -->

    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">

<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script>
  </head> 
<body onload="printDiv()">
  <div id="div_print" >
<center>
  
<h1 style="padding-top: 30px;font-size: 60px">Customer Report</h1>
</center>
<br>
<br>
 <h2  style="margin-left: 30px;" class="logo me-auto me-lg-0" ><span style="position: relative;top: 17px;color:black;">THE BOOKSPOT</span><br><br>
     <!--  <span style="color: #FFC541; font-family: Freestyle Script Regular;font-size: 23px ;;">time will explain.</span></h2> -->

<h5 style="margin-left: 30px;">Rajagiri Valley, Kakkanad</h5>
<h5 style="margin-left: 30px;">Kerala</h5>
<h5 style="margin-left: 30px;">Phone: +91 9893747386</h5>
<h5 style="margin-left: 30px;">Email: thebookspot@gmail.com</h5>

<br>
<center>
<!-- <h1>View Sales</h1> -->
<table class="table" style="width: 1300px">
		<tr >
	
         <th>Username</th>
         <th>Customer Name</th>
        <th>Address</th>
        <th>City</th>
        <th>District</th>
        <th>Street</th>
         <th>Pincode</th> 
         <th>Phone</th>  
         <th>DOB</th>
         <th>Gender</th>   
        
        
		</tr>
    <tr >
    
    <?php 
  $d="select * from `tbl_customer`";
  $res=select($d);
  
$slno=1;
foreach ($res as $row) {
 

 ?>

   
     <tr>
      <td><?php echo $slno++; ?></td>    
        
     <td><?php echo $row['Username']; ?></td>
        <td><?php echo $row['C_Fname']; ?> <?php echo $row['C_Lname']; ?></td>
        <td><?php echo $row['C_Address']; ?></td>
        <td><?php echo $row['C_City'] ?></td>
        <td><?php echo $row['C_Dist'] ?></td>
        <td><?php echo $row['C_Street'] ?></td>
        <td><?php echo $row['C_Pin'] ?></td>
        <td><?php echo $row['C_Phone'] ?></td>
           <td><?php echo $row['C_DOB'] ?></td>
           <td><?php echo $row['C_Gender'] ?></td>
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
</body>
</html>