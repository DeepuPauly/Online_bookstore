<?php include 'connection.php';
function dateDiffInDays($date1, $date2) { 
    
    // Calculating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 

if (isset($_GET['cart_mid']))
{
   extract($_GET);
    $c="UPDATE `tbl_mastcart` SET `cart_status` ='Paid' WHERE `mastcart_id`='$cart_mid'";
   $d=update($c);
   //  $myq="UPDATE `tbl_courier`  SET `Cs_Status`='0' WHERE `Username`='$Username'";
   // $myres=update($myq);
    $rr="delete from tbl_delivery where Delivery_Id='$deliver'";
   delete($rr);
  // $myqrr="UPDATE `tbl_login`  SET `Status`='0' WHERE `Username`='$Username'";
  //  $myresss=update($myqrr);
    alert('updated successfully');
    return redirect('admin_view_sales.php');

 }


?>


 <center>

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
                   
                    if(sizeof($res1)>0){
                      $myomif=$res1[0]['mastcart_id'];
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
                            

                    if($row['ostatus']=="Paid" ){ ?>
                        <td><p class="text-start text-md-center">
                        <strong><a class='btn btn-success' href="admin_assign_to_courire_service.php?cart_mid=<?php echo $row['mastcart_id']; ?>&Cust_Id=<?php echo $row['Cust_Id']; ?>&pay=<?php echo $row['Payment_Id'] ?> &order_id=<?php echo $row['order_id'] ?> ">Assign</a></strong>
                        </p></td>
                   

               <?php    }
                 elseif($row['reachable']=="Unreachable" ){ 

                    $klp="select * from tbl_delivery inner join tbl_order using(mastcart_id) where mastcart_id='$myomif'";
                    $ttrr=select($klp);

                  ?>
                        <td><p class="text-start text-md-center">
                        <strong><a class='btn btn-success' href="admin_assign_to_courire_service.php?cart_mid=<?php echo $row['mastcart_id']; ?>&Cust_Id=<?php echo $row['Cust_Id']; ?>&pay=<?php echo $row['Payment_Id'] ?>&order_id=<?php echo $row['order_id'] ?>&dele=<?php echo $ttrr[0]['Delivery_Id'] ?> ">Reassign</a></strong>
                        </p></td>
                        <!-- <?php echo "<td>{$row['ostatus']}</td>"; ?> -->

               <?php    }
                else 
                {
                ?>

                                               <?php
echo $myqry = "SELECT *,`tbl_courier`.`Username` AS mycourier FROM `tbl_courier` INNER JOIN `tbl_delivery` USING(`courier_id`)INNER JOIN `tbl_mastcart` ON `tbl_delivery`.`mastcart_id`=`tbl_mastcart`.`mastcart_id` INNER JOIN tbl_customer USING(Cust_Id) WHERE `tbl_mastcart`.`cart_status` ='Assigned To Courier'   ORDER BY `expected_date` DESC";
$myval = select($myqry);
// $currentDate = date('Y-m-d'); // Get the current date
foreach($myval as $myrow){  


  if (sizeof($myrow)>0) {
  # code...
  // $cart_mid=$myrow[0]['mastcart_id'];
  // $cart_status=$row['ostatus'];
  // // $myval[0]["cart_status"];
  // $Username=$myrow[0]['mycourier'];
  // $Cust_Id=$myrow[0]['Cust_Id'];
  // $deliver=$myrow[0]['Delivery_Id'];
  // $my_date=$myrow[0]['cassign_date'];
  //  $expected_date=$myrow[0]['expected_date'];

?>



 <td> <p class="text-start text-md-center">
            <strong><a href="?cart_mid=<?php echo $myrow['mastcart_id']; ?>&Username=<?php echo $myrow['mycourier']; ?>&Cust_Id=<?php echo $myrow['Cust_Id']; ?>&deliver=<?php echo $myrow['Delivery_Id']; ?>">Reassign</a></strong>
        </p></td>



      


<?php } } ?>


        <?php
// }
 // }
// }
}
}
?>

          
              </div>
             
                </div>
                <hr class="my-4" />

        
</div>
                <?php     } 
              
              ?>
            <!-- Single item -->

</tbody>
</table>
</section>
<br><br><br>
 <a class='btn btn-success' style=" margin-left:1200px ;" href="salesreport.php">PRINT</a>



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
</center>