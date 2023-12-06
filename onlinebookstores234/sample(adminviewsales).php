<?php include 'connection.php';
 include 'adminpanelheader.php'; 
if (isset($_GET['cart_mid']))
{
   extract($_GET);
    echo$c="UPDATE `tbl_mastcart` SET `cart_status` ='Paid' WHERE `mastcart_id`='$cart_mid'";
   $d=update($c);
   echo$myq="UPDATE `tbl_courier`  SET `Cs_Status`='0' WHERE `Username`='$Username'";
   $myres=update($myq);
  echo$myqrr="UPDATE `tbl_login`  SET `Status`='0' WHERE `Username`='$Username'";
   $myresss=update($myqrr);
    alert('updated successfully');
    return redirect('admin_view_sales.php');

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: black; /* Change to black */
            color: white;
            margin: 0;
            padding: 0;
        }


        /* Other styles can also be added here */
    </style>
</head>
<body>
    <!-- Rest of your HTML content -->
</body>
</html>


<!-- ======= Hero Section ======= -->
<!-- <section id="hero" class="d-flex align-items-center justify-content-center" style="height: 200px;">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-6 col-lg-8"> -->
        <!-- <h1>Powerful Digital Solutions With Gp<span>.</span></h1> -->
        <!-- <h1 style="color: #FFC541; font-family: Freestyle Script Regular ">Sales Details..</h1> -->
     <!--  </div>
    </div>
  </div>
</section> --><!-- End Hero -->

<main id="main">
  <!-- ======= Team Section ======= -->

  <section class="h-100 gradient-custom">
    <h1 align="center" style=" font-size: 35px;">Sales Report<a href="salesreport.php"></a></h1>
    <div class="container py-5">
      <div class="row d-flex justify-content-center my-4">
        <?php
        $q = "SELECT *,`tbl_mastcart`.`cart_status` AS ostatus FROM `tbl_order` INNER JOIN `tbl_mastcart` USING(`mastcart_id`) INNER JOIN `tbl_childcart` USING(`mastcart_id`) INNER JOIN tbl_payment USING(`mastcart_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) INNER JOIN `tbl_category` USING(`Cat_Id`) INNER JOIN `tbl_customer` ON `tbl_mastcart`.`Cust_Id`=`tbl_customer`.`Cust_Id`  WHERE `tbl_mastcart`.`cart_status` !='Pending' ORDER BY Book_Date_Added DESC";
        $res1 = select($q);
        if (sizeof($res1) > 0) {
          $i = 0;
          foreach ($res1 as $row) { ?>
            <div class="col-md-8 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Image -->
                      <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                        <img src="<?php echo $row['Book_Img']; ?>" class="w-100" alt="Blue Jeans Jacket" />
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                      </div>
                      <!-- Image -->
                    </div>
                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                      <!-- Data -->
                      <p><strong>Customer Name:<?php echo $row['C_Fname']; ?> <?php echo $row['C_Lname']; ?></strong></p>
                      <p><strong><?php echo $row['Book_Title']; ?></strong></p>
                      <p>Category: <?php echo $row['Cat_Name']; ?></p>
                      <p>Subcategory: <?php echo $row['Subcat_Name']; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <form action="" method="post">
                        <div class="d-flex mb-4" style="max-width: 300px">
                          <input type="hidden" name="cart_mid<?php echo $i; ?>" value="<?php echo $row['mastcart_id']; ?>"></td>
                          <input type="hidden" name="cart_cid<?php echo $i; ?>" value="<?php echo $row['childcart_id']; ?>"></td>
                          <input type="hidden" name="rate<?php echo $i; ?>" value="<?php echo $row['child_totamt']; ?>"></td>
                          <div class="form-outline">
                            Quantity  <input id="form1" min="1" readonly name="quantity<?php echo $i; ?>" value="<?php echo $row['quantity']; ?>" type="number" class="form-control" />
                            <label class="form-label" for="form1"></label>
                          </div>
                        </div>
                      </form>
                      <!-- Quantity -->
                      <!-- Price -->

                      <p class="text-start text-md-center">
                        <strong>₹<?php echo $row['tot_amount']; ?></strong>
                      </p>
                      <p class="text-start text-md-center">
                        <strong><?php echo $row['ostatus']; ?></strong>
                      </p>
                      <?php if ($row['ostatus'] == "Paid") { ?>
                        <p class="text-start text-md-center">
                          <strong><a href="admin_assign_to_courire_service.php?payment_id=<?php echo $row['Payment_Id']; ?>&cart_mid=<?php echo $row['mastcart_id']; ?>"><button style="color: red;" type="button" class="btn">Assign To Courier Service</button></a></strong>
                        </p>
                       <?php    } else {
                ?>
                <?php
$myqry = "SELECT *,`tbl_courier`.`Username` AS mycourier FROM `tbl_courier` inner join `tbl_delivery` using(`Courier_Id`)INNER JOIN `tbl_mastcart` USING(`mastcart_id`) INNER JOIN tbl_customer USING(Cust_Id) WHERE `tbl_mastcart`.`cart_status` ='assigned to courier'  ORDER BY `expected_date` DESC";
$myval = select($myqry);
$currentDate = date('Y-m-d'); // Get the current date
foreach($myval as $myrow){  
    if (date('Y-m-d', strtotime($myval[0]['expected_date'])) == $currentDate) {
        ?>
        <p class="text-start text-md-center">
            <strong><a href="?cart_mid=<?php echo $myrow['mastcart_id']; ?>&Username=<?php echo $myrow['mycourier']; ?>&Cust_Id=<?php echo $myrow['Cust_Id']; ?>">Resign</a></strong>
        </p>

                     
        <?php $i++;
          }
        }
      }
    }
        } ?>

                    </div>
                  </div>
                  <hr class="my-4" />
                </div>
              </div>
            </div>
      </div>
    </div>
  </section>
</main>
