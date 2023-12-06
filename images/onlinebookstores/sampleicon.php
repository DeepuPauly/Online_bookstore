
<?php include 'connection.php';


if (isset($_POST['submit'])) {
    extract($_POST);

        $path="images/".$_FILES['imgg']['name'];
        $nam=uniqid();
        $filetype=strtolower(pathinfo($path,PATHINFO_EXTENSION));
        $target1="images/".$nam.".".$filetype;
        move_uploaded_file($_FILES['imgg']['tmp_name'], $target1);
         $q="insert into `tbl_item` values(null,'$sub_id','$proname','$description','$prate','1','0','$target1')";
      insert($q);
      alert('Added Item Successfully');
      return redirect('login.php');
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
    <h1 style="font-size: 40px;">ADD ITEM</h1>
     <div>
            <select name="sub_id">
                <option>---Select---</option>
                   <?php
            $a="select * from tbl_subcategory ";
            $b=select($a);
               foreach ($b as $key) {
                 
             ?>

             <option value="<?php echo $key ['Subcat_id'] ?>"><?php echo $key['Subcat_name'] ?><!-- <?php echo $key['Subcat_desc'] ?> --></option>

         <?php } ?>
            </select>
        </div>
    <input type="text" value="" name="proname" placeholder="Name" id="Name" />
    <input type="text" value="" name="description" placeholder="Product description" id="Category Name" />
    <input type="text" value="" name="prate" placeholder="Product Rate" id="Subcategory Name" />
     <input type="text" value="" name="propercent" placeholder="Profit percentage " id="Subcategory Name" />
    <head>
         <style>
      .container {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        width: 100%;
      }
      input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 10px;
        left: 8px;
        font-size: 17px;
        color: #b8b8b8;
      }
      .button-wrap {
        position: relative;
      }
      .button {
        display: inline-block;
        padding: 12px 18px;
        cursor: pointer;
        border-radius: 5px;
        background-color:black;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="button-wrap">
        <label class="button" for="upload">Upload File</label>
        <input id="upload" type="file" name="imgg"><br><br>
      </div>
    </div>
    <button name="submit">SUBMIT</button>
    </form>
</div>


<style type="text/css">
    
    body {
    background: url('tr3.png');
    background-size:650px;
    font-family: Montserrat;
    
}

.box {
    width: 213px;
    height: 36px;
    margin: 30px auto;


}

.boxinput {
    width: 400px;
    padding: 20px;
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


.boxinput select {
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