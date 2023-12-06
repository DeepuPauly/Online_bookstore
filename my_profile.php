<?php include 'customer_header.php'; 
extract($_GET);
?>

<?php 
$q="SELECT * FROM `tbl_customer` WHERE Cust_Id='$cid'";
$res=select($q);
?>

<div class="banner-wrap">
    <div class="banner-slider">
        <!-- hero slide start -->

        <div class="banner-slide bg1" style="width: 100%; ">
            <div class="container">
                
                <div class="hero-content">
                    <br><br>
                    <section id="chefs" class="chefs section-bg">
                   
                       <div class="section-header">
          <!-- <h2>Chefs</h2> -->
          <p><span>MY PROFILE</span></p>
        </div>

                        <div class="profile-details">
                            <h3 class="profile-value">
                                Name: <?php echo $res[0]['C_Fname']; ?> <?php echo $res[0]['C_Lname']; ?>
                            </h3>

                            <h3 class="profile-value">
                                Address: <?php echo $res[0]['C_Address']; ?>, <?php echo $res[0]['C_Street']; ?>,
                                <?php echo $res[0]['C_Dist']; ?>, <?php echo $res[0]['C_Pin']; ?>
                            </h3>

                            <h3 class="profile-value">
                                Date of Birth: <?php echo $res[0]['C_DOB']; ?>
                            </h3>

                            <h3 class="profile-value">
                                Gender: <?php echo $res[0]['C_Gender']; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-overlay"></div>
        </div>
    </div>
</div>
</section>

<style>
    /* Add custom styles for the profile section */
    
    .profile-container {
        background-color: rgba(51, 51, 51, 0.7);
        
        padding: 20px;
        border-radius: 10px;
        width: 600px;
        margin: 0 auto;
       /* filter: blur(5px);*/
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-heading {
        font-size: 50px;
        opacity: 0.8;
    }

    .profile-details {
        padding-top: 20px;
    }

    .profile-label {
        font-size: 18px;
    }

    .profile-value {
        text-align: center;
        font-size: 25px;
        color: black;

    }
</style>
