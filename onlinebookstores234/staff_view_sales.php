<?php include 'connection.php';

if (isset($_GET['cart_mid']))
{
   extract($_GET);
    echo$c="UPDATE `tbl_mastcart` SET `cart_status` ='Paid' WHERE `mastcart_id`='$cart_mid'";
   $d=update($c);
   echo$myq="UPDATE `tbl_courier`  SET `Cs_Status`='0' WHERE `Username`='$Username'";
   $myres=update($myq);
   $rr="delete from tbl_delivery where Delivery_Id='$deli'";
   delete($rr);
  echo$myqrr="UPDATE `tbl_login`  SET `Status`='0' WHERE `Username`='$Username'";
   $myresss=update($myqrr);
    alert('updated successfully');
    return redirect('staff_view_sales.php');

 }


?>


 

  <main id="main">


   
 <!-- ======= Team Section ======= -->

<section class="h-100 " style="background-color: black;">

   <!-- <h5 align="center"><a class="btn btn-danger" href="admin_manage_purchase.php">Sales Report</a></h5> -->
 <!--  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <center>
        <div class="card-header py-4"> -->

            <center><h1 style="font-size: 50px;">Sales Report</h1></center>
           <!--  <h3 style="margin-left: 1200px;">HOME</h3> -->
           <a class='btn btn-danger' style=" margin-left:1200px ;" href="admin1.php">HOME</a>
           <br><br>
           
         <!--  </div>
          </center>
      <div class="col-md-8">
        <div class="card mb-8"> -->
        
         
            <!-- Single item -->
             <table class="table" border="2">
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Book Title</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <!-- <th>Image</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
           
            <?php
               $q="SELECT *,tbl_mastcart.cart_status AS ostatus,`tbl_book`.`Book_Img` AS myimg FROM tbl_order INNER JOIN tbl_mastcart
USING(mastcart_id)
 INNER JOIN tbl_childcart USING (mastcart_id) INNER JOIN tbl_payment USING(`mastcart_Id`)
 INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(Subcat_Id) INNER JOIN `tbl_category`
  USING(`Cat_Id`) INNER JOIN tbl_customer ON tbl_mastcart.Cust_Id = tbl_customer.Cust_Id
 WHERE tbl_mastcart.cart_status !='Pending' ORDER BY added_date DESC";
                   $res1=select($q);
                   $myomif=$res1[0]['mastcart_id'];
                    if(sizeof($res1)>0){
                        $i=0;
                        foreach($res1 as $row){ 
                           echo "<tr>";
                            echo "<td>{$row['C_Fname']} {$row['C_Lname']}</td>";
                            echo "<td>{$row['Book_Title']}</td>";
                            echo "<td>{$row['Cat_Name']}</td>";
                            echo "<td>{$row['Subcat_Name']}</td>";
                            echo "<td>{$row['quantity']}</td>";
                            echo "<td>₹{$row['tot_amount']}</td>";
                             echo "<td>₹{$row['child_totamt']}</td>";
                            echo "<td>{$row['ostatus']}</td>";
                            echo "<td>";

                    if($row['ostatus']=="Paid"){ ?>
                        <p class="text-start text-md-center">
                        <strong><a class='btn btn-success' href="staff_assign_to_courier_service.php?cart_mid=<?php echo $row['mastcart_id']; ?>&Cust_Id=<?php echo $row['Cust_Id']; ?>&pay=<?php echo $row['Payment_Id'] ?>">Assign</a></strong>
                        </p>


               <?php    } else {
                ?>

                                               <?php
$myqry = "SELECT *,`tbl_courier`.`Username` AS mycourier FROM `tbl_courier` INNER JOIN `tbl_delivery` USING(`courier_id`)INNER JOIN `tbl_mastcart` ON `tbl_delivery`.`mastcart_id`=`tbl_mastcart`.`mastcart_id` INNER JOIN tbl_customer USING(Cust_Id) WHERE `tbl_mastcart`.`cart_status` ='Assigned To Courier' GROUP BY `tbl_delivery`.`mastcart_id`  ORDER BY `expected_date` DESC";
$myval = select($myqry);
$currentDate = date('Y-m-d'); // Get the current date
foreach($myval as $myrow){  
    if (date('Y-m-d', strtotime($myval[0]['expected_date'])) == $currentDate) {
        ?>
        <p class="text-start text-md-center">
            <strong><a class='btn btn-success' href="?cart_mid=<?php echo $myrow['mastcart_id']; ?>&deli=<?php echo $myrow['Delivery_Id'] ?>&Username=<?php echo $myrow['mycourier']; ?>&Cust_Id=<?php echo $myrow['Cust_Id']; ?>">Reassign</a></strong>
        </p>
        <?php
}
}
}
?> 

                       <!--  <div class="card-body">
                         <div class="row">
              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0"> -->
                <!-- Image -->
                <!-- <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                  <img src="<?php echo $row['myimg']; ?>"
                    class="w-100" alt="Blue Jeans Jacket " style="height: 250px;width: 250px;" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                  </a>
                </div> -->
                <!-- Image -->
             <!--  </div>

              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0"> -->
                <!-- Data -->
               <!--  <p><strong>Customer Name:<?php echo $row['C_Fname']; ?> <?php echo $row['C_Lname']; ?></strong></p>
                <p><strong><?php echo $row['Book_Title']; ?></strong></p>
                <p>Category: <?php echo $row['Cat_Name']; ?></p>
                <p>Sub Category: <?php echo $row['Subcat_Name']; ?></p> -->
                <!-- <a type="button" href="?remove_item=<?php echo $row['item_id']; ?>&cart_mid=<?php echo $row['cart_mid']; ?>&amount=<?php echo $row['amount']; ?>" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                title="Remove item">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a> -->
                <!-- <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                title="Move to the wish list">
                <i class="fas fa-heart"></i>
                </button> -->
                <!-- Data -->
              <!-- </div>

              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"> -->
                <!-- Quantity -->
             <!--    <form action="" method="post">
                <div class="d-flex mb-4" style="max-width: 300px">
                <input type="hidden" name="cart_mid<?php echo $i; ?>" value="<?php echo $row['mastcart_id'];?>"></td>
                <input type="hidden" name="item_id<?php echo $i; ?>" value="<?php echo $row['Book_Id'];?>"></td>
                <input type="hidden" name="cart_cid<?php echo $i; ?>" value="<?php echo $row['childcart_id'];?>"></td>
                <input type="hidden" name="rate<?php echo $i; ?>" value="<?php echo $row['child_totamt'];?>"></td> -->
                  <!-- <input type="submit"  value="-" name="minus<?php echo $i; ?>" class="btn btn-primary px-3 me-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -->
       
                 <!--  <div class="form-outline">
                     <label class="form-label" for="form1">Quantity</label>
                    <input id="form1" min="1" readonly name="quantity<?php echo $i; ?>" value="<?php echo $row['quantity']; ?>" type="number" class="form-control" />
                   
                  </div> -->

                  <!-- <input type="submit" value="+" name="add_item<?php echo $i; ?>" class="btn btn-primary px-3 ms-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> -->
                 
               <!--  </div>
                </form> -->
                <!-- Quantity -->

                <!-- Price -->
               <!--  <p class="text-start text-md-center">
                  <strong>₹<?php echo $row['tot_amount']; ?></strong>
                </p>
                <p class="text-start text-md-center">
                  <strong><?php echo $row['ostatus']; ?></strong>
                </p> -->
               <!--  <?php
                    if($row['ostatus']=="Paid"){ ?>
                        <p class="text-start text-md-center">
                        <strong><a href="admin_assign_to_courire_service.php?cart_mid=<?php echo $row['mastcart_id']; ?>&Cust_Id=<?php echo $row['Cust_Id']; ?>&pay=<?php echo $row['Payment_Id'] ?>">Assign To Courier Service</a></strong>
                        </p>


               <?php    } else {
                ?>

                                               <?php
$myqry = "SELECT *,`tbl_courier`.`Username` AS mycourier FROM `tbl_courier` INNER JOIN `tbl_delivery` USING(`courier_id`)INNER JOIN `tbl_mastcart` ON `tbl_delivery`.`mastcart_id`=`tbl_mastcart`.`mastcart_id` INNER JOIN tbl_customer USING(Cust_Id) WHERE `tbl_mastcart`.`cart_status` ='Assigned To Courier'  ORDER BY `expected_date` DESC";
$myval = select($myqry);
$currentDate = date('Y-m-d'); // Get the current date
foreach($myval as $myrow){  
    if (date('Y-m-d', strtotime($myval[0]['expected_date'])) == $currentDate) {
        ?>
        <p class="text-start text-md-center">
            <strong><a href="?cart_mid=<?php echo $myrow['mastcart_id']; ?>&deli=<?php echo $myrow['Delivery_Id'] ?>&Username=<?php echo $myrow['mycourier']; ?>&Cust_Id=<?php echo $myrow['Cust_Id']; ?>">Reassign</a></strong>
        </p>
        <?php
}
}
}
?> -->

         
           <!--    </div>
             
                </div>
                <hr class="my-4" />
 -->
       
<!-- </div> -->
                <?php     }
              }
              ?>
           
            <!-- Single item -->

           
       <!--  </div>
       
      </div>
     
    </div>
  </div> -->
</tbody>
</table>
</section>
<br><br><br>
 <a class='btn btn-success' style=" margin-left:1200px ;" href="salesreport.php">PRINT</a>

<!--  <br><br><br><br>
    <a class='btn btn-success' style="color: white; margin-left: 1100px;" href="courierreport.php">PRINT</a> -->



<style>

  body {
            font-family: "Times New Roman", Times, serif;
            background-color: black;
            color: white;
            margin: 0;
            padding: 0;
        }
        table {
            width: 50%;
            border-collapse: collapse;
          
        }
        th, td {
            padding: 40px;
            border-bottom: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #444;
            color: white;
        }
         .btn {
      background-color: #3498db;
      color: white;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 2px 2px;
    }

    .btn:hover {
      background-color: #2980b9;
    }
  
  
</style>
