
  <?php include 'connection.php';

  if (isset($_POST['submitss'])) 
    {
        extract($_POST);

         $a="select * from tbl_login where Username='$username'";
        $b=select($a);
        if (sizeof($b) > 0) {

             alert('Already existed username. Please use another one ');
         } 

         else
         { 

        $q="insert into tbl_login values('$username','$password','customer','active')";  
        insert($q);

      $q2="insert into tbl_customer values(null,'$username','$password','$fname','$lname','$address','$city','$district','$street','$pin','$phone','$dob','$gender','1')";

        insert($q2);
          alert('signedup successfully');
         return redirect('login1.php');

     }
    }

    
        ?>
<?php include 'header2.php' ?>
 

<div class="box"></div>
<div class="boxinput">
<form   method="post">
    <h1 style="font-size: 40px;">SIGNUP</h1>
    <input type="text" value="" name="username" placeholder="Email" id="username" required="" />
    <input type="password" value="" name="password" placeholder="Password" id="password" required=""/>
    <input type="text" value="" name="fname" placeholder="First Name" id="fname" required=""/>
    <input type="text" value="" name="lname" placeholder="Last Name" id="lname" />
    <input type="text" value="" name="address" placeholder="Address" id="address" required=""/>
    <input type="text" value="" name="district" placeholder="District" id="district" required=""/>
    <input type="text" value="" name="city" placeholder="City" id="city" required=""/>
    <input type="text" value="" name="street" placeholder="Street" id="street" required=""/>
    <input type="text" value="" name="pin" maxlength="6" placeholder="Pincode" id="pin" required="" />
    <input type="text" value="" name="phone" maxlength="10"  placeholder="Phone number" id="phone" required=""/>
    <input type="date" value="" name="dob" placeholder="DOB" id="dob" required=""/>
    
    <select name="gender">
        <option>Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
     </select>
 <button name="submitss"> Submit</button>
      <!-- <center><button >Submit</button> <br></center>    -->
    
    </form>
</div>
</body>
</html>

<style type="text/css">

body {
    background: url('log.jpg');
    backface-visibility: transparent;
    background-size: cover;
    font-family: Montserrat;

   
}


.boxinput {
    /* Your existing styles for the signup form container */
    position: relative;
}


.box {
    width: 213px;
    height: 35px;
    margin: 30px auto;


}

.boxinput {
    width: 400px;
    padding: 70px;
    background: rgba(0, 0, 0, 0.7); /* Transparent black background */
    border-radius: 5px;
    margin: 0 auto;
    backdrop-filter: blur(5px); /* Apply a blur effect to the background */
}






.boxinput h1 {
    text-align: center;
    color: #fff;
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
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 18px;
    font-family: Montserrat;
    padding: 25px 10px 7.5px;
    outline: none;
    color: white; /* Text color */
    font-weight: bold;
    background: rgba(0, 0, 0, 0.7); /* Transparent black background */
}






.boxinput select {
    position: relative;
    width: 100%;
    box-sizing: border-box;
    border-radius: 5px;
    border: none;
    margin-bottom: 20px;
    font-family: Montserrat;
    outline: none;
    color: grey;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 18px;
    font-family: Montserrat;
    padding: 0 25px 0 7.5px;
    font-weight: bold;
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

<?php include 'footer2.php' ?>