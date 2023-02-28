
<?php
error_reporting(0);
include('config.php');
session_start();



if (isset($_POST['save'])) {
    $education_status = $_POST['education_status'];
    $education_desc = $_POST['education_desc'];
    
    if ($education_status != "" && $education_desc != "") {
        
        $insert = mysqli_query($conn, "insert into `educationstatusmaster` 
        set 
        `education_status`='$education_status',
        `education_desc`='$education_desc'
        
        ");
        
        
        $success_msg = "Succefully Added!";
    } else {
        $error_msg = "Please enter Education Status type & Description !";
    }
    ;
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

        <form action="education_status.php" method="post" class=" border border-secondary mt-5 ">

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
                <input type="text" class="form-control " id="" name="education_status">
            </div>
            <div class="form-floating col-md-9 mx-5">
                <textarea class="form-control" placeholder="Description " name="education_desc"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="mb-3 col-md-9  mx-5 mt-3">
                <input type="submit" class="btn btn-secondary col-md-5 " name="save" value="Save">
                <button class="btn btn-secondary m-3 col-md-5"> <a href="education_status_list.php"
                class="alert-link text-light text-decoration-none  ">Cancel</a></button>
            </div>
        </form>
    </div>

</body>

</html>