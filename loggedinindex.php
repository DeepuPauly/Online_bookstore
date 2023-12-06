<?php include 'customer_header.php' ;

if (isset($_POST['submit'])) 
{
    extract($_POST);
    $q="SELECT * FROM `tbl_book` INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) INNER JOIN `tbl_purchild` USING(`Book_Id`) WHERE Book_Title like '%$search%' and Book_Status='1' GROUP BY Book_Id";
}
else
{
  $q="SELECT * FROM `tbl_book` INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) INNER JOIN `tbl_purchild` USING(`Book_Id`) WHERE Book_Status='1' GROUP BY Book_Id";  
}

$res=select($q);

if(isset($_GET['brand'])){
    extract($_GET);
    $q="SELECT * FROM `tbl_book` INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) INNER JOIN `tbl_purchild` USING(`Book_Id`) WHERE `Subcat_Name`='$brand'";
    $res=select($q);
}
if(isset($_GET['view_more'])){
    extract($_GET);
    $q="SELECT * FROM `tbl_book` INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) INNER JOIN `tbl_purchild` USING(`Book_Id`)";
    $res=select($q);
}



?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="background-color: black" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
           <form method="post">
  <div class="row">
    <div class="col-lg-9 col-md-8 col-sm-12">
      <input type="text" required="" class="form-control" name="search">
    </div>
    <div class="col-lg-3 col-md-4 col-sm-12">
      <input type="submit" class="btn btn-search" value="Search" name="submit">
    </div>
  </div>
</form>

          <h2 data-aos="fade-up"><font color="#dec05f">A Haven for <br>Book Lovers</h2></font>
          
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="bg.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu"  style="background-color: black">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2><font color="white" size="5px">Our Book</h2></font>
          <p> <font color="#dec05f">Check Our </font><span>Book's</span></p>
        </div>

       
        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          <div class="tab-pane fade active show" id="menu-starters">

          

           <div class="row gy-5">
    <?php
    if (sizeof($res) > 0) {
        $i = 1;
        foreach ($res as $row) {
            ?>
            <div class="col-lg-4"><font color="white">
               
                    <?php
                    if ($row['Stock'] == '0') {
                        echo '<div ><span class="badge bg-danger">Out of Stock</span></div>';
                    } elseif ($row['Stock'] < '4') {
                        echo '<div ><span class="badge bg-warning">Only ' . $row['Stock'] . ' left.</span></div>';
                    } else {
                        echo '<div ><span class="badge bg-success">In-Stock</span></div>';
                    }
                    ?>
                    <img src="<?php echo $row['Book_Img'] ?>" class="card-img-top" alt="Book Image"><br>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Subcat_Name'] ?><br><br><?php echo $row['Book_Title'] ?></h5>
                        <p class="card-text">Author: <?php echo $row['Book_Author'] ?><!-- <br>Publisher: <?php echo $row['Book_Publisher'] ?> GB</p> -->
                     <!--    <p class="card-text">Published Date: <?php echo $row['Book_Publication_Date'] ?></p> -->
                        <p class="card-text">Price: Rs. <?php echo $row['Selling_price'] ?></p>
                        <?php
                        if ($row['Stock'] == '0') {
                            echo '<a href="" class="btn btn-danger">Buy More</a>';
                        } else {
                            echo '<a href="add_qty_cart.php?id=' . $row['Book_Id'] . '&img=' . $row['Book_Img'] . '&stock=' . $row['Stock'] . '" class="btn btn-danger">Buy More</a>';
                        }
                        ?></font>
                    </div>
                
            </div>
        <?php }
    } else {
        ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">No Products Available.</h3>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

          </div><!-- End Starter Menu Content -->

        </div>

      </div>
    </section><!-- End Menu Section -->

<?php include 'footernew.php' ?>