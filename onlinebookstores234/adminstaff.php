<?php include 'connection.php';

if (isset($_POST['submit']))
{
    extract($_POST);
    $a="select * from tbl_staff where Username='$Username'";
        $b=select($a);
       if (sizeof($b) > 0) {

             alert('Already existing Username');
         } 
      
       else
       {

$q="insert into tbl_login values('$Username','$Password','staff','1')";
insert($q);

 $q2="insert into tbl_staff values(null,'$Username','$Firstname','$Lastname','$city','$dist','$pin','$street','$Phonenumber','$Gender','$Dob','1')";

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
    <h1 style="font-size: 40px;"> Add Staff </h1>
     <input type="text"value=""name= "Username" placeholder="Username" id="Username" required="" />
      <input type="password"value=""name="Password" placeholder="Password" id="Password" required=""/>
    <input type="text"value="" name="Firstname"placeholder="Firstname" id="Firstname" required=""  />
    <input type="text"value="" name="Lastname"placeholder="Lastname" id="Lastname" required="" />
  
     <input type="text"value="" name="city" placeholder="City" id="city" required="" />
        <input type="text"value="" name="dist" placeholder="District" id="dist" required="" />
                <input type="text"value="" name="street" placeholder="Street" id="street" required="" />
         <input type="text"value="" name="pin" placeholder="Pincode" maxlength="6" id="pin" required="" />
        
    <input type="text"value=""name="Phonenumber"placeholder="Phone Number" maxlength="10" id="Phonenumber"required=""  />
    
    <input type="date"value="" name="Dob"placeholder="DOB" id="Dob" required="" />
  
    <select name="Gender">
    <option>Gender</option>
    <option value="Female">Female</option>
    <option value="Male">Male</option>
    <option value="Others">Others</option>
    </select>
 
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