<?php include 'connection.php';

  if(isset($_POST['submit'])) 
    {
        extract($_POST);

        $a="select * from tbl_login where Username='$username'";
        $b=select($a);
        if (sizeof($b) > 0) {

             alert('Already existed username');
         } 
      
       else
       {
         $q="insert into tbl_login values('$username','$password','staff','1')";  
        insert($q);
      $q2="insert into tbl_staff values(null,null,'$Cs_Name','$phone','$City','$District','$PinCode','$Street','$Phone','$gender','$DOB','1')";
        insert($q2);
         alert('stored successfully');
          return redirect('admin1.php');

       }
        
    }
        ?>

	<div class="box"></div>
<div class="boxinput">
<form   method="post">
    <h1 style="font-size: 40px;"> Add Staff </h1>
    <input type="email" value="" name="username" placeholder="Username" id="username" required="" />
    <input type="password" value="" name="password" placeholder="Password" id="password" required=""/>
    <input type="text" value="" name="fname" placeholder="First Name" id="fname" required=""/>
    <input type="text" value="" name="lname" placeholder="Last Name" id="lname" />
     <input type="text" value="" name="City" placeholder="City" id="City" required=""/>
     <input type="text" value="" name="District" placeholder="District" id="District" required=""/>
     <input type="text" maxlength="6" value="" name="PinCode" placeholder="Pincode" id="PinCode" required=""/>
     <input type="text" value="" name="Street" placeholder="Street" id="Street" required=""/>
     <input type="text" maxlength="10" value="" name="Phone" placeholder="Phone" id="Phone" required=""/>
     <select name="Gender">
        <option>Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
     </select>
    <input type="text" maxlength="10" value="" name="DOB" placeholder="Date of Birth" id="DOB" required=""/>
 
     <input type="submit" name="submit"> 
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
s
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
/*    opacity: 0.5;*/
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
.boxinput select {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid black;
    margin-bottom: 20px;
    font-size: 15px;
    font-weight: bold;
    font-family: Montserrat;
    padding: 0 25px 0 7.5px;
    outline: none;
    color: grey;
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