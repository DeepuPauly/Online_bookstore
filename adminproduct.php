<?php include 'connection.php';

  if(isset($_POST['submit'])) 
    {
        extract($_POST);

        $path="images/".$_FILES['imgg']['name'];
    $nam=uniqid();
    $filetype=strtolower(pathinfo($path,PATHINFO_EXTENSION));
    $target1="images/".$nam.".".$filetype;
    move_uploaded_file($_FILES['imgg']['tmp_name'], $target1);

    

        $a="select * from tbl_book where Book_Title='$title'";
        $b=select($a);
       if (sizeof($b) > 0) {

             alert('Already existed product');
         } 
      
       else
       {
       $q="insert into `tbl_book` values(null,'$subcat_id','$title','$authorname','$publisher','$publication_date','$book_desc','0','1','$pro','$target1','0')";  
        insert($q);
        alert('stored successfully');
         return redirect('admin1.php');
    }
    }
        ?> 

    
        <!DOCTYPE html>
<html>
<head>
    <title>item</title>
</head>
<body>
    <form   method="post" enctype ="multipart/form-data">
<div class="box"></div>
<div class="boxinput">
    <form method="post">
        <a class="btn btn-success" style="margin-left: 700px; display: inline-block; padding: 5px 10px; background-color: white; color: black; text-decoration: none; border: 1px solid #000; border-radius: 5px;" href="admin1.php">HOME</a>
    <h1 style="font-size: 40px;">ADD BOOK</h1>
     <div>
            <select name="subcat_id">
                <option>---Subcategory---</option>
                   <?php
            $a="select * from tbl_subcategory ";
            $b=select($a);
               foreach ($b as $key) {
                 
             ?>

             <option value="<?php echo $key ['Subcat_Id'] ?>"><?php echo $key['Subcat_Name'] ?><!-- <?php echo $key['Subcat_Desc'] ?> --></option>

         <?php } ?>
            </select>
    </div>


    <input type="text" value="" name="title" placeholder="Book Title" id="title" required="" />
    <input type="text" value="" name="authorname" placeholder="Book Author" id="authorname" required="" />
     <input type="text" value="" name="publisher" placeholder="Book publisher" id="publishername" required="" />
     <input type="text" value="" name="publication_date" placeholder="Book Publication Date" maxlength="20" id="publication_date" required="" />
     <input type="text" value="" name="book_desc" placeholder="Book Description" id="book_desc" required="" />
     <!-- <input type="text" value="" name="book_price" placeholder="Book Price" id="book_price" required="" /> -->
 <input type="file" value="" name="imgg"  id="imgg" required="" />

       <td><input type="text" class="form-control" name="pro" placeholder="Add Your profit %"></td>

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