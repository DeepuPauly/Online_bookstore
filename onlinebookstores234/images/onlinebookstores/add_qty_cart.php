<?php include 'loggedinheader.php';
 $cid=$_SESSION['cust_id'];

extract($_GET);
?>


<?php
if (isset($_POST['button'])) 
{
  extract($_POST);

  $data=$qty;
  $stk=$stock;

  if($stk < $data)
  {
    alert("Sorry, we do not have the quantity you require.");
  }
  else
{
  $qp="SELECT * from tbl_mastcart where Cust_Id='$cid' and cart_status='Pending'";
  $qr=select($qp);
  if (sizeof($qr)>0) {
      $cmmid=$qr[0]['mastcart_id'];


      $qq="SELECT * from tbl_childcart where Book_Id='$id' and mastcart_id='$cmmid'";
      $qqs=select($qq);

      if (sizeof($qqs)>0) 
      {
          echo$qu="update tbl_childcart set quantity=quantity+'$qty' where mastcart_id='$cmmid' and Book_Id='$id'";
          update($qu);
          echo$qk="update tbl_mastcart set tot_amount=tot_amount+'$t_amount' where mastcart_id='$cmmid'";
          update($qk);
  //         alert("Item added to Cart.");
  // return redirect ('customer_view_cart.php');

      }
      else
      {
           $qaz="insert into tbl_childcart values(null,'$cmmid','$id','$qty',curdate(),'$t_amount')";
          insert($qaz);
          $qb="update tbl_mastcart set tot_amount=tot_amount+'$t_amount' where mastcart_id='$cmmid'";
          update($qb);

          alert("Item added to Cart.");
  return redirect ('customer_view_cart.php');
      }
  }
  else
  {
 $q="insert into tbl_mastcart values(null,'$cid','$t_amount','Pending')";
  $ids=insert($q);
 $qs="insert into tbl_childcart values(null,'$ids','$id','$qty',curdate(),'$t_amount')";
  insert($qs);
  alert("Item added to Cart.");
  return redirect ('customer_view_cart.php');
  }
}
}

 ?>
<script type="text/javascript">
  function TextOnTextChange()
  {
    var x =document.getElementById("qty").value;
    var y =document.getElementById("amt").value;
    document.getElementById("t_amount").value = x * y;
  }

</script> 



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
    <div class="container">

    <div class="row">
        <h1 align="center" style="margin: 1em;">Add to Cart</h1>
        <div class="col-md-4 col-lg-4">
            
             <div class="w3l-news " id="homeblog">
        <div class="container py-lg-5 py-md-4 py-2" id="ss">
            <div class="row justify-content-">
                 
<?php 
    $q="SELECT * FROM `tbl_book` inner join `tbl_subcategory` using(Subcat_Id) inner join `tbl_purchild` using(Book_Id) where Book_Id='$id'";
    $res=select($q);
    $r="SELECT * FROM `tbl_book` inner join `tbl_purchild` using(Book_Id) where Book_Id ='$id'";
    $req=select($r);
 ?>
  
                <!-- <div class="col-lg-4 col-md-6 mt-lg-4 mt-4"> -->
                    <div class="grids5-info" >
                        <a href="#blog" class="blog-image d-block zoom" style="height:370px"><img src="<?php echo $res[0]['Book_Img']?>">
                            
                        </a>
                        <!-- <div class="blog-info card-body blog-details"> -->
                            <!-- <div class="d-flex align-items-center justify-content-between">
                                <a href="#author" class="post"><i class="fas fa-user"></i> Mauree</a>
                                <h6 class="date"><i class="fas fa-clock"></i> Nov 16, 2021.</h6>
                            </div> -->
<center>
                            <h4><?php echo $res[0]['Subcat_Name']?> <?php echo $res[0]['Book_Title']?></h4>
                        <p>Author: <?php echo $res[0]['Book_Author']?>GB , Publisher: <?php echo $res[0]['Book_Publisher']?>GB</p>
                        <p>Publish Date: <?php echo $res[0]['Book_Publication_Date']?></p>
                        <p>Book Added Date: <?php echo $res[0]['Book_Date_Added']?></p>
                        <!-- <p>Camera</p> --> 
                        <!-- <p>Front Camera: <?php echo $res[0]['frontcamera']?></p>
                        <p>Back Camera: <?php echo $res[0]['backcamera']?></p>
                        <p>Battery: <?php echo $res[0]['battery']?></p> -->
                        <br>
                        <h5>Rs. <?php echo $req[0]['Selling_price']?></h5>
                        </center>
                    </div>


             
            <!--     <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="box-wrap">
                        <div class="icon">
                        </div>
                        <h4 class="number">02</h4>
                        <h4><a href="#url">Trust</a></h4>
                        <p>We understand your needs better than anyone else. We help you not to just choose a product but complete package including warranty of the product.</p>
                    </div>
                </div>  -->
               <!--  <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                    <div class="box-wrap">
                        <div class="icon">
                        </div>
                        <h4 class="number">03</h4>
                        <h4><a href="#url">Experience</a></h4>
                        <p>Immersive experience is key to our brand and we bring the products close to you to ensure the experience is long lasting. With various offers, we have something for all!</p>
                    </div>
                </div> -->
            </div>
        </div>
        </div>
        </div>
        <div class="col-md-6 col-lg-8">
        
    
                          <center><br><br>
                      <form method="post" >
                      
                        <!-- <h2 style="font-family: ;color: #fff;">Manage Brand</h2><br> -->
                        <div class="form-group col-md-6">
                            <h5>Item</h5>
                            <br>
                            
                            <input type="text" name="item" placeholder="Item" class="form-control" readonly style="opacity: .7;" value="<?php echo $res[0]['Book_Title']?>">
                          </div><br><br>
                          <div class="form-group col-md-6">
                            <h5>Price</h5>
                            <br>
                             
                            <input type="text" name="price" placeholder="Price" class="form-control" readonly style="opacity: .7;" id="amt" value="<?php echo $res[0]['Selling_price']?>">

                          </div><br><br>
                          <div class="form-group col-md-6">
                            <h5>Quantity</h5>
                            <br>
                            
                            <input type="number" min="1" max="<?php echo $stock; ?>" title="Maximum Order Quantity : <?php echo $stock; ?>" name="qty" placeholder="Enter Quantity" class="form-control" required style="opacity: .7;" onchange="TextOnTextChange()" id="qty">
                          </div><br><br>
                          <div class="form-group col-md-6">
                            <h5>Total Amount</h5>
                            <br>
                            
                            <input type="text" name="t_amount" placeholder="Total Amount" class="form-control" required style="opacity: .7;" id="t_amount">
                          </div><br>
                          <div class="form-group col-md-6"><br>
                          <input type="submit" name="button"  class="btn btn-style" value="Add to Cart" >
                        </div>
                      </form>
                      </center>
</div>
        </div>
        </div>
                      <br><br>
<!-- </div> -->
                    </div>
                </div>
                <div class="hero-overlay"></div>
            </div>
            <!-- hero slide end -->
           
           
        </div>
    </div>

    <?php include 'footer.php' ?>