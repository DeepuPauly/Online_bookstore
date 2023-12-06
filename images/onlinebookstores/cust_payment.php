<?php include 'loggedinheader.php'; 
 $cid=$_SESSION['cust_id'];

 extract($_GET);

if (isset($_POST['Payment'])) {
   extract($_POST);

   $exp=$date;
   $today=date("Y-m");

   if ($exp < $today) {
        alert('Your Card have been Expired.');
   }
   else{

   $q="insert into tbl_order values(null,'$masterid',curdate())";
   $q1=insert($q);
   $qr="select * from tbl_card where card_no='$cardno'";
   $hh=select($qr);
   if(sizeof($hh)>0)
   {
     $ooi=$hh[0]['card_id'];
     $q4="insert into tbl_payment values(null,'$q1','$ooi','0',curdate())";
     insert($q4);
     $q5="update tbl_mastcart set cart_status='Paid' where mastcart_id='$masterid'";
     update($q5);
   }
   else{
      $q2="insert into tbl_card values(null,'$cid','$cardno','$cardholder')";
      $q3=insert($q2);
      $q4="insert into tbl_payment values(null,'$q1','$q3','0',curdate())";
      insert($q4);
      $q5="update tbl_mastcart set cart_status='Paid',tot_amount='$newp' where mastcart_id='$masterid'";
      update($q5);
   }
 
  
   $q6="SELECT * FROM `tbl_childcart` WHERE mastcart_id='$masterid'";
   $q7=select($q6);
   foreach ($q7 as $res) 
    {

        $qs="UPDATE `tbl_item` SET `stock`=`stock`-'".$res['quantity']."' WHERE item_id='".$res['item_id']."'";
      update($qs);
        $its=$res['item_id'];

  $how="select * from tbl_item where item_id='".$res['item_id']."' and stock='0'";
     $r=select($how);
     if (sizeof($r)>0) 
     {
         $u="select * from tbl_childpurch where item_id='".$res['item_id']."' and cpurch_status='available'";
        $i=select($u);
        if (sizeof($i)>0) 
        {
          $purcid=$i[0]['childpurch_id'];
          $st=$i[0]['purch_quantity'];
          $selp=$i[0]['selling_price'];
           $iupd="update tbl_item set stock='$st',price='$selp' where item_id='".$res['item_id']."'";
          update($iupd);
           $cupd="update tbl_childpurch set cpurch_status='stock added' where childpurch_id='$purcid'";
          update($cupd);
        }else
        {
           $a=1;
        }
     }else
     {
       $b=1;
     }
    }
   


     alert("Payment Successful.");
   return redirect("customer_myorders.php"); 
    }
   

   
}





if (isset($_GET['id'])) 
{
    extract($_GET);
    $po="select * from tbl_card inner join tbl_customer where card_id='$id'";
    $gt=select($po);
}

?>




<!-- hero slider Start -->
    <div class="banner-wrap" style="height: 90px">
        <div class="banner-slider">
            <!-- hero slide start -->
            <div class="banner-slide bg1">
                <div class="container">
                    <div class="hero-content">
                        
                        <!-- <h1 data-animation="flipInX" data-delay="0.8s" data-color="#fff">
                            Latest<span> Phones </span>Available.</h1>
                            <div class="cta-btn" data-animation="fadeInDown" data-delay="1s">
                            <a href="about.html" class="btn btn-style btn-primary">View More</a>
                        </div> -->
                    </div>
                </div>
                <div class="hero-overlay"></div>
            </div>
            <!-- hero slide end -->
        </div>
    </div>
    <!-- hero slider end -->

    <style type="text/css">

.card{
    margin: auto;
    width: 600px;
    padding: 3rem 3.5rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}


@media(max-width:767px){
    .card{
        width: 90%;
        padding: 1.5rem;
    }
}
@media(height:1366px){
    .card{
        width: 90%;
        padding: 8vh;
    }
}
.card-title{
    font-weight: 700;
    font-size: 2.5em;
}
.nav{
    display: flex;
}
.nav ul{
    list-style-type: none;
    display: flex;
    padding-inline-start: unset;
    margin-bottom: 6vh;
}
.nav li{
    padding: 1rem;
}
.nav li a{
    color: black;
    text-decoration: none;
}
.active{
    border-bottom: 2px solid black;
    font-weight: bold;
}

input{
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    width: 100%;
    min-width: unset;
    background-color: transparent;
    border-color: transparent;
    margin: 0;
}
form a{
    color:grey;
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: bold;
}
form a:hover{
    color:grey;
    text-decoration: none;
}
form .row{
    margin: 0;
    overflow: hidden;
}
form .row-1{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    overflow: hidden;
}
form .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .col-2,.col-7,.col-3{
    display: flex;
    align-items: center;
    text-align: center;
    padding: 0 1vh;
}
form .row .col-2{
    padding-right: 0;
}

#card-header{
    font-weight: bold;
    font-size: 0.9rem;
}
#card-inner{
    font-size: 0.7rem;
    color: gray;
}
.three .col-7{
    padding-left: 0;
}
.three{
    overflow: hidden;
    justify-content: space-between;
}
.three .col-2{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    width: fit-content;
    overflow: hidden; 
}
.three .col-2 input{
    font-size: 0.7rem;
    margin-left: 1vh;
}
.btn{
    width: 100%;
    background-color: rgb(65, 202, 127);
    border-color: rgb(65, 202, 127);
    color: white;
    justify-content: center;
    padding: 2vh 0;
    margin-top: 3vh;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
input:focus::-webkit-input-placeholder { 
    color:transparent; 
}
input:focus:-moz-placeholder { 
    color:transparent; 
} 
input:focus::-moz-placeholder { 
    color:transparent; 
} 
input:focus:-ms-input-placeholder { 
    color:transparent; 
}

</style>


</head>
<body>

</body>
</html>


<div class="container-fluid">
    <div class="row my-5" >
        
     
     
            


<div class="col-md-6 card ">
            <div class="card-title mx-auto">
                Payment
            </div>
            <div class="nav">
                <ul class="mx-auto">
                    <!-- <li><a href="#">Account</a></li> -->
                    <li class="active"><a href="#">Card Details</a></li>
                </ul>
            </div>
            <form method="POST">
                <!-- <span id="card-header">Saved cards:</span> -->
                
                <!-- <span id="card-header">Add new card:</span> -->
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Card holder name</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" placeholder="Enter Your Name" name="cardholder" value="<?php if(isset($_GET['id'])){ 
                            echo $gt[0]['card_name'];
                        } ?>">
                    </div>
                </div>

                  <div class="row-1">
                    <div class="row row-2">
                         <span id="card-inner">Card number</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" name="cardno" pattern="[0-9]{16}" placeholder="5134-5264-4" value="<?php if(isset($_GET['id'])){ 
                            echo $gt[0]['card_no'];
                        } ?>">
                    </div>
                </div>

                    <div class="row-1">
                    <div class="row row-2">
                         <span id="card-inner">Exp. date</span>
                    </div>
                    <div class="row row-2">
                        <input type="month" name="date" placeholder="MM/YY">
                    </div>
                </div>

                    <div class="row-1">
                    <div class="row row-2">
                         <span id="card-inner">CVV</span>
                    </div>
                    <div class="row row-2">
                        <input type="password" placeholder="***" pattern="[0-9]{3}">
                    </div>
                    
                </div>
               <!--  <div class="row-1">
                <div class="row row-2">
                        <input type="radio" value="save">Save Card?
                    </div>
                </div> -->

              
                <input type="submit" name="Payment" value="Pay" class="btn d-flex mx-auto"> 
            </form>
        </div>
        <div class="col-md-6 card" >         
            <div class="row row-1">
<?php 
 $k="select * from tbl_card where cust_id='$cid'";
$hg=select($k);
if (sizeof($hg)>0) 
{
    foreach($hg as $keyy)
    {


    ?>

           
                    <div class="col-2"><img class="img-fluid" src="https://img.icons8.com/color/48/000000/mastercard-logo.png"/></div>
                    <div class="col-7">
                        <input type="text" placeholder="**** **** **** 3193">
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <a href="?id=<?php echo $keyy['card_id'] ?>&cust_payment=<?php echo $cust_payment; ?>&quantity=<?php echo $quantity; ?>&masterid=<?php echo $masterid; ?>&newp=<?php echo $newp ?>">Choose card</a>
                    </div>
              
        <?php
    }
    ?>
<?php
 }
 ?>
  </div>

        </div>
        </div>
    </div>
    






<?php include 'footer.php' ?>