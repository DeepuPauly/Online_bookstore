
<?php include 'connection.php';

  if(isset($_POST['submitss'])) 
    {
        extract($_POST);

         $a="select * from tbl_category where Cat_Name='$catname'";
        $b=select($a);
       if (sizeof($b) > 0) {

             alert('Already existed category');
         } 
      
       else
       {

       
      $q2="insert into tbl_category values(null,'$catname','$catdesc')";
        insert($q2);

    }
    }
        ?>

<div class="box"></div>
<div class="boxinput">
<form   method="post">
    <a class="btn btn-success" style="margin-left: 700px; display: inline-block; padding: 5px 10px; background-color: white; color: black; text-decoration: none; border: 1px solid #000; border-radius: 5px;" href="staffpanel.php">HOME</a>
    <h1 style="font-size: 40px;"> Add Category</h1>
    <input type="text" value="" name="catname" placeholder="Category Name" id="catname" required="" />
     <input type="text" value="" name="catdesc" placeholder=" Category Description" id="catdesc" required="" />


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