<?php include 'connection.php';

if (isset($_GET['u_id'])) 
{
  extract($_GET);
  $a="select * from tbl_subcategory where Subcat_Id='$u_id'";
  $b=select($a);
}
if (isset($_POST['submit'])) 
{
   extract($_POST);
   $c="update tbl_subcategory set Subcat_Name='$subname',Subcat_Desc='$subdesc' where Subcat_Id='$u_id'";

   $d=update($c);
   alert('updated successfully');
   return redirect('viewsubcategory.php');

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
        <th>Subcategory Name</th>
        <td><input type="text" name="subname" value="<?php echo $b[0]['Subcat_Name'] ?>"></td>
      </tr>
      <tr>
        <th>Subcategory Description</th>
        <td><input type="text" name="subdesc" value="<?php echo $b[0]['Subcat_Desc'] ?>" ></td>
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
            <td><a href="?u_id=<?php echo $key['Subcat_Id'] ?>"><button type="button" class="btn">Update</button></a></td>
        

       </tr>
            <?php } ?>

      </table>


   </center>
