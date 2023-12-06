	<?php include 'connection.php';

    extract($_GET);

  if(isset($_POST['submitss'])) 
    {
        extract($_POST);

        $a="select * from tbl_vendor where vendor_email='$V_Email'";
        $b=select($a);
        if (sizeof($b) > 0) {

             alert('Already existed vendor');
         }

         else

         {

      
      $q2="insert into tbl_vendor values(null,'".$_SESSION['staff_id']."','$V_Name','$V_Phno','$V_Street','$V_Dist','$V_Pin','$V_City','$V_Email','1')";
        insert($q2);
         alert('stored successfully');
          return redirect('staffpanel.php');
      }
    }
        ?>
        <div class="box"></div>
<div class="boxinput">
<form   method="post">
    <a class="btn btn-success" style="margin-left: 700px; display: inline-block; padding: 5px 10px; background-color: white; color: black; text-decoration: none; border: 1px solid #000; border-radius: 5px;" href="staffpanel.php">HOME</a>
    <h1 style="font-size: 40px;"> Add Vendor</h1>
    <input type="email" value="" name="V_Email" placeholder="Email id" id="V_Email" required="" />
     <input type="text" value="" name="V_Name" placeholder="Vendor Name" id="V_Name" required=""/>
     <input type="text" value="" name="V_City" placeholder="City" id="V_City" required=""/>
     <input type="text" value="" name="V_Dist" placeholder="District" id="V_Dist" required=""/>
     <input type="text" value="" name="V_Street" placeholder="Street" id="V_Street" required=""/>
     <input type="text" maxlength="6" value="" name="V_Pin" placeholder="Pincode" id="V_Pin" required=""/>
     <input type="text" maxlength="10" value="" name="V_Phno" placeholder="Phone" id="V_Phno" required=""/>
     
    <input type="submit" name="submitss">
     <!-- <button>Submit</button> -->
    </form>
</div>


<style type="text/css">

body {
    background: url('manage.jpg');
    background-color: black;
    background-size: cover;
    font-family: Montserrat;
   
}

.box {
    width: 213px;
    height: 36px;
    margin: 30px auto;


}

.boxinput {
    width: 400px;
    padding: 70px;
    background: black;
    border-radius: 5px;
    margin: 0 auto;
   
}

.boxinput h1 {
    text-align: center;
    color: white;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.boxinput input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid black;
    margin-bottom: 20px;
    font-size: 15px;
    font-weight: bold;
    font-family: Montserrat;
    padding: 25px 10px 7.5px;
    outline: none;
}





.boxinput input:active, .boxinput input:focus {
    border: 1px solid black;
}

.boxinput button {
    width: 100%;
    height: 40px;
    background: black;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid black;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 20px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.boxinput button:hover {
    background: grey;
}


</style>