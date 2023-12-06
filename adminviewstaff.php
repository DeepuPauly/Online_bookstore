<?php include 'connection.php'?>
<?php include 'adminpanelheader.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_staff where Staff_Id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $c="update tbl_staff set Staff_Fname='$fname',Staff_Lname='$lname',Staff_City='$city',Staff_Dist='$district',Staff_Pin='$pin',Staff_Street='$street',Staff_Phone='$phone',Staff_Gender='$gender',Staff_DOB='$DOB' where Staff_Id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('adminviewstaff.php');

 } 

 if (isset($_GET['a_id'])) 
{
  extract($_GET);
 $e="update tbl_staff set Staff_Status='1' where Staff_Id='$a_id'";
 update($e);

 $k="update tbl_login set Status='1' where Username='$oo'";
 update($k);

  alert('updated successfully');
 return redirect('adminviewstaff.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_staff set Staff_Status='0' where Staff_Id='$i_id'";
 update($iss);

 $kk="update tbl_login set Status='0' where Username='$llid'";
 update($kk);

  alert('updated successfully');
   return redirect('adminviewstaff.php');
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
      width: 25%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 6px;
      text-align: left;
    }

    th {
      background-color: black;
    }

    h1 {
      text-align: center;
    }

    input[type="text"] {
      width: 90%;
      padding: 6px;
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

  <?php 

if (isset($_GET['u_id'])) 
{ ?>

  <form method="POST">
    <table>
      <tr>
        <th>Firstname</th>
        <td><input type="text" name="fname" value="<?php echo $b[0]['Staff_Fname'] ?>"></td>
      </tr>
      <tr>
        <th>Lastname</th>
        <td><input type="text" name="lname" value="<?php echo $b[0]['Staff_Lname'] ?>" ></td>
      </tr>
      <tr>
        <th>City</th>
        <td><input type="text" name="city" value="<?php echo $b[0]['Staff_City'] ?>"></td>
      </tr>
      <tr>
        <th>District</th>
        <td><input type="text" name="district" value="<?php echo $b[0]['Staff_Dist'] ?>"></td>
      </tr>
       <tr>
        <th>Pincode</th>
        <td><input type="text" name="pin" value="<?php echo $b[0]['Staff_Pin'] ?>"></td>
      </tr>
      <th>Street</th>
        <td><input type="text" name="street" value="<?php echo $b[0]['Staff_Street'] ?>"></td>
      </tr>
      <tr>
      <th>Phone</th>
        <td><input type="text" maxlength="10" name="phone" value="<?php echo $b[0]['Staff_Phone'] ?>"></td>
      </tr>
      <tr>
      <th>Gender</th>
        <td><input type="text" name="gender" value="<?php echo $b[0]['Staff_Gender'] ?>"></td>
      </tr>
      <tr>
      <th>DOB</th>
        <td><input type="text" name="DOB" value="<?php echo $b[0]['Staff_DOB'] ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>


<?php }

   ?>   
  <h1>Staff Report</h1>
      <table class="table" border="2">
        <tr>
          <th>SI.NO</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>City</th>
        <th>District</th>
        <th>Pincode</th>
         <th>Street</th>
          <th>Phone</th>
           <th>Gender</th>
            <th>DOB</th>
             <th>Status</th>
            </tr>

      <?php
      $q="select * from `tbl_staff` ";
      $res=select($q);
      $slno=1;

      foreach ($res as $key ) {

       ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
         <td> <?php echo $key['Username'] ?></td>
          <td> <?php echo $key['Staff_Fname'] ?></td>
           <td> <?php echo $key['Staff_Lname'] ?></td>
           <td> <?php echo $key['Staff_City'] ?></td>
             <td> <?php echo $key['Staff_Dist'] ?></td>
               <td> <?php echo $key['Staff_Pin'] ?></td>
                 <td> <?php echo $key['Staff_Street'] ?></td>
                  <td> <?php echo $key['Staff_Phone'] ?></td>
                 <td> <?php echo $key['Staff_Gender'] ?></td>
                 <td> <?php echo $key['Staff_DOB'] ?></td>
                 <td> <?php echo $key['Staff_Status'] ?></td>

              <?php if ($key['Staff_Status'] == '0'){?>
                  <td><a href="?a_id=<?php echo $key['Staff_Id'] ?> &oo=<?php echo $key['Username'] ?>"> <button type="button" class="btn">Active</button></a></td>
                <?php } elseif ($key['Staff_Status'] == '1') {
                   ?>
                  <td><a href="?i_id=<?php echo $key['Staff_Id'] ?> &llid=<?php echo $key['Username'] ?>""> <button type="button" class="btn">Inactive</button></a></td>
                <?php } ?>
                  <td><a href="?u_id=<?php echo $key['Staff_Id'] ?>"> <button type="button" class="btn">Update</button></a></td>






       </tr>
            <?php } ?>

      </table>


   </center>

   <br><br><br><br>
    <a class='btn btn-success' style="color: white; margin-left: 1300px;" href="staffreport.php">PRINT</a>
