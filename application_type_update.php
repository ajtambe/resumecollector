<?php
error_reporting(0);
include('config.php');
session_start();


$application_id = $_GET['application_id'];



if (isset($_POST['save'])) {
    $app_type = $_POST['app_type'];
    $app_description = $_POST['app_description'];

    if ($app_type != "" && $app_description != "") {

        
    $update = "UPDATE `applicationtypemaster`
    set
 
    `app_type`='$app_type',
    `app_description`='$app_description'
   
    WHERE `application_id` =$application_id";
     $data = mysqli_query($conn, $update);

        $success_msg = " Update Succefully !";
    } else {
        $error_msg = "Error  !";
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
<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `applicationtypemaster` where application_id='$application_id' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $application_id = $fetchdata['application_id'];
    $app_type = $fetchdata['app_type'];
    $app_description = $fetchdata['app_description'];
}
?>

<?php include('navbar.php'); ?>

<body>
    <div class="container  mb-3 col-md-4 pt-5">
        <h2 class="text-center text-secondary "> Update Application Type</h2>
        
        <form action="application_type_update.php?application_id=<?php echo $application_id; ?>" method="post" class=" border border-secondary mt-5">


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
                <label for="" class="form-label mb-3">Update Application Type</label>
                <input type="text" class="form-control " id="" value="<?php echo $app_type; ?>" name="app_type">
            </div>
            <div class="mb-3 col-md-9  mx-5 mt-3">
                
                <label for="" class="form-label mb-3">Description</label>
                <input type="text" class="form-control " id="" value="<?php echo $app_description; ?>" name="app_description">

            </div>

            <div class="col-md-9  mx-5 mt-3">
                <input type="submit" class="btn btn-secondary  col-md-5" name="save"
                    value="Save">
                    <button class="btn btn-secondary m-3 col-md-5"> <a href="application_type_list.php"
                class="alert-link text-light text-decoration-none  ">Cancel</a></button>
            </div>
        </form>
    </div>

</body>

</html>