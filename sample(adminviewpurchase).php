<?php include 'adminheader.php';
      

?>
<!-- <style type="text/css">
  #ph{
    color: #fff;
  }
</style> -->


<!-- hero slider Start -->
    <div class="banner-wrap" style="height: 300px"> 
        <div class="banner-slider">
            <!-- hero slide start -->
            <div class="banner-slide bg1">
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

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 280px">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
<center>
  <h1>Search Purchase</h1>
  <br>
  <br>
  <form method="post">
    <table  class="table table-striped" style="width: 250px">

  
       <td><input type="date" name="daily" class="form-control" id="inputCity" style="opacity: 0.7" ><center>Daily</center></td>
        <td><input type="month" name="monthly" class="form-control" id="inputCity" style="opacity: 0.7"><center>Monthly</center></td>
        <td><input type="text" name="customer" placeholder="Search Vendor" class="form-control" id="inputCity" style="opacity: .7; width:240px" ></td>

     <tr>
       <td align="center" colspan="2"><input type="submit" name="sale" class="btn btn-secondary" value="View Report"></td>
       <td><a href="purchase_report.php"><input type="button" class="btn btn-secondary" value="Print Report"></a></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>


 </div>
  </section><!-- End Hero -->


    <!-- home services block -->
    
<center>
        <h1 style="margin-bottom: 20px;">Item Purchase</h1>
        <br>

        
        <table class="table table-striped" style="width:1450px">
            <tr>
                <th>Sl No.</th>
                <th>Purchase ID</th>
                <th>Item Name</th>
                <th>Vendor Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Selling Price</th>
                <th>Purchase Date</th>
            </tr>

                
                     <?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`)where Pm_Date='$daily' and purch_status!='Pending'";
           }
            else if ($monthly!="") {

            
             // $q="SELECT *,`tbl_childpurch`.`purch_quantity` AS cqnty FROM `tbl_mastpurch` INNER JOIN `tbl_childpurch` USING(`mastpurch_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN `tbl_item` USING(`item_id`) INNER JOIN `tbl_brand` USING(`brand_id`) where purch_date like '$monthly%' and purch_status!='Pending'";
               $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) where `Pm_Date`  like '$monthly%' and purch_status!='Pending'";

             }

              else if ($customer!="") {

            
             // $q="SELECT *,`tbl_childpurch`.`purch_quantity` AS cqnty FROM `tbl_mastpurch` INNER JOIN `tbl_childpurch` USING(`mastpurch_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN `tbl_item` USING(`item_id`) INNER JOIN `tbl_brand` USING(`brand_id`) where v_name like '$customer%' and purch_status!='Pending'";
                 $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`)where `Vendor_name` like '$customer%' and purch_status!='Pending'";

             }
           }
             else{
             // $q="SELECT *,`tbl_childpurch`.`purch_quantity` AS cqnty FROM `tbl_mastpurch` INNER JOIN `tbl_childpurch` USING(`mastpurch_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN `tbl_item` USING(`item_id`) INNER JOIN `tbl_brand` USING(`brand_id`) WHERE purch_status!='Pending'";
               $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) WHERE purch_status!='Pending'";
            }
          

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $i=1;
       foreach ($res as $row) {

        

        ?>

                 <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['Pm_Id']; ?></td>
                    <td><?php echo $row['Book_Title']; ?></td>
                    <td><?php echo $row['Vendor_name']; ?></td>
                    <td><?php echo $row['Purch_quantity']; ?></td>
                    <td><?php echo $row['Cost_Price']; ?></td>
                    <td><?php echo $row['Selling_price']; ?></td>
                    <td><?php echo $row['Pm_Date']; ?></td>
                
                </tr>

                
    <?php        }
        
 ?>
           
        </table>

    </center>
    <br>
    <br>
    
    <!-- //home services block -->
