<?php include 'connection.php'?>
<?php include 'adminpanelheader.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_subcategory where Subcat_Id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $c="update tbl_subcategory set Subcat_Name='$subname',Subcat_Desc='$subdesc',subcat_status='$status' where Subcat_Id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('viewsubcategory.php');

 } 

  if (isset($_GET['a_id'])) 
{
  extract($_GET);
 $e="update tbl_subcategory set subcat_status='1' where Subcat_Id='$a_id'";
 update($e);

  alert('updated successfully');
 return redirect('adminviewsubcategory.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_subcategory set subcat_status='0' where Subcat_Id='$i_id'";
 update($iss);

  alert('updated successfully');
   return redirect('adminviewsubcategory.php');
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

  <?php 

if (isset($_GET['u_id'])) 
{ ?>

  <form method="POST">
    <table>
      <tr>
        <th>Subcategory Name</th>
        <td><input type="text" name="subname" value="<?php echo $b[0]['Subcat_Name'] ?>"></td>
      </tr>
      <tr>
        <th>Subcategory Description</th>
        <td><input type="text" name="subdesc" value="<?php echo $b[0]['Subcat_Desc'] ?>" ></td>
      </tr>
       <tr>
        <th>Status</th>
        <td><input type="text" name="status" value="<?php echo $b[0]['subcat_status'] ?>" ></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>


<?php }

   ?>   
  <h1>Subcategory Details</h1>
      <table class="table" border="2">
        <tr>
          <th>Sl.NO</th>
        <th>Subcategory Name</th>
         <th>Subcategory Description</th>
        <th>Status</th>
            </tr>

      <?php
      $q="select * from `tbl_subcategory` ";
      $res=select($q);
      $slno=1;

      foreach ($res as $key ) {

       ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
         <td> <?php echo $key['Subcat_Name'] ?></td>
           <td> <?php echo $key['Subcat_Desc'] ?></td>
            <td> <?php echo $key['subcat_status'] ?></td>

             <?php if ($key['subcat_status'] == '0'){?>
                  <td><a href="?a_id=<?php echo $key['Subcat_Id'] ?> "> <button type="button" class="btn">Active</button></a></td>

                <?php } elseif ($key['subcat_status'] == '1') {
                   ?>
                  <td><a href="?i_id=<?php echo $key['Subcat_Id'] ?>"> <button type="button" class="btn">Inactive</button></a></td>
                <?php } ?>

            <td><a href="?u_id=<?php echo $key['Subcat_Id'] ?>"><button type="button" class="btn">Update</button></a></td>

        

       </tr>
            <?php } ?>

      </table>


   </center>
   <br><br><br>

    <a class='btn btn-success' style="color: white; margin-left: 1200px;" href="subcatreport.php">PRINT</a>

