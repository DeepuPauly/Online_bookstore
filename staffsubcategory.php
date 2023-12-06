<?php include 'connection.php';

  if(isset($_POST['submitss'])) 
    {
        extract($_POST);

          $a="select * from tbl_subcategory where Subcat_Name='$subcatname'";
        $b=select($a);
       if (sizeof($b) > 0) {

             alert('Already existed subcategory');
         } 
      
       else
       {

       
     $q2="insert into tbl_subcategory values(null,'$subcatname','$subcatdesc')";
        insert($q2);
         alert('stored successfully');
          return redirect('staffpanel.php');

    }
    }
        ?>

<!-- <div class="box"></div> -->
<div class="boxinput">
<form   method="post"> 
      <a class="btn btn-success" style="margin-left: 700px; display: inline-block; padding: 5px 10px; background-color: white; color: black; text-decoration: none; border: 1px solid #000; border-radius: 5px;" href="staffpanel.php">HOME</a>
    <h1 style="font-size: 40px;"> Add Subcategory</h1>


     <div>
        <select name="cat_id">
            <option>---Category---</option>
            <?php 
            $a="select * from tbl_category ";
            $b=select($a);

            foreach ($b as $key) {
                 
             ?>

             <option value="<?php echo $key ['Cat_Id'] ?>"><?php echo $key['Cat_Name'] ?></option>

         <?php } ?>
        </select>
    </div>


    <input type="text" value="" name="subcatname" placeholder="Subcategory Name" id="subcatname"/>
     <input type="text" value="" name="subcatdesc" placeholder="Subcategory Description" id="subcatdesc"/>
      
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