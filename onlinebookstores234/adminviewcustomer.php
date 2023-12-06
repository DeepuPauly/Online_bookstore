<?php include 'connection.php'?>
<?php include 'adminpanelheader.php';

if (isset($_GET['a_id'])) 
{
  extract($_GET);
 $e="update tbl_customer set C_Status='1' where Cust_Id='$a_id'";
 update($e);

  $k="update tbl_login set Status='1' where Username='$oo'";
 update($k);

  alert('updated successfully');
 return redirect('adminviewcustomer.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_customer set C_Status='0' where Cust_Id='$i_id'";
 update($iss);

 $kk="update tbl_login set Status='0' where Username='$llid'";
 update($kk);
 
  alert('updated successfully');
   return redirect('adminviewcustomer.php');
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
                     <a href="?a_id=<?php echo $key['Cust_Id'] ?> &oo=<?php echo $key['Username'] ?>"> <button type="button" class="btn">Active</button></a>
                   </td><?php }elseif ($key['C_Status'] == '1') {
                   ?>
                  <td><a href="?i_id=<?php echo $key['Cust_Id'] ?> &llid=<?php echo $key['Username'] ?>"><button type="button" class="btn">Inactive</button></a></td>
                <?php } ?>



       </tr>
            <?php } ?>

      </table>


   </center>
   <br><br><br><br>
    <a class='btn btn-success' style="color: white; margin-left: 1200px;" href="custreport.php">PRINT</a>
