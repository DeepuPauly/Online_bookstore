<?php include 'connection.php'?>
<?php include 'adminpanelheader.php';
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

  
  <h1>Purchase Details</h1>
      <table class="table" border="2">
        <tr>
          <th>SI.NO</th>
       <th>Purchase ID</th>
                <th>Item Name</th>
                <th>Vendor Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Selling Price</th>
                <th>Purchase Date</th>
            </tr>

       <?php 
         if (isset($_POST['sale'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`)where Pm_Date='$daily' and purch_status!='Pending'";
           }
            else if ($monthly!="") {

            
             // $q="SELECT *,`tbl_childpurch`.`purch_quantity` AS cqnty FROM `tbl_mastpurch` INNER JOIN `tbl_childpurch` USING(`mastpurch_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN `tbl_item` USING(`item_id`) INNER JOIN `tbl_brand` USING(`brand_id`) where purch_date like '$monthly%' and purch_status!='Pending'";
               $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) where `Pm_Date`  like '$monthly%' and purch_status!='Pending'";

             }

              else if ($customer!="") {

            
             // $q="SELECT *,`tbl_childpurch`.`purch_quantity` AS cqnty FROM `tbl_mastpurch` INNER JOIN `tbl_childpurch` USING(`mastpurch_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN `tbl_item` USING(`item_id`) INNER JOIN `tbl_brand` USING(`brand_id`) where v_name like '$customer%' and purch_status!='Pending'";
                 $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`)where `Vendor_name` like '$customer%' and purch_status!='Pending'";

             }
           }
             else{
             // $q="SELECT *,`tbl_childpurch`.`purch_quantity` AS cqnty FROM `tbl_mastpurch` INNER JOIN `tbl_childpurch` USING(`mastpurch_id`) INNER JOIN `tbl_vendor` USING(`vendor_id`) INNER JOIN `tbl_item` USING(`item_id`) INNER JOIN `tbl_brand` USING(`brand_id`) WHERE purch_status!='Pending'";
               $q="SELECT *,`tbl_purchild`.`Purch_quantity` AS cqnty FROM `tbl_purmaster` INNER JOIN `tbl_purchild` USING(`Pm_Id`) INNER JOIN `tbl_vendor` USING(`Vendor_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) WHERE purch_status!='Pending'";
            }
          

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

       $i=1;
       foreach ($res as $row) {

        

        ?>


       <tr>
         
         <td><?php echo $i++; ?></td>
                    <td><?php echo $row['Pm_Id']; ?></td>
                    <td><?php echo $row['Book_Title']; ?></td>
                    <td><?php echo $row['Vendor_name']; ?></td>
                    <td><?php echo $row['Purch_quantity']; ?></td>
                    <td><?php echo $row['Cost_Price']; ?></td>
                    <td><?php echo $row['Selling_price']; ?></td>
                    <td><?php echo $row['Pm_Date']; ?></td>

            


       </tr>
            <?php } ?>

      </table>


   </center>
   <br><br><br>

    <a class='btn btn-success' style="color: white; margin-left: 1200px;" href="purchreport.php">PRINT</a>

