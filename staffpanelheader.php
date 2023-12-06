<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Admin Page</title>
    <style type="text/css">
      /* Reset some default styles */
body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
}

body {
    font-family: "Times New Roman", Times, serif;
    background-color: #f0f0f0;
    color: white;

}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin-bottom: 25px;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline-block;
    margin-right: 50px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
}

/* Dropdown Styles */
.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    width: 100%;
    overflow: auto;
    background-color: #000000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
    border-radius: 20px;
  background:black;
  padding: 10px;
  width: 170px;
  height: 140px;
}

main {
    padding: 10px;
}

section {
    background-color: #fff;
    background-image: url(a3.jpg);
    background-size: 100%;
    background-repeat: no-repeat; 
    padding: 180px;
    border-radius: 5px;
    font-size: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: #fff;
}

    </style>
</head>
<body>
    <header>
        <!-- <h1>Product Report</h1><br> -->
        <nav>
            <ul>
               &nbsp&nbsp&nbsp<li><a href="staffpanel.php">Home</a></li>


                    <li class="dropdown">
                     Customer 
                    <div class="dropdown-content"><a href="staffviewcustomer.php">View Customer</a><br><br>

                            
                    
<!-- 
                <li class="dropdown">
                    &nbsp&nbsp Staff &nbsp  
                    <div class="dropdown-content">
                    <br><a href="adminstaff.php">Add Staff</a><br><br>
                        <a href="adminviewstaff.php">View Staff</a><br><br>
 -->
                <li class="dropdown">
                    &nbsp&nbsp Purchase &nbsp&nbsp
                    <div class="dropdown-content">
                    <br><a href="staff_manage_purchase.php">Manage Purchase</a><br><br>
                    <!--     <a href="admin_purchase_item.php">Item Purchase</a><br><br> -->
                        <a href="staff_view_purch.php">View Purchase</a>



                    <li class="dropdown">
                    &nbsp&nbsp Courier &nbsp&nbsp
                    <div class="dropdown-content">
                    <br><a href="staffcourier.php">Add Courier</a><br><br>
                     <a href="staffviewcourier.php">View Courier</a>

                    <li class="dropdown">
                    &nbsp&nbsp Vendor &nbsp&nbsp
                    <div class="dropdown-content">
                    <br><a href="staffvendor.php">Add Vendor</a><br><br>
                        <a href="staffviewvendor.php">View Vendor</a><br><br>
            

                    <li class="dropdown">
                    &nbsp&nbsp Book &nbsp&nbsp
                    <div class="dropdown-content">
                    <br><a href="staffproduct.php">Add Book</a><br><br>
                        <a href="staffviewproduct.php">View Book</a><br><br>

                    <li class="dropdown">
                    &nbsp&nbsp Category &nbsp&nbsp
                    <div class="dropdown-content">
                    <br><a href="staffcategory.php">Add Category</a><br><br>
                        <a href="staffviewcategory.php">View Category</a><br><br>

                    <li class="dropdown">
                    &nbsp&nbsp SubCategory &nbsp&nbsp
                    <div class="dropdown-content">
                    <br><a href="staffsubcategory.php">Add Subcategory</a><br><br>
                        <a href="staffviewsubcategory.php">View Subcategory</a><br><br>
                       <li><a href="homepage.php">Logout</a></li>
                    </div>
                  </div>
                </div>
              </div>
                  </div>
                </div>
              </li>
              </li>
            </li>
                  </li>
                  </li>
                </li>
            </ul>
        </nav>
    </header>