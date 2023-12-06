<?php include 'loggedinheader.php'; 

$cid=$_SESSION['Cust_id'];
extract($_GET);


 $qq="SELECT *,COUNT(`childcart_id`) AS cc FROM `tbl_mastcart` INNER JOIN `tbl_childcart` USING(`mastcart_id`) WHERE `Cust_Id`='$cid' AND `cart_status`='Pending'";
$res=select($qq);
$isAvailable = true;
if(isset($_GET['remove_item'])){
    extract($_GET);
    $qnty=$quantity;
    $prc=$price;
    $total=$qnty*$prc;
    $qu="UPDATE `tbl_mastcart` SET `tot_amount`=`tot_amount`-'$total' WHERE `mastcart_id`='$remove_item'";
    update($qu);
    $qd="DELETE FROM `tbl_childcart` WHERE `Book_Id`='$item_id' AND `mastcart_id`='$remove_item'";
    delete($qd);
     $qo="SELECT * FROM `tbl_mastcart` WHERE `mastcart_id`='$remove_item' and tot_amount='0'";
    $rt=select($qo);
    if(sizeof($rt)>0){
         $qx="DELETE FROM `tbl_mastcart` WHERE `mastcart_id`='$remove_item'";
        delete($qx);
    }
    return redirect("customer_view_cart.php");

}

if(isset($_GET['minus'])){
    extract($_GET);
    $qm="UPDATE `tbl_childcart` SET `quantity`=`quantity`-'1' WHERE `childcart_id`='$childcart_id'";
    update($qm);
    $qm1="UPDATE `tbl_mastcart` SET `tot_amount`=`tot_amount`-'$price' WHERE `mastcart_id`='$mastcart_id'";
    update($qm1);
    return redirect("customer_view_cart.php");
}

if(isset($_GET['add_qty'])){
    extract($_GET);

    
    $qc="SELECT * FROM `tbl_childcart` WHERE `childcart_id`='$childcart_id'";
    $rc=select($qc);
    $tt=$rc[0]['quantity']+1;

    if($stock<$tt){
        alert("Cart Quantity Must be Less Than Stock.");
    }
    else{
        $qm="UPDATE `tbl_childcart` SET `quantity`=`quantity`+'1' WHERE `childcart_id`='$childcart_id'";
        update($qm);
        $qm1="UPDATE `tbl_mastcart` SET `tot_amount`=`tot_amount`+'$price' WHERE `mastcart_id`='$mastcart_id'";
        update($qm1);

    }
    
    return redirect("customer_view_cart.php");
}

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
            <h3 class="title-style text-center mb-lg-5 mb-4">My <span>Cart</span></h3>
            <div class="row justify-content-center">
                <?php  if($res[0]['cc']!=0){ ?>


                  <div class="col-lg-8 col-md-8">
                <?php 
                $qt="SELECT *,`tbl_childcart`.`quantity` AS cqnty FROM `tbl_mastcart` INNER JOIN `tbl_childcart` USING(`mastcart_id`) 
INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) 

 WHERE `Cust_Id`='$cid' AND `cart_status`='Pending' GROUP BY tbl_childcart.`Book_Id` ";
                    $rs=select($qt);
                    $newp=0;
                    if(sizeof($rs)>0){

                        foreach($rs as $row){
                            $cmsid=$row['mastcart_id'];
                            $iittm=$row['Book_Id'];


                             $rrq=$row['cqnty'];
                             $rrp=$row['Book_Price'];
                             $nep=$rrq*$rrp;
                             $newp=$newp+$nep;
                             
                             $qg="update tbl_childcart set child_totamt='$nep' where mastcart_id='$cmsid' and Book_Id='$iittm'";
                             update($qg);


                     ?>


                    <div class="box-wrap" style="margin-bottom: 14px">
                        <div class="icon">
                            <!-- <i class="fas fa-user-tie"></i> -->
                        </div>
                                <img style="width: 120px" src="<?php echo $row['Book_Img']; ?>">
                                <h4 class="number"><?php echo $row['cqnty']; ?></h4>
                                <h4><a href="#url"><?php echo $row['Subcat_Name']; ?> <?php echo $row['Book_Title']; ?></a></h4>
                                <h6 style="margin-bottom: 8px">Price: Rs. <?php


                                $qt1="SELECT *,`tbl_childcart`.`quantity` AS cqnty FROM `tbl_mastcart` INNER JOIN `tbl_childcart` USING(`mastcart_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`)  WHERE `Cust_Id`='$cid' AND `cart_status`='Pending' ORDER BY `Stock`";
                                $qrf=select($qt1);

                                 echo $row['Book_Price']; ?></h6>
                                <?php
                                if ($row['Stock']<$row['cqnty']) {
                                    $isAvailable = false;
                                // $a=0;
                                 ?>
                                   <h6>Status: <span style="color:red">Cart Quantity Must be Less Than Stock(<?php echo $row['Stock']; ?> left).</span></h6> 
                                <?php }
                               
                                else
                                {   
                                    // $a=1;
                                    ?>
                                    <h6>Status: <span style="color:blue">In-stock.</span></h6> 
                                <?php  } ?>

                                <br>
                               <div class="row">
                                    <a href="?minus=<?php echo $row['Book_Id']; ?>&childcart_id=<?php echo $row['childcart_id']; ?>&price=<?php echo $row['Book_Price'] ?>&mastcart_id=<?php echo $row['mastcart_id'] ?>" class="btn btn-primary btn-sm" style="width: 50px;margin-right: 6px;">-</a>

                                    <input type="number" min="1" max="<?php echo $row['Stock']; ?>" title="Maximum Order Quantity : <?php echo $row['Stock']; ?>"  readonly class="form-control" style="width: 59px;" name="" value="<?php echo $row['quantity']; ?>">

                                    <a href="?add_qty=<?php echo $row['Book_Id']; ?>&childcart_id=<?php echo $row['childcart_id']; ?>&price=<?php echo $row['Book_Price'] ?>&mastcart_id=<?php echo $row['mastcart_id'] ?>&stock=<?php echo $row['Stock'] ?>" class="btn btn-primary btn-sm" style="width: 50px;margin-left: 6px;">+</a>
                               </div>

                                        
                                
                                <p><a href="?remove_item=<?php echo $row['mastcart_id'] ?>&childcart_id=<?php echo $row['childcart_id'] ?>&item_id=<?php echo $row['Book_Id'] ?>&quantity=<?php echo $row['quantity'] ?>&price=<?php echo $row['Book_Price'] ?>" class="read">Remove</a></p>
                        <!-- <a href="services.html" class="read">Read more</a> -->
                    </div>
                

                <?php 

                $sql = "UPDATE tbl_childcart SET `child_totamt`={$row['Book_Price']} WHERE childcart_id={$row['childcart_id']}";
             //   var_dump($sql);
                $con->query($sql);


                 }  }


              //  var_dump($res); 
                $sql = "UPDATE tbl_mastcart SET tot_amount=$newp WHERE mastcart_id={$res[0]['mastcart_id']}";
                $con->query($sql);

                 ?>
               </div>
                 <div class="col-lg-4 col-md-4">
                    <div class="box-wrap">
                        <div class="icon">
                            <!-- <i class="fas fa-user-tie"></i> -->
                        </div>
                        <h4 class="number"><?php if(sizeof($res)>0){ echo $res[0]['cc']; } ?></h4>
                        <h3><a href="#url">Order Summary</a></h3>
                        <br>
                        <p>Total Amount: Rs. <?php if(sizeof($rs)>0){ echo $newp; } ?></p>
                        <br>
                        <?php 
                       

                        if($rs[0]['Stock']==0){ 
                         ?>

                             <p>Remove Items that are Out of Stock.</p>

                     <?php   }
                     else{ 
                        if($isAvailable){

                        ?>


                        <a href="cust_payment.php?cust_payment=<?php echo $row['Stock'] ?>&quantity=<?php echo $row['quantity'] ?>&masterid=<?php echo $row['mastcart_id']; ?>&newp=<?php echo $newp ?>" class="btn btn-style">Order</a>

                    <?php  }}
                         ?>
                          
                           <!-- <a href="cust_payment.php?masterid=<?php echo $row['mastcart_id']?>" class="btn btn-style">Order</a> -->
                    </div>
                </div>
               
<?php }

else{ ?>

        <div class="col-lg-12 col-md-12">
         
                <div class="box-wrap my-4">
                    <center>
                    <div class="icon">
                        <!-- <i class="fas fa-user-tie"></i> -->
                    </div>
                            
                           
                           <h3>Oops. Your Cart is Empty.</h3>
                           </center> 
                          
                </div>
            

           </div>

<?php }
 ?>

            
            </div>
        </div>
    </section>
    <!-- //home page service grids -->




<?php include 'footer.php' ?>
