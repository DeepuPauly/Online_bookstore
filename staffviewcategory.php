<?php include 'connection.php'?>
<?php include 'staffpanelheader.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_category where Cat_Id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $c="update tbl_category set Cat_Name='$cname',Cat_Description='$cdesc' where Cat_Id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('staffviewcategory.php');

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
        <th>Category Name</th>
        <td><input type="text" name="cname" value="<?php echo $b[0]['Cat_Name'] ?>"></td>
      </tr>
      <tr>
        <th>Category Description</th>
        <td><input type="text" name="cdesc" value="<?php echo $b[0]['Cat_Description'] ?>" ></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>


<?php }

   ?>   
  <h1>Category Details</h1>
      <table class="table" border="2">
        <tr>
          <th>Sl.NO</th>
        <th>Category Name</th>
         <th>Category Description</th>
        
            </tr>

      <?php
      $q="select * from `tbl_category` ";
      $res=select($q);
      $slno=1;

      foreach ($res as $key ) {

       ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
         <td> <?php echo $key['Cat_Name'] ?></td>
           <td> <?php echo $key['Cat_Description'] ?></td>
           <td><a href="?u_id=<?php echo $key['Cat_Id'] ?>"><button type="button" class="btn">Update</button></a></td>

        

       </tr>
            <?php } ?>

      </table>


   </center>


    <br><br><br>
 <a class='btn btn-success' style="color: white; margin-left: 1200px;" href="catreport.php">PRINT</a>
