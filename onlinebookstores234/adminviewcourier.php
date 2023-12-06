<?php include 'connection.php'?>
<?php include 'adminpanelheader.php';
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
 $e="update tbl_courier set Cs_Status='1' where courier_id='$a_id'";
 update($e);

  $k="update tbl_login set Status='1' where Username='$oo'";
 update($k);
  alert('updated successfully');
 return redirect('adminviewcourier.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_courier set Cs_Status='0' where courier_id='$i_id'";
 update($iss);

  $kk="update tbl_login set Status='0' where Username='$llid'";
 update($kk);

  alert('updated successfully');
   return redirect('adminviewcourier.php');
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

    .center {
      margin-top: 20px;
    }

    table {
      width: 25%;
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
      width: 90%;
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
</body>
</html>
<center>

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
  <br><br><h1>Courier Details</h1>
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
     $hanna="SELECT Staff_Id,courier_id,`tbl_courier`.Username,Cs_Name,Cs_Phno,Cs_City,Cs_Street,Cs_Dist,Cs_Pin,Cs_Status,Staff_Fname FROM tbl_courier INNER JOIN `tbl_staff`USING(Staff_Id) WHERE Staff_Id !='' UNION SELECT '0',courier_id,`tbl_courier`.Username,Cs_Name,Cs_Phno,Cs_City,Cs_Street,Cs_Dist,Cs_Pin,Cs_Status, NULL AS Staff_Fname FROM tbl_courier  WHERE Staff_Id=''


       ";
      $hasna=select($hanna);
      $slno=1;

      foreach ($hasna as $key ) {

       ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
          <td> <?php echo $key['Staff_Fname'] ?></td>
         <td> <?php echo $key['Username'] ?></td>
           <td> <?php echo $key['Cs_Name'] ?></td>
           <td> <?php echo $key['Cs_Phno'] ?></td>
             <td> <?php echo $key['Cs_City'] ?></td>
               <td> <?php echo $key['Cs_Street'] ?></td>
                 <td> <?php echo $key['Cs_Dist'] ?></td>
                  <td> <?php echo $key['Cs_Pin'] ?></td>
                  <td> <?php echo $key['Cs_Status'] ?></td>

                  <?php if ($key['Cs_Status'] == '0')  { ?>
        <td><a href="?a_id=<?php echo $key['courier_id'] ?>&oo=<?php echo $key['Username']?>"> <button type="button" class="btn">Active</button></a></td>

        <?php }elseif ($key['Cs_Status'] == '1') {

          ?>
        <td><a href="?i_id=<?php echo $key['courier_id'] ?>&llid=<?php echo $key['Username']?>""><button type="button" class="btn">Inactive</button></a></td>

       
       <?php } ?>
        <td><a href="?u_id=<?php echo $key['courier_id'] ?>"> <button type="button" class="btn">UPDATE</button></a></td>

      
</tr>

            <?php } ?>

      </table>


   </center>

   <br><br><br><br>
    <a class='btn btn-success' style="color: white; margin-left: 1100px;" href="courierreport.php">PRINT</a>