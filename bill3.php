<?php include 'connection.php';
 $cid=$_SESSION['Cust_id'];
extract($_GET);
?>


<?php 

 $sel="select * from tbl_customer where Cust_Id='$cid'";
 $row=select($sel);

 // $rel="select * from tbl_order where order_id='$id'";
 // $rows=select($rel);

extract($_GET);
 ?>
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online Book Store</title>
    <div id="div_print" >

    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body onload="printDiv()">

    <header class="clearfix">
      <div id="logo">
        <!--<img src="logo.png">-->
      </div>
      <h1>THE BOOKSPOT</h1>
      <div id="company" class="clearfix">
        <div>Customer Name</div>
        <div> <?php  echo $row[0]['C_Fname'];?><?php  echo $row[0]['C_Lname'];?><br />               
     </div>
      </div>
      <div id="project">
        <!-- <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div> -->
        <div><span>ADDRESS:</span> Rajagiri Valley, Kakkanad, Kerala</div>
        <div><span>PHONE NO:</span> +91 9083928982</div>
        
        <div><span>DATE:</span> <?php echo $d=date("y/m/d"); ?></div>
      </div>
    </header>
    <main>
      <h2 align="center" style="opacity:0.6;margin-bottom: 20px;margin-top: 10px;">INVOICE</h2>
      <table>
        <thead>
          <tr>
            <th class="service">SLNO.</th>
            <th>BILL.NO</th>
            <th class="desc">ITEM</th>
            <th>ORDER DATE</th>

            <th>QTY</th>
            <th>AMOUNT</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $re=rand();
    date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d');
 $q = "SELECT * FROM `tbl_order` INNER JOIN `tbl_mastcart` USING (`mastcart_id`) INNER JOIN `tbl_childcart` USING (`mastcart_id`) INNER JOIN `tbl_book` USING (`Book_Id`) INNER JOIN `tbl_customer` USING (`Cust_Id`) WHERE Cust_Id='$cid' AND order_id='$id'";

$res=select($q);
     $slno=1;

    foreach ($res as $row) {
      ?>
         <tr>
         <td><?php echo $slno++; ?></td>
        <td><?php echo $re++ ?></td>
        <td><?php echo $row['Book_Title'] ?></td> 
        <td><?php echo $row['order_date'] ?></td>
        <td><?php echo $row['quantity'] ?></td>
        <td><?php echo $row['child_totamt'] ?></td>
     <?php
       }
       
     ?>
     <?php 
     if(sizeof($res)>0)
     { ?>
       <tr><th colspan='4'>Total:</th><th> Rs. <?php echo $row['tot_amount'] ?> </th></tr>
     <?php } ?>
     
          
        </tbody>
      </table>
    
    <a href="customer_myorders.php" class="btn btn-primary">Back</a>
    </main>
    <footer>
      Invoice was created on a computer and is valid seal.
    </footer>
  </body>
</html>

<style type="text/css">
  .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: center;
}

table td {
  padding: 20px;
  text-align: center;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
</style>