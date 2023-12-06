<?php include 'connection.php';
if (isset($_POST['submit'])) {
    extract($_POST);


    $w="select * from  login where Username='$username' and Password='$password'";
    $res=select($w);

  if (sizeof($res)>0) {
      if ($res[0]['Type']=="Admin") {
        return redirect('adminpanel.php');
      }
  elseif ($res[0]['Type']=="staff") {
      return redirect('staffpanel.php');
  }
  elseif ($res[0]['Type']=="courier") {
      return redirect('courierh.php');
    }
     
  elseif ($res[0]['Type']=="customer") {
      return redirect('home.php');
   
  }
 }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="ss.css">
</head>
<body>
   <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">The Book Spot</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          
          <li><a  class="nav-link scrollto active"href="#hero">Home</a></li>
        
        <li><a class="nav-link scrollto"href="#about">About Us</a></li>
         
        <li><a class="nav-link scrollto"href="sign (2).php" >Sign Up</a></li>
     
          <li><a class="nav-link scrollto" href="login1.php">Login</a></li>
    
  </li>
         <li><a class="nav-link scrollto" href="#contact">Contact &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
               <li><i style="font-size:24px" class="fa fa-shopping-cart"><a href="product.php"></a></i></li>

        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
       

      
      </nav><!-- .navbar -->
    

    </div>
  </header>

        <li><a href="login.php">LOGIN</a></li>
    <!--     <li><a href="#where">CONTACT</a></li> -->
      </div>
    </ul>
  </nav>

<div class="box"></div>
<div class="boxinput">
	<form   method="post">
    <h1 style="font-size: 40px;">Login</h1>
    <input type="text" value="" name="username" placeholder="Username" id="username" required="" />
    <input type="password" value="" name="password" placeholder="Password" id="password" required="" />
    <button name="submit">LOGIN</button> <br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOR
     <button><a href="custreg.php"  style="color:white">SIGN UP</a></button>
    </form>
</div>


<style type="text/css">
	
	body {
    background: url('lbook.jpg');
    background-size: cover;
    font-family: Montserrat;
    
}

a {
   text-decoration: none;
}

.box {
    width: 213px;
    height: 36px;
    margin: 30px auto;


}

.boxinput {
    width: 400px;
    padding: 70px;
    background: #fff;
    border-radius: 5px;
    
    margin: 0 auto;
}

.boxinput h1 {
    text-align: center;
    color: #000;
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
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.boxinput input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.boxinput input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.boxinput input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.boxinput input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
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
    border: 1px solid grey;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.boxinput button:hover {
    background: grey;
}

</style>
</body>
</html>