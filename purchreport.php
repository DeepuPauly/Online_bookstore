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
	<h1 style="margin-top: 70px">Pruchase Report</h1>
<br>
	<table class="table table-striped" style="width:1450px">
		<tr>
			<th>Sl no.</th>
          <th>Item Name</th>
                <th>Vendor Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Selling Price</th>
                <th>Purchase Date</th>
         
    </tr>   
        
		
<?php 
  $d="SELECT * FROM `tbl_purchild`INNER JOIN `tbl_purmaster` USING (`Pm_Id`) INNER JOIN `tbl_book` USING (`Book_Id`) INNER JOIN `tbl_vendor` USING (`Vendor_id`)";
  $res=select($d);
  
$slno=1;
foreach ($res as $row) {
 

 ?>

    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    
        
                    <td><?php echo $row['Book_Title']; ?></td>
                    <td><?php echo $row['Vendor_name']; ?></td>
                    <td><?php echo $row['Purch_quantity']; ?></td>
                    <td><?php echo $row['Cost_Price']; ?></td>
                    <td><?php echo $row['Selling_price']; ?></td>
                    <td><?php echo $row['Pm_Date']; ?></td>
        

       
    </tr>
  
     <?php
       }


		 ?>
	</table>
</center>
<a style="margin-left: 1300px" href="purch.php"><input type="button" class="btn btn-danger" value="Print"></a>
<br>
<br>
