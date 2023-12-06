<?php include 'cheader.php';

  $user2=$_SESSION['user2_id'];
extract($_GET);


if(isset($_GET['pickup'])) 
{  
  extract($_GET);
  $q1="UPDATE `tbl_mastcart` SET `cart_status`='Order Pick Up' WHERE `mastcart_id`='$pickup'";
  update($q1);

  alert("Order Successfully Picked Up");
 return redirect("courier_view_assigned_orders.php");

}
if(isset($_GET['delivered'])) 
{  
  extract($_GET);
  echo$q1="UPDATE `tbl_mastcart` SET `cart_status`='Order Delivered' WHERE `mastcart_id`='$delivered'";
  update($q1);
 echo $qq="INSERT INTO `tbl_delivery` VALUES(NULL,'$payment_id',CURDATE())";
  insert($qq);
   alert("Order Successfully Delivered");
  return redirect("courier_view_assigned_orders.php");

}
?>



    <!-- Add your CSS styles here -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: black;
        margin: 0;
        padding: 0;
        height: 500px
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    .section-title {
        text-align: center;
        margin-bottom: 30px;
    }
</style>



       <!-- <div class="section-title"> -->
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    <h2 style="text-align: center;">Delivery Details</h2>
    <br>
<!-- </div> -->

<table>
    <tr>
        <th>Customer Name</th>
        <th>City</th>
        <th>District</th>
        <th>Pincode</th>
        <th>Phone</th>
        <th>Status</th>
        
    </tr>






   <!--      <div class="section-title"> -->
         <!--  <h2>Delivery Details</h2> -->
         <!--  <p></p>
        </div>

        <div class="row"> -->

        <?php 
      $q="SELECT *,tbl_mastcart.`cart_status` as cstatus,tbl_mastcart.`mastcart_id` as omid FROM `tbl_payment` INNER JOIN `tbl_order` USING(`mastcart_id`) INNER JOIN `tbl_mastcart` USING(`mastcart_id`) INNER JOIN `tbl_customer` USING(`Cust_Id`) WHERE (cart_status ='Order Delivered' or cart_status ='Order Pick Up') AND `Courier_Id`='$user2' ORDER BY `order_date` DESC" ;
      $res=select($q);
      $i=1;
        foreach ($res as $row) { ?>

          <tr>
            <td><?php echo $row['C_Fname'] ?> <?php echo $row['C_Lname'] ?></td>
            <td><?php echo $row['C_City'] ?></td>
            <td><?php echo $row['C_Dist'] ?></td>
            <td><?php echo $row['C_Pin'] ?></td>
            <td><?php echo $row['C_Phone'] ?></td>
            <td><?php echo $row['cstatus'] ?></td>
            <td>
           

          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box"> -->
              <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
              <!-- <h4><a href="">Delivery Details</a></h4>
              <h6>Customer Name : <?php echo $row['C_Fname'] ?>  <?php echo $row['C_Lname'] ?></h6>
              <p>City : <?php echo $row['C_City'] ?></p>
              <p>District : <?php echo $row['C_Dist'] ?></p>
              <p>Pincode : <?php echo $row['C_Pin'] ?></p>
              <p>Phone : <?php echo $row['C_Phone'] ?></p>
              <p><?php echo $row['cstatus'] ?></p> -->
              <?php 
                if($row['cstatus']=="assigned to courier"){ ?>
                    <p><a href="?pickup=<?php echo $row['omid'] ?>&Payment_Id=<?php echo $row['omid'] ?>">Order Pick Up</a></p>
                <?php }
                else if($row['cstatus']=="Order Pick Up"){ ?>
                    <p><a href="?delivered=<?php echo $row['omid']; ?>&Payment_Id=<?php echo $row['omid']; ?>">Order Delivered</a></p>
             <?php    }

              ?>
            </div>
          </div>
        <?php } ?>


        </table>

        </div>

      </div>
    <section style=" background-attachment: fixed;padding-top: 300px; padding-bottom: 700px;"><!-- End Services Section -->

<?php include 'footer.php'; ?>