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
	<h1 style="margin-top: 70px">Sales Report</h1>
<br>
	<table class="table table-striped" style="width:1450px">
		<tr>
			<th>Sl no.</th>
      <th>Bill.No</th>
         <th>Category</th>
         <th>Customer Name</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>Date</th>
                
        
		</tr>
		<?php 
    $gg=rand();
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
          $q="select *,`tbl_mastcart`.`cart_status`as ostatus from `tbl_order` inner join `tbl_mastcart`using(`mastcart_id`) inner join `tbl_childcart`using(`mastcart_id`) inner join `tbl_book`using(`Book_Id`) inner join `tbl_subcategory` using(`Subcat_Id`) inner join `tbl_category`using(`Cat_Id`) inner join `tbl_customer`on `tbl_customer`.`Cust_Id`=`tbl_mastcart`.`Cust_Id` where Payment_Date='$daily' and tbl_mastcart.cart_status!='Pending'";
           }
            else if ($monthly!="") {

            
             $q="select *,`tbl_mastcart`.`cart_status`as ostatus from `tbl_order` inner join `tbl_mastcart`using(`mastcart_id`) inner join `tbl_childcart`using(`mastcart_id`) inner join `tbl_book`using(`Book_Id`) inner join `tbl_subcategory` using(`Subcat_Id`) inner join `tbl_category`using(`Cat_Id`) inner join `tbl_customer`on `tbl_customer`.`Cust_Id`=`tbl_mastcart`.`Cust_Id`  where Payment_Date like '$monthly%' and tbl_mastcart.`cart_status`!='Pending'";

             }

              else if ($customer!="") {

            
             $q="select *,`tbl_mastcart`.`cart_status`as ostatus from `tbl_order` inner join `tbl_mastcart`using(`mastcart_id`) inner join `tbl_childcart`using(`mastcart_id`) inner join `tbl_book`using(`Book_Id`) inner join `tbl_subcategory` using(`Subcat_Id`) inner join `tbl_category`using(`Cat_Id`) inner join `tbl_customer`on `tbl_customer`.`Cust_Id`=`tbl_mastcart`.`Cust_Id` where C_Fname like '$customer%' and tbl_mastcart.`cart_status`!='Pending'";

             }
           }
             else{
             $q="select *,`tbl_mastcart`.`cart_status`as ostatus from `tbl_order` inner join `tbl_mastcart`using(`mastcart_id`) inner join `tbl_childcart`using(`mastcart_id`) inner join `tbl_book`using(`Book_Id`) inner join `tbl_subcategory` using(`Subcat_Id`) inner join `tbl_category`using(`Cat_Id`) inner join `tbl_customer`on `tbl_customer`.`Cust_Id`=`tbl_mastcart`.`Cust_Id`where `tbl_mastcart`.`cart_status`!='Pending'
";
            }
          

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $slno=1;
       foreach ($res as $row) {


        $qty=$row['quantity'];
        $cost=$row['tot_amount'];

        $tot=$qty*$cost;
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	<td><?php echo $gg++ ?></td>
    
        <td><?php echo $row['Cat_Name']; ?></td>
        <td><?php echo $row['C_Fname']; ?> <?php echo $row['C_Lname']; ?></td>
        <td><?php echo $row['Book_Title']; ?></td>
        <td><?php echo $row['quantity'] ?></td>
        <td><?php echo $row['tot_amount'] ?></td>
        <td><?php echo $row['order_date'] ?></td>
       
    </tr>
  
     <?php
       }


		 ?>
	</table>
</center>
<br><br><br>
<a class="btn btn-danger" style="margin-left: 1300px;" href="sales.php">PRINT</a>

