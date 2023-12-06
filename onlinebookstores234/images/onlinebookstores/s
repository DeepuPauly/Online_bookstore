
<!-- <div class="box"></div> -->
<div class="boxinput">
<form   method="post"> 
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
