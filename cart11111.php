<?php 

include 'adminheader.php';




if(isset($_GET['masterid']))
{
    extract($_GET);

     $qz="SELECT * FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) WHERE `purch_status`='Pending'";
    $az=select($qz);
    if(sizeof($az)>0)
    {
      foreach ($az as $row) 
      {
        
        $pm_id=$row['Pm_Id'];
        $aq=$row['Pc_Id'];
        $item_id=$row['Book_Id'];
        $quantity=$row['Purch_quantity'];
        $sp=$row['Selling_price'];

        $qs="UPDATE `tbl_purmaster` SET `purch_status`='Purchased' WHERE `Pm_Id`='$pm_id'";
        update($qs);
       $hi="select * from `tbl_book` where Book_Id='$item_id' and stock='0'";
        $hlo=select($hi);
        if (sizeof($hlo)>0)
         {
           $qs1="UPDATE `tbl_book` SET `Stock`=`Stock`+'$quantity',Book_Price='$sp' WHERE Book_Id='$item_id'";
        	update($qs1);
          $aw="update `tbl_purchild` set cpurch_status='stock added' where Pc_Id='$aq'";
          update($aw);
          return redirect('admin_manage_purchase.php');
        }
        else
        {
          $a=1;
          return redirect('admin_manage_purchase.php');
        }
		}
	}

}
?>



<!-- <style type="text/css">
  #ph{
    color: #fff;
  }
</style> -->


<!-- hero slider Start -->
    <div class="banner-wrap" style="height: 50px">
        <div class="banner-slider">
            <!-- hero slide start -->
          
                <div class="container">
                    <div class="hero-content">
                        
                        <!-- <h1 data-animation="flipInX" data-delay="0.8s" data-color="#fff">
                            Latest<span> Phones </span>Available.</h1>
                            <div class="cta-btn" data-animation="fadeInDown" data-delay="1s">
                            <a href="about.html" class="btn btn-style btn-primary">View More</a>
                        </div> -->
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
            <h3 class="title-style text-center mb-lg-5 mb-4"><span>Cart</span></h3>
            <div class="row justify-content-center">
                
                  <div class="col-lg-8 col-md-8">
                <?php 

                 $qd="SELECT *,SUM(`tbl_purmaster`.`total_amt`) AS tsum FROM `tbl_purmaster` WHERE purch_status='Pending'";
                $qsd=select($qd);

                     $qt="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) WHERE purch_status='Pending'";
                    $rs=select($qt);
                    
                    if(sizeof($rs)>0){
                        foreach($rs as $riw){
                     ?>     



                    <div class="box-wrap">
                        <div class="icon">
                            <!-- <i class="fas fa-user-tie"></i> -->
                        </div>
                                
                                <h4 class="number"><?php echo $riw['cqnty']; ?></h4>
                                <h4><a href="#url"><?php echo $riw['Book_Title']; ?> : <?php echo $riw['Subcat_Name']; ?></a></h4>
                                <h6>Price: Rs. <?php echo $riw['Cost_Price']; ?></h6> 
                    </div>
                    <br><br>
                

                <?php  }  
                 ?>
               <div>
                <br><br><br>
                 <div class="col-lg-4 col-md-4">
                   
                        <div class="icon">
                            <!-- <i class="fas fa-user-tie"></i> -->
                        </div>
                        <!-- <h4 class="number"><?php if(sizeof($res)>0){ echo $res[0]['cc']; } ?></h4> -->
                        <h3><a href="#url">Order</a></h3>
                        <br>
                        <p>Total Amount: Rs. <?php if(sizeof($qsd)>0){ echo $qsd[0]['tsum']; } ?></p>
                        <br>
                        <a href="?masterid=<?php echo $riw['Pm_Id']?>" class="btn btn-danger">Purchase</a>
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