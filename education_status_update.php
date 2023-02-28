
<?php
error_reporting(0);
include('config.php');
session_start();


$education_id = $_GET['education_id'];




if (isset($_POST['save'])) {
    $education_status = $_POST['education_status'];
    $education_desc = $_POST['education_desc'];
    
    if ($education_status != "" && $education_desc != "") {

        
    $update = "UPDATE `educationstatusmaster`
    set
 
    `education_status`='$education_status',
    `education_desc`='$education_desc'
   
    WHERE `education_id` =$education_id";
     $data = mysqli_query($conn, $update);

        $success_msg = " Update Succefully !";
    } else {
        $error_msg = "Error  !";
    }
    ;
}

?>

<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `educationstatusmaster` where education_id='$education_id' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $education_id = $fetchdata['education_id'];
    $education_status = $fetchdata['education_status'];
    $education_desc = $fetchdata['education_desc'];
}
?>

<?php
$user_name = $_SESSION['username'];
// $pass_word = $_SESSION['password'];

if($user_name == true){

}else{
    header('location:admin_login.php');
}
?>

<?php include('navbar.php'); ?>


<body>
    <div class="container  mb-3 col-md-4 pt-5">
        <h2 class="text-center text-secondary">Education Status</h2>

        <form action="education_status_update.php?education_id=<?php echo $education_id; ?>" method="post" class=" border border-secondary mt-5">

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



            <div class="mb-3 col-md-9  mx-5 mt-3">
                <label for="" class="form-label mb-3"> Education Status</label>
                <input type="text" class="form-control " id="" name="education_status"  value="<?php echo $education_status; ?>">
            </div>
            <div class="mb-3 col-md-9  mx-5 mt-3">
                <label for="" class="form-label mb-3"> Description</label>
                <input type="text" class="form-control " id="" name="education_desc"  value="<?php echo $education_desc; ?>">
            </div>
           

            <div class="col-md-9  mx-5 mt-3">
                <input type="submit" class="btn btn-secondary col-md-5" name="save" value="Save">
                <button class="btn btn-secondary m-3 col-md-5"> <a href="education_status_list.php"
                class="alert-link text-light text-decoration-none  ">Cancel</a></button>
           
            </div>
        </form>
    </div>

</body>