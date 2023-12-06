<?php include 'cheader.php';
extract($_GET);
   $user2=$_SESSION['user2_id'];
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
  $q1="UPDATE `tbl_mastcart` SET `cart_status`='Order Delivered' WHERE `mastcart_id`='$delivered'";
  update($q1);
  $qq="INSERT INTO `tbl_delivery` VALUES(NULL,CURDATE(),'$delivered','$Payment_Id')";
  insert($qq);
  alert("Order Successfully Delivered");
 return redirect("courier_view_assigned_orders.php");

}
if (isset($_GET['order_id'])) 
{
  extract($_GET);
  $gggg="select * from tbl_order inner join tbl_mastcart using(mastcart_id) where order_id='$order_id' and cart_status='assigned to courier'";
  $fff=select($gggg);
  if ($fff[0]['reachable']!='3') 
  {
    $tr="update tbl_order set reachable=reachable + 1 where order_id='$order_id'";
    update($tr);
  }
  else
  {
    $ttr="update tbl_order set reachable='Unreachable' where order_id='$order_id'";
    update($ttr);
  }
}
?>


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center"  style="height: 300px;">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
        <!-- <h1 style="color: #FFC541; font-family: Freestyle Script Regular ">Order Details..</h1> -->


</div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


   <!-- ======= Services Section ======= -->
   <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Assigned Orders</p>
        </div>

        <div class="row">

        <?php 
      $q="SELECT *,tbl_mastcart.`cart_status` as cstatus,tbl_mastcart.`mastcart_id` as omid FROM `tbl_payment` INNER JOIN `tbl_order` USING(`mastcart_id`) INNER JOIN `tbl_mastcart` USING(`mastcart_id`) INNER JOIN `tbl_customer` USING(`Cust_Id`) WHERE (cart_status ='assigned to courier' or cart_status ='Order Pick Up' or reachable!='Unreachable' ) AND `Courier_Id`='$user2' ORDER BY `order_date` DESC" ;
      $res=select($q);
      $i=1;
        foreach ($res as $row) { ?>


          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <!-- <div class="icon"><i class="bx bxl-dribbble"></i></div> -->
              <h4><a href="">Delivery Details</a></h4>
              <h6>Customer Name : <?php echo $row['C_Fname'] ?>  <?php echo $row['C_Lname'] ?></h6>
              <p>City : <?php echo $row['C_City'] ?></p>
              <p>District : <?php echo $row['C_Dist'] ?></p>
              <p>Pincode : <?php echo $row['C_Pin'] ?></p>
              <p>Phone : <?php echo $row['C_Phone'] ?></p>
              <p><?php echo $row['cstatus'] ?></p>
              <?php  
              if ($row['reachable']=='Unreachable') 
              { ?>
              <p>Customer <?php echo $row['reachable'] ?></p>
              <?php }

              ?>  
              <?php 
                if($row['cstatus']=="assigned to courier" and $row['reachable']!='Unreachable'){ ?>
                    <p><a href="?pickup=<?php echo $row['omid'] ?>&Payment_Id=<?php echo $row['omid'] ?>">Order Pick Up</a></p>
                    <p><a href="?order_id=<?php echo $row['order_id'] ?>">Unreachable</a></p>
                <?php }
                else if($row['cstatus']=="Order Pick Up"){ ?>
                    <p><a href="?delivered=<?php echo $row['omid']; ?>&Payment_Id=<?php echo $row['omid']; ?>">Order Delivered</a></p>
             <?php    }

              ?>
            </div>
          </div>
        <?php } ?>

          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Services Section -->


<?php include 'footer.php'; ?>