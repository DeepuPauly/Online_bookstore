<?php include 'connection.php';
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
   return redirect('adminviewcategory.php');

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
