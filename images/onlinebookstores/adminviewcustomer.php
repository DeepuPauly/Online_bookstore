<?php include 'connection.php';

if (isset($_GET['a_id'])) 
{
  extract($_GET);
 $e="update tbl_customer set C_Status='1' where Cust_Id='$a_id'";
 update($e);
  alert('updated successfully');
 return redirect('adminviewcustomer.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_customer set C_Status='0' where Cust_Id='$i_id'";
 update($iss);
  alert('updated successfully');
   return redirect('adminviewcustomer.php');
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
  <h1>Customer Details</h1>
      <table class="table" border="2">
        <tr>
          <th>Sl.NO</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>City</th>
        <th>District</th>
        <th>Street</th>
         <th>Pincode</th>
          <th>Phone</th>
           <th>DOB</th>
            <th>Gender</th>
             <th>Status</th>
            </tr>

      <?php
      $q="select * from `tbl_customer` ";
      $res=select($q);
      $slno=1;

      foreach ($res as $key ) {

       ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
         <td> <?php echo $key['Username'] ?></td>
           <td> <?php echo $key['C_Fname'] ?></td>
           <td> <?php echo $key['C_Lname'] ?></td>
             <td> <?php echo $key['C_Address'] ?></td>
               <td> <?php echo $key['C_City'] ?></td>
                 <td> <?php echo $key['C_Dist'] ?></td>
                  <td> <?php echo $key['C_Street'] ?></td>
                 <td> <?php echo $key['C_Pin'] ?></td>
                 <td> <?php echo $key['C_Phone'] ?></td>
                 <td> <?php echo $key['C_DOB'] ?></td>
                  <td> <?php echo $key['C_Gender'] ?></td>
                   <td> <?php echo $key['C_Status'] ?></td>

                 <?php if ($key['C_Status'] == '0'){?>
                  <td>
                     <a href="?a_id=<?php echo $key['Cust_Id'] ?>"> <button type="button" class="btn">Active</button></a>
                   </td><?php }elseif ($key['C_Status'] == '1') {
                   ?>
                  <td><a href="?i_id=<?php echo $key['Cust_Id'] ?>"><button type="button" class="btn">Inactive</button></a></td>
                <?php } ?>



       </tr>
            <?php } ?>

      </table>


   </center>
