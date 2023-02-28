<?php
error_reporting(0);
include('config.php');
session_start();



if (isset($_POST['save'])) {

    $company_name = $_POST['company_name'];
    $fileToUpload = $_POST['fileToUpload'];
    $tag_line = $_POST['tag_line'];
    $address = $_POST['address'];
    $super_admin_password = $_POST['super_admin_password'];

    if ($company_name != "" && $tag_line != "") {

    
        $update = "UPDATE `settingmaster`
        set
        `company_name`='$company_name',
        
        `tag_line`='$tag_line',
        `address`='$address',
        `super_admin_password`='$super_admin_password'
       
        WHERE `admin_id` ='1'";
            $data = mysqli_query($conn, $update);
            
            $target_dir = "company_logo/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imagename = basename($_FILES["fileToUpload"]["name"]);
    
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {




            $updateprofilephotoquery = mysqli_query($conn, "update settingmaster set `company_logo`='$imagename' where `admin_id`='1'");
         } else {
             echo "Sorry, there was an error uploading your file.";
         }



        $success_msg = " Update Succefully !";
    } else {
        $error_msg = "Error  !";
    }
    ;
   
}

?>
<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `settingmaster` where admin_id='1' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $company_id = $fetchdata['company_id'];

    $company_name = $fetchdata['company_name'];
    $appemployee_email_type = $fetchdata['employee_email'];
    $tag_line = $fetchdata['tag_line'];
    $address = $fetchdata['address'];
    $super_admin_password = $fetchdata['super_admin_password'];
}
?>

<?php include('navbar.php'); ?>

<body>
    <div class="container  mb-3 col-md-4 pt-5">
        <h2 class="text-center text-secondary">Company Info</h2>

        <form action="setting.php" method="post" class=" border border-secondary mt-5 " enctype="multipart/form-data">


            <div class="mb-3 col-md-12">
                <?php
                if ($success_msg != "") {
                    ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong>
                        <?php echo $success_msg; ?>
                    </div>
                    <?php
                }
                if ($error_msg != "") {
                    ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong>
                        <?php echo $error_msg; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="mb-3 col-md-9  mx-5 ">
                <?php
                $selectquery = mysqli_query($conn, "select * from settingmaster where `admin_id`='1'");
                while ($fetchdata = mysqli_fetch_array($selectquery)) {
                    $company_logo = $fetchdata['company_logo'];
                    ?>
                    <div class="col-md-12 text-end">

                        <img src="company_logo/<?php echo $company_logo; ?>" class="" style="width:150px;height:150px;" >

                    </div>
                    <?php
                }
                ?>

            </div>

            <div class="mb-3 col-md-9  mx-5">
                <label for="" class="form-label mb-3"> Company Name
                </label>
                <input type="text" class="form-control " id="" name="company_name" value="<?php echo $company_name; ?>">
            </div>
            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3"> Company Logo</label>
                <input type="file" class="form-control " id="" name="fileToUpload" value="<?php echo $company_logo; ?>">
            </div>

            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3">Tag Line</label>
                <input type="text" class="form-control " id="" name="tag_line" value="<?php echo $tag_line; ?>">
            </div>
            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3">Address</label>
                <input type="text" class="form-control " id="" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3">Super Admin Password</label>
                <input type="password" class="form-control " id="" name="super_admin_password"
                    value="<?php echo $super_admin_password; ?>">
            </div>
            <div class="mb-3 col-md-9  mx-5 mt-3">
                <input type="submit" class="btn btn-secondary col-md-5 " name="save" value="Save">
              
            </div>
        </form>
    </div>

</body>

</html>