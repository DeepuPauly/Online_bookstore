<?php
include 'connection.php';


if (isset($_GET['cart_mid'])) {
    extract($_GET);

    $c = "UPDATE `tbl_mastcart` SET `cart_status` ='Paid' WHERE `mastcart_id`='$cart_mid'";
    $d = update($c);

    $myq = "UPDATE `tbl_courier`  SET `Cs_Status`='0' WHERE `Username`='$Username'";
    $myres = update($myq);

    $myqrr = "UPDATE `tbl_login`  SET `Status`='0' WHERE `Username`='$Username'";
    $myresss = update($myqrr);

    echo "<script>alert('Updated successfully');</script>";
    header('Location: admin_view_sales.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: black;
            color: white;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #333;
            text-align: left;
        }
        th {
            background-color: #444;
            color: white;
        }
        .button-style {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    background-color: blue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.button-style:hover {
    background-color: darkred;
}

    </style>
</head>
<body>
<main id="main">
    <section class="h-100 gradient-custom">  <div class="container py-5">
        <h1 align="center" style="font-size: 35px;">Sales Report<a href="salesreport.php"></a></h1>
      
            <table>
                <!-- Table Header -->
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Book Title</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch and display sales details
                    $q = "SELECT *,`tbl_mastcart`.`cart_status` AS ostatus FROM `tbl_order` INNER JOIN `tbl_mastcart` USING(`mastcart_id`) INNER JOIN `tbl_childcart` USING(`mastcart_id`) INNER JOIN tbl_payment USING(`mastcart_id`) INNER JOIN `tbl_book` USING(`Book_Id`) INNER JOIN `tbl_subcategory` USING(`Subcat_Id`) INNER JOIN `tbl_category` USING(`Cat_Id`) INNER JOIN `tbl_customer` ON `tbl_mastcart`.`Cust_Id`=`tbl_customer`.`Cust_Id`  WHERE `tbl_mastcart`.`cart_status` !='Pending' ";
                    $res1 = select($q);

                    if (sizeof($res1) > 0) {
                        foreach ($res1 as $row) {
                            echo "<tr>";
                            echo "<td>{$row['C_Fname']} {$row['C_Lname']}</td>";
                            echo "<td>{$row['Book_Title']}</td>";
                            echo "<td>{$row['Cat_Name']}</td>";
                            echo "<td>{$row['Subcat_Name']}</td>";
                            echo "<td>{$row['quantity']}</td>";
                            echo "<td>₹{$row['tot_amount']}</td>";
                             echo "<td>₹{$row['child_totamt']}</td>";
                            echo "<td>{$row['ostatus']}</td>";
                            echo "<td>";
                            if ($row['ostatus'] == "Paid") {
                                echo "<a class='button-style'  href='admin_assign_to_courire_service.php?payment_id={$row['Payment_Id']}&cart_mid={$row['mastcart_id']}'>Assign</a>";
                            }
                            elseif ($row['ostatus'] == "Order Pick Up"){
                              echo "<a class='button-style' href='?cart_mid={$row['mastcart_id']}&Username={$row['Username']}&Cust_Id={$row['Cust_Id']}'>Reassign</a>";
                            }

                             else {
                                
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>

                </tbody>
            </table>

        </div>
        
    </section>
  <a class='button-style' style="color: white; margin-left: 1200px;" href="salesreport.php">PRINT</a>
</main>
</body>
</html>
