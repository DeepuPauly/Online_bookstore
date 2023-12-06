<?php include 'adminheader.php';
extract($_GET);

if(isset($_GET['assign'])) 
{
  extract($_GET);
  echo $rr="insert into tbl_courier_assign values(null,'$cart_mid','$assign',curdate())";
  insert($rr);
echo $qqq="update tbl_payment set courier_id='$assign' where Payment_Id='$payment_id'";
update($qqq);
echo $qq="update tbl_mastcart set cart_status='assigned to courier' where mastcart_id='$cart_mid'";
  update($qq);
echo   $fc="insert into tbl_delivery values(null,curdate(),'$cart_mid','$assign',DATE_ADD(CURDATE(), INTERVAL 7 DAY))";
  insert($fc);
  // $ggh="update tbl_order set reachable=0 where order_id='$order_id'";
  // update($ggh);
  alert("Successfully Assigned");
 return redirect("admin_view_sales.php");
}
if(isset($_GET['unassign'])) 
{
  extract($_GET);
  $rr="insert into tbl_courier_assign values(null,'$cart_mid','$unassign',curdate())";
  insert($rr);
$qqq="update tbl_payment set courier_id='$unassign' where Payment_Id='$payment_id'";
update($qqq);
$qq="update tbl_mastcart set cart_status='assigned to courier' where mastcart_id='$cart_mid'";
  update($qq);
  $fc="insert into tbl_delivery values(null,curdate(),'$cart_mid','$unassign',DATE_ADD(CURDATE(), INTERVAL 7 DAY))";
  insert($fc);
  $ggh="update tbl_order set reachable=0 where order_id='$order_id'";
  update($ggh);
 $kkl="delete from tbl_delivery where Courier_Id='$c_id' and Delivery_Id='$dele'";
  delete($kkl);
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


<?php  
$ggg="select * from tbl_order inner join tbl_delivery using(mastcart_id) where order_id='$order_id' and reachable='Unreachable'";
$re=select($ggg);
if (sizeof($re)>0) 
{
  $c_id=$re[0]['Courier_Id'];
 $hh="select * from tbl_courier where Courier_Id!='$c_id'";
  $ree=select($hh);
  if (sizeof($ree)>0) 
  {
    ?>

<table class="table" style="width: 1300px">
    <tr>
      <th>NAME</th>
      <th>MOBILE NUMBER</th>
      <th>LOCATION</th>    
    </tr> 
  
       
    </tr>

    <?php 


      $q=" SELECT * FROM tbl_courier where Cs_Status='1' and Courier_Id!='$c_id' ";
      $res11=select($q);
      
        foreach ($res11 as $row) { ?>
          <tr>
            <td><?php echo $row['Cs_Name']; ?></td>
            <td><?php echo $row['Cs_Phno']; ?></td>
          <!--   <td><?php echo $row['courier_address']; ?></td> -->
                        <td><a href="?unassign=<?php echo $row['Courier_Id']?>&c_id=<?php echo $c_id; ?>&order_id=<?php echo $order_id ?>&payment_id=<?php echo $pay;?>&cart_mid=<?php echo $cart_mid; ?>&dele=<?php echo $dele ?>" class="btn btn-success">Assign</a></td>
  
                        </tr>
          
      <?php }
      
     ?>
  </table>





  <?php }
}
else
{



?>   


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


 <?php  }
 ?>



  
</center>
