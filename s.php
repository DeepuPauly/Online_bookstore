<?php 
include 'adminheader.php';

$qq = "SELECT *, COUNT(`Pc_Id`) AS cc FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) WHERE purch_status='Pending'";
$res = select($qq);

if (isset($_GET['masterid'])) {
    extract($_GET);

    $qz = "SELECT * FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) WHERE `purch_status`='Pending'";
    $az = select($qz);
    if (sizeof($az) > 0) {
        foreach ($az as $row) {
            $pm_id = $row['Pm_Id'];
            $aq = $row['Pc_Id'];
            $item_id = $row['Book_Id'];
            $quantity = $row['Purch_quantity'];
            $sp = $row['Selling_price'];

            $qs = "UPDATE `tbl_purmaster` SET `purch_status`='Purchased' WHERE `Pm_Id`='$pm_id'";
            update($qs);
            $hi = "SELECT * FROM `tbl_book` WHERE Book_Id='$item_id' AND stock='0'";
            $hlo = select($hi);
            if (sizeof($hlo) > 0) {
                $qs1 = "UPDATE `tbl_book` SET `Stock`=`Stock`+'$quantity',Book_Price='$sp' WHERE Book_Id='$item_id'";
                update($qs1);

                $aw = "UPDATE `tbl_purchild` SET cpurch_status='stock added' WHERE Pc_Id='$aq'";
                update($aw);
            } else {
                $a = 1;
            }
        }
    }
}
?>

<?php 
if (isset($_POST['crt'])) {
    // ... (previous PHP code) ...
    ?>

    <!-- Purchase Cart Section -->
    <section class="home-services py-3" id="services">
        <!-- ... (previous HTML code) ... -->
         <div class="container py-md-4 py-2">
            <h3 class="title-style text-center mb-lg-5 mb-4">Purchase <span>Cart</span></h3>
            <div class="row justify-content-center">
                <?php  if($res[0]['cc']!=0){ ?>
                  <div class="col-lg-8 col-md-8">
                <?php 

                 $qd="SELECT *,SUM(`tbl_purmaster`.`total_amt`) AS tsum FROM `tbl_purmaster` WHERE purch_status='Pending'";
                $qsd=select($qd);

                     $qt="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) WHERE purch_status='Pending'";
                    $rs=select($qt);
                    
                    if(sizeof($rs)>0){
                        foreach($rs as $riw){
                     ?>     



                    <div class="box-wrap" style="margin-bottom: 10px">
                        <div class="icon">
                            <!-- <i class="fas fa-user-tie"></i> -->
                        </div>
                                <img style="width: 120px" src="<?php echo $riw['Book_Img']; ?>">
                                <h4 class="number"><?php echo $riw['cqnty']; ?></h4>
                                <h4><a href="#url"><?php echo $riw['Subcat_Name']; ?> <?php echo $riw['Book_Title']; ?></a></h4>
                                <h6>Price: Rs. <?php echo $riw['Cost_Price']; ?></h6>
                    </div>
                

                <?php  }  }
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
                        <p>Total Amount: Rs. <?php if(sizeof($qsd)>0){ echo $qsd[0]['tsum']; } ?></p>
                        <br>
                        <a href="?masterid=<?php echo $riw['Pm_Id']?>" class="btn btn-style">Purchase</a>
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

<?php
} else {
    // ... (previous PHP code) ...
}
?>

<!-- ... (previous HTML and styles) ... -->
<div class="w3l-servicesblock2 py-5" id="services">
    <center>
        <h1 style="margin-bottom: 20px;">Item Purchase</h1>
        <form method="post">
            <a href="admin_view_purch.php"><input type="button" value="Purchase Details" class="btn btn-dark" style="margin-left: 1165px"></a>
            <input type="submit" name="crt" value="Purchase Cart" class="btn btn-primary" style="margin-left: 15px">
        </form>
    </center>

    <div class="cards-container">
        <?php 
        $q = "SELECT * FROM `tbl_book` INNER JOIN  `tbl_subcategory` USING(`Subcat_Id`) WHERE Book_Status='1'";
        $re = select($q);
        
        if(sizeof($re) > 0) {
            foreach ($re as $row) {
        ?>
            <div class="card">
                <h2><?php echo $row['Book_Title']; ?></h2>
                <p>Sub Category: <?php echo $row['Subcat_Name']; ?></p>
                <p>Stock: <?php echo $row['Stock']; ?></p>
                <a href="admin_purchase_item.php?item_id=<?php echo $row['Book_Id'] ?>" class="btn btn-primary btn-md">Purchase</a>
            </div>
        <?php 
            }
        } 
        ?>
    </div>
</div>

    


<style type="text/css">
    .cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin: 10px;
    width: 300px;
}

.card h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.card p {
    font-size: 18px;
    margin-bottom: 5px;
}

.card .btn {
    display: block;
    width: 100%;
}

</style>
    <!-- //home services block -->


