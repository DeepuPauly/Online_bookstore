<?php include 'connection.php';

extract($_GET); 

  if(isset($_POST['submitss'])) 
    {
        extract($_POST);

         $a="select * from tbl_login where Username='$username'";
        $b=select($a);
        if (sizeof($b) > 0) {

             alert('Already existed username');
         } 

         else
         { 

         $q="insert into tbl_login values('$username','$password','courier','1')";  
        insert($q);
        $q2="insert into tbl_courier values(null,'0','$username','$Cs_name','$Cs_Phone','$Cs_City','$Cs_Street','$Cs_Dist','$Cs_Pin','1')";
        insert($q2);
         alert('stored successfully');
        return redirect('admin1.php');
      }
    }
      ?>
    	<div class="box"></div>
<div class="boxinput">
<form   method="post">
     <a class="btn btn-success" style="margin-left: 700px; display: inline-block; padding: 5px 10px; background-color: white; color: black; text-decoration: none; border: 1px solid #000; border-radius: 5px;" href="admin1.php">HOME</a>
    <h1 style="font-size: 40px;"> Add Courier </h1>

    <input type="email" value="" name="username" placeholder="Username" id="username" required="" />
    <input type="password" value="" name="password" placeholder="Password" id="password" required="" />
     <input type="text" value="" name="Cs_name" placeholder="Courier Company Name" id="Cs_name" required="" />
     <input type="text" value="" name="Cs_City" placeholder="City" id="Cs_City" required="" />
     <input type="text" value="" name="Cs_Dist" placeholder="District" id="Cs_Dist" required="" />
     <input type="text" value="" name="Cs_Street" placeholder="Street" id="Cs_Street" required="" />
     <input type="text" maxlength="6" value="" name="Cs_Pin" placeholder="Pincode" id="Cs_Pin" required="" />
     <input type="text" maxlength="10" value="" name="Cs_Phone" placeholder="Phone" id="Cs_Phone" required="" />
     
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