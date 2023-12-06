
<?php include 'connection.php';
extract($_GET);
?>

<?php
if (isset($_POST['button'])) 
{
  extract($_POST);

  // echo $totamt=$_POST['totamt'];
   $myq = "select * from  tbl_book where Book_Id='$item_id'";
    $c = select($myq);
    $profitPer = (int)$c[0]['Profit_Percentage'];
    $percentage = ($price * $profitPer) / 100;
  $sprice = $price + $percentage;

  $qt="select * from `tbl_purmaster` where Vendor_id='$vname' and purch_status='pending' ";
  $r=select($qt);
  if(sizeof($r)>0)
  {
    $puid=$r[0]['Pm_Id'];
    $u="select * from `tbl_purmaster` inner join `tbl_purchild` using(Pm_Id) where Book_Id='$item_id'";
    $j=select($u);
    if (sizeof($j)>0) 
    {         
            $hy="update tbl_purmaster set total_amt=total_amt+'$totamt' where Pm_Id='$puid'";
            update($hy);
            $m="update tbl_purchild set Cost_Price='$price',Selling_price='$sprice',Purch_quantity=Purch_quantity+'$qty' where Book_Id='$item_id'";
            update($m);
             return redirect('admin_manage_purchase.php');
 
    }else{
             $hy="update tbl_purmaster set total_amt=total_amt+'$totamt' where Pm_Id='$puid'";
            update($hy);
            $qs="insert into tbl_purchild values(NULL,'$puid','$item_id','$qty','$price','$sprice','available')";
            insert($qs);
             return redirect('admin_manage_purchase.php');
          
    }
  } else{


  $q="insert into tbl_purmaster values(NULL,'0','$vname',curdate(),'$totamt','pending')";
  $ids=insert($q);
  $qs="insert into tbl_purchild values(NULL,'$ids','$item_id','$qty','$price','$sprice','available')";
  insert($qs);
   return redirect('admin_manage_purchase.php');
  }
 }

 ?>
<!-- <script type="text/javascript">
  function TextOnTextChange()
  {
    var x =document.getElementById("qty").value;
    var y =document.getElementById("amt").value;
    var z = 0.2 * y;
    var r = Number(y) + Number(z);
    document.getElementById("t_amount").value = x * y;
    document.getElementById("pic").value = r;
  }

</script>  -->

<script type="text/javascript">
  function TextOnTextChange()
  {
    var x =document.getElementById("amt").value;
    var y =document.getElementById("qty").value;
    document.getElementById("t_amount").value = x * y;
  }

</script> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<head>

<style type="text/css">
        /* Basic form styling for better presentation */
        body {
            background-color: : black;
            font-family: Arial, sans-serif;
            margin: 0; /* Remove default margin to fill the entire viewport */
            padding: 0; /* Remove default padding */
        }
/* Add top margin to create space below the navigation bar */
            header#header {
    position: fixed;
    top: 0; /* Reduce this value to move the navigation bar higher */
    left: 0;
    width: 100%;
   background-color: rgba(0, 0, 0, 0.8); /* Transparent background color */
    transition: all 0.3s ease-in-out;
    z-index: 997;
    padding: 20px 0;
}
     header#header a {
    color: white; /* Text color for links in the navigation bar */
}

/* Change the link color on hover */
header#header a:hover {
    color: #ff9900;
    }  
        /* Create a semi-transparent black overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Change the alpha value (0.5) for transparency */
            z-index: 1; /* Place the overlay on top of other content */
        }

        form {
            max-width: 500px;
            margin: 100px auto 0;;
            position: relative; /* Make sure the form is relative to the overlay */
            z-index: 2; /* Place the form above the overlay */
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Set a transparent background color for the form */
            color: white;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .input-box {
            background-color: transparent; /* Set the background color to transparent for the input box */
            padding: 20px;
            border-radius: 4px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: transparent;
            color: white;
        }

        button {
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: brown;
       }
    }
</style>
</head>
    <!-- hero slider Start -->
    <div class="banner-wrap">
        <div class="banner-slider">
            <!-- hero slide start -->
            <div class="banner-slide bg1">
                <div class="container">
                    <div class="hero-content">
                        
                        <!-- <div class="card" style="width: 500px;margin-top: 5em;opacity: .7;border-radius: 3%;"> -->
                          <center>
                      <form style="width: 620px; margin-top: 10%;" method="post" >
                          <h2 style="color: #fff;">PURCHASE</h2><br>
                        <!-- <h2 style="font-family: ;color: #fff;">Manage Variant</h2><br> -->
                          <div class="form-group col-md-6">
                            <label for="ram">Vendor</label>
                          <select id="inputState" placeholder="Select Vendor" name="vname" class="form-control" style="opacity: 0.7" required>
                          <option selected>Select Vendor</option>
                          <?php
                          $q1="SELECT * FROM `tbl_vendor` where Vendor_Status='1'";
                          $res=select($q1);
                         foreach ($res as $row)
                {
                  ?>
                  <option value="<?php echo $row['Vendor_id'] ?>"> <?php echo $row['Vendor_name'] ?></option>
                <?php
                }
                ?>
              </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="rabc">Quantity</label>
                            <input type="text" name="qty" placeholder="Enter Quantity" id="qty" class="form-control"  required style="opacity: .7;">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="racb">Cost Price</label>
                            <input type="text" id="amt" name="price" placeholder="Enter Price" class="form-control" required style="opacity: .7;" onchange="TextOnTextChange()">
                          </div>
                        <!--    <div class="form-group col-md-6">
                            <label for="racb">Selling Price</label>
                            <input type="text" id="pic" name="sprice" placeholder="Enter Price" class="form-control" required style="opacity: .7;" >
                          </div> -->
                          <div class="form-group col-md-6">
                            <label for="bca">Total Amount</label>
                            <input type="text" name="totamt" id="t_amount" required="" placeholder="Total Amount" class="form-control" required style="opacity: .7;">
                          </div>
                          <div class="form-group col-md-6"><br>
                          <input type="submit" name="button" class="btn btn-primary" value="Add to Cart" style="opacity: .7;">
                        </div>
                      </form>
                      </center>
<!-- </div> -->
                    </div>
                </div>
                <div class="hero-overlay"></div>
            </div>
            <!-- hero slide end -->
           
           
        </div>
    </div>
    <!-- hero slider end -->

