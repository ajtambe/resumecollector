<?php
error_reporting(0);
include('config.php');
session_start();



if (isset($_POST['save'])) {
    $app_type = $_POST['app_type'];
    $app_description = $_POST['app_description'];
    
    if ($app_type != "" && $app_description != "") {
        
        $insert = mysqli_query($conn, "insert into `applicationtypemaster` 
        set 
        `app_type`='$app_type',
        `app_description`='$app_description'
        
        ");
        
        
        $success_msg = "Succefully Added!";
    } else {
        $error_msg = "Please enter Application type & Description !";
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
        <h2 class="text-center text-secondary">Application Type</h2>

        <form action="application_type.php" method="post" class=" border border-secondary mt-5 ">

            
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





            <div class="mb-3 col-md-9  mx-5 mt-3">
                <label for="" class="form-label mb-3"> Application Type</label>
                <input type="text" class="form-control " id="" name="app_type">
            </div>
            <div class="form-floating col-md-9 mx-5">
                <textarea class="form-control" placeholder="Description " name="app_description"></textarea>
                <label for="floatingTextarea">Description</label>
            </div>

            <div class="col-md-9  mx-5 mt-3">
                <input type="submit" class="btn btn-secondary px-4 col-md-5  " name="save" value="Save">
                <button class="btn btn-secondary m-3 col-md-5"> <a href="application_type_list.php"
                class="alert-link text-light text-decoration-none  ">Cancel</a></button>
            </div>
        </form>
    </div>

</body>

</html>
