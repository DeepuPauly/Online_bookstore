<?php include 'connection.php'?>
<?php include 'staffpanelheader.php';
if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_book where Book_Id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $path="images/".$_FILES['img']['name'];
    $nam=uniqid();
    $filetype=strtolower(pathinfo($path,PATHINFO_EXTENSION));
    $target1="images/".$nam.".".$filetype;
    move_uploaded_file($_FILES['img']['tmp_name'], $target1);



   $c="update tbl_book set Book_Title='$title',Book_Author='$author',Book_Publisher='$publisher',Book_Publication_Date='$publication_date',Book_Description='$bookdesc',Book_Price='$price',Book_Status='$status',Profit_Percentage='$profitper',Book_Img='$target1'  where Book_Id='$u_id'";

   $d=update($c);
    alert('updated successfully');
    return redirect('staffviewproduct.php');

 } 

 if (isset($_GET['a_id'])) 
{
  extract($_GET);
 $e="update tbl_book set Book_Status='1' where Book_Id='$a_id'";
 update($e);
  alert('updated successfully');
 return redirect('staffviewproduct.php');
}

 if (isset($_GET['i_id'])) 
{
  extract($_GET);
 $iss="update tbl_book set Book_Status='0' where Book_Id='$i_id'";
 update($iss);
  alert('updated successfully');
   return redirect('staffviewproduct.php');
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

  <form method="POST" enctype="multipart/form-data">
    <table>


      <tr>
        <th>Title</th>
        <td><input type="text" name="title" value="<?php echo $b[0]['Book_Title'] ?>"></td>
      </tr>
      <tr>
        <th>Author_Name</th>
        <td><input type="text" name="author" value="<?php echo $b[0]['Book_Author'] ?>" ></td>
      </tr>
      <tr>
        <th>Publisher_Name</th>
        <td><input type="text" name="publisher" value="<?php echo $b[0]['Book_Publisher'] ?>"></td>
      </tr>
      <tr>
        <th>Publication_Date</th>
        <td><input type="text" name="publication_date" maxlength="10" value="<?php echo $b[0]['Book_Publication_Date'] ?>"></td>
      </tr>
       <tr>
        <th>Description</th>
        <td><input type="text" name="bookdesc" value="<?php echo $b[0]['Book_Description'] ?>"></td>
      </tr>
      <th>Price</th>
        <td><input type="text" name="price" value="<?php echo $b[0]['Book_Price'] ?>"></td>
      </tr>
      
      <tr>
      <th>Status</th>
        <td><input type="text" name="status" value="<?php echo $b[0]['Book_Status'] ?>"></td>
      </tr>
      <tr>
      <th>Profit_Percentage</th>
        <td><input type="text" name="profitper" value="<?php echo $b[0]['Profit_Percentage'] ?>"></td>
      </tr>
       <tr>
      <th>Image</th>
        <td><input type="file" name="img" value="<?php echo $b[0]['Book_Img'] ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit"></td>
      </tr>
    </table>
  </form>


<?php }
?>  

  <h1>Product Report</h1>
      <table class="table" border="2">
        <tr>
          <th>SI.NO</th>
          <th>Category</th>
          <th>Subcategory</th>
        <th>Title</th>
        <th>Author_Name</th>
        <th>Publisher_Name</th>
        <th>Publication_Date</th>
        <th>Description</th>
          <th>Price</th>
         <th>Status</th>
          <th>Profit_Percentage</th>
           <th>Image</th>                                                        
            </tr>

      <?php
  $hanna = "SELECT * FROM `tbl_book`INNER JOIN `tbl_subcategory` USING (`Subcat_Id`) INNER JOIN `tbl_category` USING (`Cat_Id`)";

  $hasna = select($hanna);
  $slno = 1;

  foreach ($hasna as $key) {
  ?>


       <tr>
         
         <td> <?php echo $slno++ ?></td>
           <td> <?php echo $key['Cat_Name'] ?></td>
             <td> <?php echo $key['Subcat_Name'] ?></td>
         <td> <?php echo $key['Book_Title'] ?></td>
          <td> <?php echo $key['Book_Author'] ?></td>
           <td> <?php echo $key['Book_Publisher'] ?></td>
           <td> <?php echo $key['Book_Publication_Date'] ?></td>
             <td> <?php echo $key['Book_Description'] ?></td>
               <td> <?php echo $key['Book_Price'] ?></td>
                
                  <td> <?php echo $key['Book_Status'] ?></td>
                 <td> <?php echo $key['Profit_Percentage'] ?></td>
                 <td> <img src="<?php echo $key['Book_Img'] ?>" width=50px></td>


                 <?php if ($key['Book_Status'] == '0'){?>
                  <td><a href="?a_id=<?php echo $key['Book_Id'] ?>" > <button type="button" class="btn">Active</button></a></td>
                <?php } elseif ($key['Book_Status'] == '1') {
                   ?>
                  <td><a href="?i_id=<?php echo $key['Book_Id'] ?>"> <button type="button" class="btn">Inactive</button></a></td>
                <?php } ?>
                  <td><a href="?u_id=<?php echo $key['Book_Id'] ?>"> <button type="button" class="btn">Update</button></a></td>

                 
              







       </tr>
            <?php } ?>

      </table>


   </center>

    <br><br><br>
 <a class='btn btn-success' style="color: white; margin-left: 1200px;" href="productreport.php">PRINT</a>
