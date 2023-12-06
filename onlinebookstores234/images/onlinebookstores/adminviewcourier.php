

<?php include 'connection.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_courier where Courier_Id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $c="update tbl_courier set Cs_Name='$name',Cs_Phno='$phone',Cs_City='$city',Cs_Street='$street',Cs_Dist='$dist',Cs_Pin='$pin',Cs_Status='$status' where Courier_Id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('adminviewcourier.php');

 } 
if (isset($_GET['a_id'])) 
{
  extract($_GET);
 $e="update tbl_courier set Cs_Status='1' where Courier_Id='$a_id'";
 update($e);
  alert('updated successfully');
 return redirect('adminviewcourier.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_courier set Cs_Status='0' where Courier_Id='$i_id'";
 update($iss);
  alert('updated successfully');
   return redirect('adminviewcourier.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  
</head>
<body>

</body>
</html>
<center>

   <?php 

if (isset($_GET['u_id'])) 
{ ?>

  <form method="POST">
    <table>
      <tr>
        <th>Name</th>
        <td><input type="text" name="name" value="<?php echo $b[0]['Cs_Name'] ?>" ></td>
      </tr>
      <tr>
        <th>Phone Number</th>
        <td><input type="text" name="phone" value="<?php echo $b[0]['Cs_Phno'] ?>"></td>
      </tr>
      <tr>
      <th>City</th>
        <td><input type="text" name="city" value="<?php echo $b[0]['Cs_City'] ?>"></td>
      </tr>
      <tr>
      <th>Street</th>
        <td><input type="text" name="street" value="<?php echo $b[0]['Cs_Street'] ?>"></td>
      </tr>
      <tr>
        <th>District</th>
        <td><input type="text" name="dist" value="<?php echo $b[0]['Cs_Dist'] ?>"></td>
      </tr>
      <tr>
        <th>Pincode</th>
        <td><input type="text" name="pin" value="<?php echo $b[0]['Cs_Pin'] ?>"></td>
      </tr>
      <tr>
      <th>Status</th>
        <td><input type="text" name="status" value="<?php echo $b[0]['Cs_Status'] ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>


<?php }

   ?>   
  <h1>Courier Details</h1>
      <table class="table" border="2">
        <tr>
          <th>Sl.NO</th>
        <th>Staff Name</th>
         <th>Username</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>City</th>
        <th>Street</th>
        <th>District</th>
        <th>Pincode</th>
         <th>Status</th>
            </tr>

      <?php
      $hanna="select *,`tbl_courier`.`Username` AS coname from tbl_courier inner join tbl_staff using(Staff_Id)";
      $hasna=select($hanna);
      $slno=1;

      foreach ($hasna as $key ) {

       ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
          <td> <?php echo $key['Staff_Fname'] ?></td>
         <td> <?php echo $key['coname'] ?></td>
           <td> <?php echo $key['Cs_Name'] ?></td>
           <td> <?php echo $key['Cs_Phno'] ?></td>
             <td> <?php echo $key['Cs_City'] ?></td>
               <td> <?php echo $key['Cs_Street'] ?></td>
                 <td> <?php echo $key['Cs_Dist'] ?></td>
                  <td> <?php echo $key['Cs_Pin'] ?></td>
                  <td> <?php echo $key['Cs_Status'] ?></td>

                   <?php if ($key['Cs_Status'] == '0'){?>
                  <td>
                     <a href="?a_id=<?php echo $key['Courier_Id'] ?>"> <button type="button" class="btn">Active</button></a>
                   </td><?php }elseif ($key['Cs_Status'] == '1') {
                   ?>
                  <td><a href="?i_id=<?php echo $key['Courier_Id'] ?>"><button type="button" class="btn">Inactive</button></a></td>
                <?php } ?>
                  <td><a href="?u_id=<?php echo $key['Courier_Id'] ?>"><button type="button" class="btn">Update</button></a></td>

                 
               </tr>
            <?php } ?>

      </table>


   </center>
