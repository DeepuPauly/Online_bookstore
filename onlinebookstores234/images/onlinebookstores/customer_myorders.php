<?php include 'loggedinheader.php'; 
$cid=$_SESSION['cust_id'];

extract($_GET);

?>


<!-- hero slider Start -->
    <div class="banner-wrap" style="height: 300px">
        <div class="banner-slider">
            <!-- hero slide start -->
            <div class="banner-slide bg1">
                <div class="container">
                    <div class="hero-content">
                        
                    </div>
                </div>
                <div class="hero-overlay"></div>
            </div>
            <!-- hero slide end -->
        </div>
    </div>
    <!-- hero slider end -->



     <!-- home page service grids -->
    <section class="home-services py-3" id="services">
        <div class="container py-md-4 py-2">
            <h3 class="title-style text-center mb-lg-5 mb-4">My <span>Orders</span></h3>
            <div class="row justify-content-center">
                <?php  

                    $qt="SELECT *,`tbl_childcart`.`quantity` AS cqnty FROM `tbl_order` INNER JOIN `tbl_mastcart` USING(mastcart_id) INNER JOIN `tbl_childcart` USING(mastcart_id) INNER JOIN `tbl_customer` USING(cust_id) INNER JOIN `tbl_item` USING(item_id) INNER JOIN `tbl_brand` USING(brand_id) WHERE cart_status!='Pending' AND cust_id='$cid'";
                    $rs=select($qt);
 
                   $si=1;
                    if(sizeof($rs)>0){
                        foreach($rs as $row){
                                                 ?>

                    <div class="col-lg-10 col-md-10">
                    <div class="box-wrap" style="margin-bottom: 15px">
                        
                                <img style="width: 120px" src="<?php echo $row['img1']; ?>">
                                <h4 class="number"><?php echo $row['cqnty']; ?></h4>
                                
                                <h4 style="margin-bottom:30px"><a href="#"><?php echo $row['brand_name']; ?> <?php echo $row['item_name']; ?></a></h4>
                                <h6>Total Price: Rs. <?php echo $row['child_totamt']; ?></h6>
                                <h6 style="margin-top: 10px;">Status: <?php echo $row['cart_status']; ?> <a href="bill.php?id=<?php echo $row['order_id'] ?>" class="read" style="float: right;">View Reciept</a></h6>


                                        
                
                       
                    </div>
                </div>

                <?php  }  
                 }

else{ ?>

        <div class="col-lg-12 col-md-12">
         
                <div class="box-wrap my-4">
                    <center>
                    <div class="icon">
                        <!-- <i class="fas fa-user-tie"></i> -->
                    </div>
                            
                           
                           <h3>No Orders.</h3>
                           </center> 
                          
                </div>
            

           </div>

<?php }
 ?>

            
            
        </div>
    </section>
    <!-- //home page service grids -->




<?php include 'footer.php' ?>
