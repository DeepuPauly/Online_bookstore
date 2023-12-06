<?php include 'connection.php'?>
<?php include 'staffpanelheader.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_vendor where Vendor_id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
  $c="update tbl_vendor set Vendor_name='$name',V_Phno='$phone',V_Street='$street',V_Dist='$dist',V_Pin='$pin',V_City='$city',vendor_email='$email',Vendor_Status='$status' where Vendor_id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('staffviewvendor.php');

 } 

  if (isset($_GET['a_id'])) 
 {
   extract($_GET);
  $e="update tbl_vendor set Vendor_Status='1' where Vendor_id='$a_id'";
  update($e);
   alert('updated successfully');
  return redirect('staffviewvendor.php');
 }

  if (isset($_GET['i_id'])) 
 {
   extract($_GET);
  $iss="update tbl_vendor set Vendor_Status='0' where Vendor_id='$i_id'";
  update($iss);
   alert('updated successfully');
    return redirect('staffviewvendor.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: black;
      margin: 0;
      padding: 0;
    }

    center {
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: black;
    }

    h1 {
      text-align: center;
    }

    input[type="text"] {
      width: 100%;
      padding: 5px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    .btn {
      background-color: #3498db;
      color: white;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      margin: 2px 2px;
    }

    .btn:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>
  <center>
    <!-- Your PHP and HTML code goes here -->
  </center>
</body>
</html>
<center>

  <center>

  <?php 

if (isset($_GET['u_id'])) 
{ ?>

  <form method="POST">
    <table>
      <tr>
        <th>Vendor Name</th>
        <td><input type="text" name="name" value="<?php echo $b[0]['Vendor_name'] ?>"></td>
      </tr>
       <tr>
        <th>Vendor Email</th>
        <td><input type="text" name="email" value="<?php echo $b[0]['vendor_email'] ?>"></td>
      </tr>
      <tr>
        <th>City</th>
        <td><input type="text" name="city" value="<?php echo $b[0]['V_City'] ?>"></td>
      </tr>
      <tr>
        <th>District</th>
        <td><input type="text" name="dist" value="<?php echo $b[0]['V_Dist'] ?>"></td>
      </tr>
       <tr>
        <th>Pincode</th>
        <td><input type="text" name="pin" value="<?php echo $b[0]['V_Pin'] ?>"></td>
      </tr>
      <th>Street</th>
        <td><input type="text" name="street" value="<?php echo $b[0]['V_Street'] ?>"></td>
      </tr>
      <tr>
      <th>Phone</th>
        <td><input type="text" maxlength="10" name="phone" value="<?php echo $b[0]['V_Phno'] ?>"></td>
      </tr>
       <tr>
      <th>Status</th>
        <td><input type="text" name="status" value="<?php echo $b[0]['Vendor_Status'] ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>


<?php }

   ?>   
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

 <br><br><br>
 <a class='btn btn-success' style="color: white; margin-left: 1200px;" href="vendorreport.php">PRINT</a>