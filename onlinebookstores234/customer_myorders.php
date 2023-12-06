<?php include 'customer_header.php'; 
$cid=$_SESSION['Cust_id'];

extract($_GET);
?>

<!-- hero slider Start -->
<div class="banner-wrap" style="height: 50px">
    <div class="banner-slider">
        <!-- hero slide start -->
        <div class="banner-slide bg1">
            <div class="container">
                <div class="hero-content"></div>
            </div>
            <div class="hero-overlay"></div>
        </div>
        <!-- hero slide end -->
    </div>
</div>
<!-- hero slider end -->

<!-- home page service grids -->
<section id="chefs" class="chefs section-bg">
    <div class="container" >

       <div class="section-header">
          <!-- <h2>Chefs</h2> -->
          <p><span>MY ORDERS</span></p>
        </div>
        <?php  
        $qt="SELECT *,`tbl_childcart`.`quantity` AS cqnty FROM `tbl_order` INNER JOIN `tbl_mastcart` USING(mastcart_id) INNER JOIN `tbl_childcart` USING(mastcart_id) INNER JOIN `tbl_customer` USING(Cust_Id) INNER JOIN `tbl_book` USING(Book_Id) INNER JOIN `tbl_subcategory` USING(Subcat_Id) WHERE cart_status!='Pending' AND Cust_Id='$cid'";
        $rs=select($qt);
        
        $si=1;
        if(sizeof($rs)>0){
            foreach($rs as $row) {
        ?>

        <div class="row mb-3">
            <div class="col-lg-2 col-md-2">
                <img style="width: 120px" src="<?php echo $row['Book_Img']; ?>">
            </div>
            <div class="col-lg-10 col-md-10">
                <div class="box-wrap">
                    <div class="content">
                        <h4 class="number"><?php echo $row['cqnty']; ?></h4>
                        <h4 style="margin-bottom:30px">
                            <a href="#">
                                <?php echo $row['Book_Title']; ?>
                            </a>
                        </h4>
                        <h6>Total Price: Rs. <?php echo $row['child_totamt']; ?></h6>
                        <h6>Status: <?php echo $row['cart_status']; ?> <a href="bill3.php?id=<?php echo $row['order_id'] ?>" class="read"><br><br>View Receipt</a></h6>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

        <?php }  
        } else { ?>

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12">
                <div class="box-wrap my-4">
                    <center>
                        <div class="icon"></div>
                        <h3>No Orders.</h3>
                    </center>
                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</section>
<!-- //home page service grids -->


