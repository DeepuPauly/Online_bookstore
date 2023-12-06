<?php include 'connection.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_vendor where Vendor_id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $c="update tbl_vendor set Vendor_name='$name',V_Phno='$phone',V_City='$city',V_Street='$street',V_Dist='$dist',V_Pin='$pin',Vendor_Status='$status' where Vendor _Id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('adminviewvendor.php');

 } 

  if (isset($_GET['a_id'])) 
 {
   extract($_GET);
  $e="update tbl_vendor set Vendor_Status='1' where Vendor_id='$a_id'";
  update($e);
   alert('updated successfully');
  return redirect('adminviewvendor.php');
 }

  if (isset($_GET['i_id'])) 
 {
   extract($_GET);
  $iss="update tbl_vendor set Vendor_Status='0' where Vendor_id='$i_id'";
  update($iss);
   alert('updated successfully');
    return redirect('adminviewvendor.php');
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
  <h1>Vendor Details</h1>
    

<table class="table" border="2">
  <tr>
    <th>Sl.NO</th>
    <th>Staff Name</th>
    <th>Vendor Name</th>
    <th>Email Id</th>
    <th>Phone Number</th>
    <th>City</th>
    <th>Street</th>
    <th>District</th>
    <th>Pincode</th>
    <th>Status</th>
  </tr>
  <?php
  $hanna = "
 SELECT `Staff_id`,Vendor_id,`Vendor_name`,`V_Phno`,`V_Street`,`V_Dist`,`V_Pin`,`V_City`,`vendor_email`,Vendor_Status,`Staff_Fname` FROM `tbl_vendor`INNER JOIN `tbl_staff`USING(`Staff_Id`) GROUP BY Staff_Id
 UNION
  SELECT `Staff_id`,Vendor_id,`Vendor_name`,`V_Phno`,`V_Street`,`V_Dist`,`V_Pin`,`V_City`,`vendor_email`,Vendor_Status,NULL FROM tbl_vendor
 ";
  $hasna = select($hanna);
  $slno = 1;

  foreach ($hasna as $key) {
  ?>
    <tr>
      <td><?php echo $slno++ ?></td>
      <td><?php echo $key['Staff_Fname'] ?></td>
      <td><?php echo $key['Vendor_name'] ?></td>
      <td><?php echo $key['vendor_email'] ?></td>
      <td><?php echo $key['V_Phno'] ?></td>
      <td><?php echo $key['V_City'] ?></td>
      <td><?php echo $key['V_Street'] ?></td>
      <td><?php echo $key['V_Dist'] ?></td>
      <td><?php echo $key['V_Pin'] ?></td>
      <td><?php echo $key['Vendor_Status'] ?></td>
 <?php if ($key['Vendor_Status'] == '0') { ?>
        <td>
          <a href="?a_id=<?php echo $key['Vendor_id'] ?>">
            <button type="button" class="btn">Active</button>
          </a>
        </td>
      <?php } elseif ($key['Vendor_Status'] == '1') { ?>
        <td>
          <a href="?i_id=<?php echo $key['Vendor_id'] ?>">
            <button type="button" class="btn">Inactive</button>
          </a>
        </td>
      <?php } ?>
      <td>
        <a href="?u_id=<?php echo $key['Vendor_id'] ?>">
          <button type="button" class="btn">Update</button>
        </a>
      </td>
    </tr>
  <?php } ?> 
</table>



   </center>
