<?php include 'adminheader.php';
extract($_GET);

if(isset($_GET['assign'])) 
{
  extract($_GET);
  $rr="insert into tbl_courier_assign values(null,'$cart_mid','$assign',curdate())";
  insert($rr);
$qqq="update tbl_payment set courier_id='$assign' where Payment_Id='$payment_id'";
update($qqq);
$qq="update tbl_mastcart set cart_status='assigned to courier' where mastcart_id='$cart_mid'";
  update($qq);
  $fc="insert into tbl_delivery values(null,curdate(),'$cart_mid','$assign',DATE_ADD(CURDATE(), INTERVAL 7 DAY))";
  insert($fc);
  alert("Successfully Assigned");
   
 return redirect("admin_view_sales.php");

}
 ?>

 
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center"  style="height: 300px;">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
        <h1 style="color: #FFC541; font-family: Freestyle Script Regular ">Courier Details..</h1>



</div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

<br>
<center>
 <!-- <h4>Courier Details</h4> -->
  <table class="table" style="width: 1300px">
    <tr>
      <th>NAME</th>
      <th>MOBILE NUMBER</th>
      <th>LOCATION</th>    
    </tr> 
  
       
    </tr>

    <?php 
      $q=" SELECT * FROM tbl_courier where Cs_Status='1'";
      $res11=select($q);
      
        foreach ($res11 as $row) { ?>
          <tr>
            <td><?php echo $row['Cs_Name']; ?></td>
            <td><?php echo $row['Cs_Phno']; ?></td>
          <!--   <td><?php echo $row['courier_address']; ?></td> -->
                        <td><a href="?assign=<?php echo $row['Courier_Id']?>&payment_id=<?php echo $pay;?>&cart_mid=<?php echo $cart_mid; ?>" class="btn btn-success">Assign</a></td>
  
                        </tr>
          
      <?php }
      
     ?>
  </table>
</center>
