<?php
include('connection.php');

session_start();
$userId = $_SESSION['User_ID'];
$usertype = $_SESSION['User_Type'];

//dashboard box values 

$result1=mysqli_query($conn,"SELECT * FROM tbl_staff");
$staff_num=mysqli_num_rows($result1);

$result2=mysqli_query($conn,"SELECT * FROM tbl_courier");
$courier_num=mysqli_num_rows($result2);

$result3=mysqli_query($conn,"SELECT * FROM tbl_vendor");
$vendor_num=mysqli_num_rows($result3);

$result4=mysqli_query($conn,"SELECT * FROM tbl_customer");
$customer_num=mysqli_num_rows($result4);

$result5=mysqli_query($conn,"SELECT * FROM tbl_category");
$category_num=mysqli_num_rows($result5);

// $result6=mysqli_query($conn,"SELECT * FROM tbl_type");
// $type_num=mysqli_num_rows($result6);

// $result7=mysqli_query($conn,"SELECT * FROM tbl_brand");
// $brand_num=mysqli_num_rows($result7);

$result8=mysqli_query($conn,"SELECT * FROM tbl_book");
$appliances_num=mysqli_num_rows($result8);

$result9=mysqli_query($conn,"SELECT * FROM tbl_purmaster");
$purchase_num=mysqli_num_rows($result9);

//$result10=mysqli_query($conn,"SELECT * FROM tbl_sales");
//$sales_num=mysqli_num_rows($result10);




//session buttons
if(isset($_POST['home']))
{
  header('location:index.php');
}
if(isset($_POST['destroy']))
{
  session_unset();
  session_destroy();
  header('location:index.php');
}
//staff status update

if(isset($_POST['update_staff']))
{
  $updateid = $_POST['staff_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_Staff.php');
}
if(isset($_POST['activate_staff_status_button']))
{
    $staff_id = $_POST['staff_id'];
    mysqli_query($conn,"UPDATE tbl_staff SET Staff_Status=1 WHERE Staff_ID='$staff_id'");
}

if(isset($_POST['deactivate_staff_status_button']))
{
    $staff_id = $_POST['staff_id'];
    mysqli_query($conn,"UPDATE tbl_staff SET Staff_Status=0 WHERE Staff_ID='$staff_id'");
}
//vednor status button
if(isset($_POST['update_vendor']))
{
  $updateid = $_POST['vendor_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_Vendor.php');
}
if(isset($_POST['activate_vendor_status_button']))
{
    $vendor_id = $_POST['vendor_id'];
    mysqli_query($conn,"UPDATE tbl_vendor SET Vendor_Status=1 WHERE Vendor_ID='$vendor_id'");
}

if(isset($_POST['deactivate_vendor_status_button']))
{
    $vendor_id = $_POST['vendor_id'];
    mysqli_query($conn,"UPDATE tbl_vendor SET Vendor_Status=0 WHERE Vendor_ID='$vendor_id'");
}

//courier status button
if(isset($_POST['update_cour']))
{
  $updateid = $_POST['cour_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_Courier.php');
}
if(isset($_POST['activate_cour_status_button']))
{
    $cour_id = $_POST['cour_id'];
    mysqli_query($conn,"UPDATE tbl_courier SET Cour_Status=1 WHERE Cour_ID='$cour_id'");
}

if(isset($_POST['deactivate_cour_status_button']))
{
    $cour_id = $_POST['cour_id'];
    mysqli_query($conn,"UPDATE tbl_courier SET Cour_Status=0 WHERE Cour_ID='$cour_id'");
}

//cust status button
if(isset($_POST['activate_cust_status_button']))
{
    $cust_id = $_POST['cust_id'];
    mysqli_query($conn,"UPDATE tbl_customer SET Cust_Status=1 WHERE Cust_ID='$cust_id'");
}

if(isset($_POST['deactivate_cust_status_button']))
{
    $cust_id = $_POST['cust_id'];
    mysqli_query($conn,"UPDATE tbl_customer SET Cust_Status=0 WHERE Cust_ID='$cust_id'");
}
//appliance status button
if(isset($_POST['update_app']))
{
  $updateid = $_POST['app_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_appliance.php');
}
//purchase button
if(isset($_POST['purchase_app']))
{
  $updateid = $_POST['app_id'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Make_purchase.php');
}
//category status button
if(isset($_POST['update_cat']))
{
  $updateid = $_POST['cat_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_Category.php');
}
//type status button
if(isset($_POST['update_type']))
{
  $updateid = $_POST['type_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_Type.php');
}
//brand status button
if(isset($_POST['update_brand']))
{
  $updateid = $_POST['brand_updateid'];
  $_SESSION['Update_ID'] = $updateid;
  header('location:Update_Brand.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!--google fonts_--> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <style>
body
{
background-color: rgb(255, 255, 255);
margin:0px;
padding:0px;
overflow:hidden;
}
a
{
  text-decoration: none;
  color: rgb(256,256,256);
}
.outer-div
{
    width:100%;
    height:100%;
}

.top-navigation
{
    height: 11vh;
    width:100%;
    background-color:rgb(193, 231, 249);
    position: fixed;
}
.logo
{
    height: 10vh;
    width:17%;
    background-image:url('picture3.png');
    background-size: cover;
}
.top-navigation-list
{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    float: right;
    height: 100%;
    width: 85%;
    margin-top:-5%;
    margin-left: 18%;
}
.top-navigation-list li
{
    list-style: none;
    margin-right: 0.3%;
}
.buttons,.logout-button
{
  transition: 0.3s ease-in-out;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-weight: 450;
  font-size: 14px;
  background-color:transparent;
  color:rgb(0,0,0);
  outline: none;
  box-shadow: none;
  border-style:none;
  border-radius: 0px;
}
.buttons:hover
{
  background-color:rgb(0,0,0,0.1);
  border-style:none;
  border-radius: 0px;
}
.buttons:focus
{
  background-color:rgb(42,85,229);
  color:rgb(256,256,256);

}
.logout-button:hover
{
  background-color:rgb(239 51 36);
  color:rgb(256,256,256);
}
.logout-button:focus
{
  background-color:rgb(239 51 36);
  color:rgb(256,256,256);
}

.home-box:hover
{
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-weight: 550;
  color:rgb(0,0,0);
  display: flex;
  justify-content: center;
  align-items: center;
}

.section
{
  height:100vh;
  justify-content: center;
  align-items: center;

}

/*dashboard css content*/
.dashboard-content
{
  background-color:transparent;
}
.cards-outer
{
    margin-inline-start: 5%;
    display: inline-flex;
    margin-block-start: 8%;
    height: auto;
    width: 105%;
}

.card-n-outer
{
    height: 16%;
    width: 18%;
    padding: 1%;
    margin-inline-start: 3%;
    background-color:rgb(0,0,0);
    border-radius: 9px;
    transition: 0.3s ease-in-out;
}
.card-n-inner
{
    height: 100%;
    width: 100%;;
    background-color:none;
    transition: 0.3s ease-in-out;
}
.card-n-image{
  height: 10%;
    width: 5%;
    margin: -3.1%;
    background-size: cover;
    position: absolute;
    z-index: 1;

}
.card1,.card2,.card3,.card4
{
    height: 20%;
    width: 20%;
    background-color:rgb(177, 228, 252);
    border-radius: 9px;
    transition: 0.3s ease-in-out;
    margin: auto;
    margin-top: 20vh;
}
.card1
{
  background-color:rgb(249, 201, 80);
}
.card2
{
  background-color:rgb(240,107,97);
}
.card3
{
  background-color:rgb(66,134,244);
}
.card4
{
  background-color:rgb(103,195,128);
}
.card1:hover,.card2:hover,.card3:hover,.card4:hover
{
    box-shadow: 0px 0px 10px 0px rgb(154, 223, 255);
    height:21%;
    width:21%;
}
.card-text-heading
{
  font-size: 99%;
    color: rgb(256,256,256);
    font-family: serif;
    font-weight: 700;
    text-align: center;
    margin-top: 7%;
}
.card-text-content
{
  font-size: 213%;
    color: rgb(256,256,256);
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-weight: 900;
    text-align: center;
}
p{
margin-top: 0;
margin-bottom: -0.5rem;
}

.staff-content,.vendor-content,.customer-content,
.product-content,.courier-content,.category-content,
.type-content,.brand-content,.appliances-content,
.purchase-content,.sales-content,.assign-content{
  display: flex;
  justify-content: center;
  align-items: center;
}
.view_table
{
  background-color: rgb(256,256,256);
  width:100%;
  table-layout:auto;
  
}
.view_table tr{
  height: 35px;
}
.view_table th{
text-align:center;
position: sticky;
top: 0;
background-color:rgb(42,85,229);
color:rgb(256,256,256);
}
.view_table th,td
{
  margin: 1px;
  padding: 1px;
  border-color: rgb(0, 0, 0, 0.5);
  /*width:auto;
  white-space: nowrap;  Prevents text from wrapping in cells 
  overflow: hidden; /* Prevents content from overflowing cells 
  text-overflow: ellipsis; /* Shows ellipsis (...) for truncated text */
}
.view_table tbody tr:nth-child(odd) {
  background-color: rgb(0,0,0,0.1); /* Set your desired background color */
/* Set text color for better contrast */
}
.add_buttons,.add_buttons:hover,.add_buttons:active
{
  background-color:rgb(0,0,0);
  color:rgb(256,256,256);
}
/*deactivate and activate buttons*/
.deactivate_button,.deactivate_button:hover,.deactivate_button:active
{
  background-color:rgb(239 51 36);
  color:rgb(256,256,256);
  margin:auto;
}
.activate_button,.activate_button:hover,.activate_button:active
{
  background-color:rgb(78 198 111);
  color:rgb(256,256,256);
  margin:auto;
}


/*Staff css content*/
.staff-content-inner
{   
margin-top: 10vh;
height: 80vh;
width: 99%;
background-color:rgb(182 232 255);
}
.staff-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.staff-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}

/*Courier css content*/
.courier-content-inner
{   
  margin-top: 10vh;
  height: 80vh;
  width: 99%;
  background-color:rgb(182 232 255);
  
}
.courier-content-inner-top{
  height:20%;
  width:100%;
  background-color:rgb(54, 46, 212,0.9);
  padding:3%;
}
.courier-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
  overflow-y:scroll;
}

/*Vendor css content*/
.vendor-content-inner
{   
  margin-top: 10vh;
  height: 80vh;
  width: 99%;
  background-color:rgb(182 232 255);
  
}
.vendor-content-inner-top{
  height:20%;
  width:100%;
  background-color:rgb(54, 46, 212,0.9);
  padding:3%;
}
.vendor-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
/*Customer css content*/
.customer-content-inner
{   
margin-top: 10vh;
height: 80vh;
width: 98%;
background-color:rgb(182 232 255); 
}
.customer-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.customer-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}

/*Category css content*/
.category-content-inner
{
  margin-top: 10vh;
  height: 80vh;
  width: 90%;
  background-color:rgb(182 232 255);
}
.category-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.category-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}

/*type css content*/
.type-content-inner
{   
    margin-top: 10vh;
    height: 80vh;
    width: 90%;
    background-color:rgb(182 232 255);
}
.type-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.type-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}
/*brand css content*/
.brand-content-inner
{   
    margin-top: 10vh;
    height: 80vh;
    width: 90%;
    background-color: rgb(182 232 255);
}
.brand-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.brand-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}

/*appliances css content*/
.appliances-content-inner
{   
margin-top: 10vh;
height: 80vh;
width: 98%;
background-color:rgb(182 232 255); 
}
.appliances-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.appliances-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}
/*purchase css content*/
.purchase-content-inner
{   
    margin-top: 10vh;
    height: 80vh;
    width: 90%;
    background-color: rgb(182 232 255);
}
.purchase-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.purchase-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}
/*assign css content*/

/*sales css content*/
.sales-content-inner
{   
    margin-top: 10vh;
    height: 80vh;
    width: 90%;
    background-color: rgb(55, 24, 95);
}
.sales-content-inner-top{
height:20%;
width:100%;
background-color:rgb(54, 46, 212,0.9);
padding:3%;
}
.sales-content-inner-bottom
{
  padding-top: 1%;
  padding-inline:1%;
}
.view_table_wrapper {
  max-height: 60vh; /* Set the desired maximum height */
  overflow-y: scroll;
}


/*product css content*/
.product-content-inner
{   
    margin-top: 10vh;
    height: 80vh;
    width: 90%;
    background-color: rgb(55, 24, 95);
}
</style>
</head>
  <body>