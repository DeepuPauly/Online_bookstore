<?php include 'adminheader.php';
 
extract($_GET);



 ?>


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center" >
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">

<!-- <center>
  <h1>Search Sales</h1>
  <br>
  <br>
  <form method="post">
    <table  class="table table-striped" style="width: 250px">

  
       <td><input type="date" name="daily" class="form-control" id="inputCity" style="opacity: 0.7" ><center>Daily</center></td>
        <td><input type="month" name="monthly" class="form-control" id="inputCity" style="opacity: 0.7"><center>Monthly</center></td>
        <td><input type="text" name="customer" placeholder="Search Customer" class="form-control" id="inputCity" style="opacity: .7; width:240px" ></td>

     <tr>
       <td align="center" colspan="2"><input type="submit" name="sale" class="btn btn-secondary" value="View Report"></td>
       <td><a href="sales.php"><input type="button" class="btn btn-secondary" value="Print Report"></a></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>
 -->

</div>
      </div>
    </div>
  </section><!-- End Hero -->





<center>
	<h1 style="margin-top: 70px">Vendor Report</h1>
<br>
	<table class="table table-striped" style="width:1450px">
		<tr>
			<th>Sl no.</th>
         <th>Vendor Name</th>
         <th>Email ID</th>
          <th>Phone</th>  
        <th>City</th> 
         <th>Street</th>
        <th>District</th>
        <th>Pincode</th>
         
    </tr>   
        
		
<?php 
  $d="select * from `tbl_vendor`";
  $res=select($d);
  
$slno=1;
foreach ($res as $row) {
 

 ?>

    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    
        <td><?php echo $row['Vendor_name']; ?></td>
        <td><?php echo $row['vendor_email'] ?></td>
        <td><?php echo $row['V_Phno'] ?></td>
        <td><?php echo $row['V_City'] ?></td>
        <td><?php echo $row['V_Street'] ?></td>
        <td><?php echo $row['V_Dist'] ?></td>
        <td><?php echo $row['V_Pin'] ?></td>

       
    </tr>
  
     <?php
       }


		 ?>
	</table>
</center>
<a style="margin-left: 1300px" href="vendor.php"><input type="button" class="btn btn-danger" value="Print"></a>
<br>
<br>
