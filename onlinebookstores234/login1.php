
<?php include 'connection.php';

//include'loginheader.php';

if(isset($_POST['submit'])) 
    {
        extract($_POST);
        $q="select * from tbl_login where Username='$username' and Login_Password='$password' and Status='1'";
      

        $res=select($q);

        if (sizeof($res)>0) 
        {

            $_SESSION['username']=$res[0]['Username'];
            $user=$_SESSION['username'];
            $_SESSION['type']=$res[0]['Type'];
           if ($res[0]['Type']=="admin") 
           {
             return redirect('adminhomepage.php');

           }
           elseif ($res[0]['Type']=="staff") 
           {

            $r="select * from tbl_staff where Username='$user'";
            $req=select($r);
            if (sizeof($req)>0) 
            {
              $_SESSION['staff_id']=$req[0]['Staff_Id'];
              $user3=$_SESSION['staff_id'];
            }

            return redirect('staffhomepage.php');
             
           }
           elseif ($res[0]['Type']=="customer") 
           {

            $c="select * from tbl_customer where Username='$user'";
            $dir=select($c);
            if(sizeof($dir)>0)
            {
              $cid=$_SESSION['Cust_id']=$dir[0]['Cust_Id'];
              $cid=$_SESSION['Cust_id'];
            }
            return redirect('loggedinindex.php');
             
           }
           elseif ($res[0]['Type']=="courier") 
           {
             $d="select * from tbl_courier where Username='$user'";
             $div=select($d);
             if(sizeof($div)>0)
             {
               $_SESSION['user2_id']=$div[0]['Courier_Id'];
               $user2=$_SESSION['user2_id'];
             }
             return redirect('courierhomepage.php');
           }   


    }

 else
 {

    alert('Invalid Credentials');
 }

  }

      
      
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("images/hh3.jpg");
            /*background-repeat: no-repeat;*/
            background-size: 600px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: black;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
            text-align: left;
        }
        h2 {
            margin-bottom: 20px;
            color: #BB890E;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color:  #BB890E;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            background-color: white;
            color: black;
            border: none;
            border-radius: 4px;
            padding: 12px 20px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #BB890E;
        }
        p {
            margin-top: 20px;
            font-size: 14px;
        }
        a {
            color: #dec05f;
            text-decoration: none;

        }
    </style>
</head>
<body>
    <div class="container">
        <center><h2>Login</h2></center>
        <form method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

          <center>  <button name="submit" type="submit">Login</button></center>
        </form>
       <center> <font color="#dec05f"><p>Don't have an account ? </font><a href="sign (2).php"><font color="#BB890E"><b><i>Sign Up</a></p></center></font></b></i>
    </div>
</body>
</html>
