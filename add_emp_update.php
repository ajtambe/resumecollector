
<?php
error_reporting(0);
include('config.php');
session_start();


$employee_id = $_GET['employee_id'];




if (isset($_POST['save'])) {
    $employee_name = $_POST['employee_name'];
    $employee_email = $_POST['employee_email'];
    $employee_mobile = $_POST['employee_mobile'];
    
    if ($employee_name != "" && $employee_email != "") {

        
    $update = "UPDATE `employeemaster`
    set
 
    `employee_name`='$employee_name',
    `employee_email`='$employee_email',
    `employee_mobile`='$employee_mobile',
    `username`='$employee_mobile'
   
    WHERE `employee_id` =$employee_id";
     $data = mysqli_query($conn, $update);

        $success_msg = " Update Succefully !";
    } else {
        $error_msg = "Error  !";
    }
    ;
}

?>

<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `employeemaster` where employee_id='$employee_id' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $employee_id = $fetchdata['employee_id'];
    $employee_name = $fetchdata['employee_name'];
    $employee_email = $fetchdata['employee_email'];
    $employee_mobile = $fetchdata['employee_mobile'];
}
?>



<?php include('navbar.php'); ?>
<?php
$user_name = $_SESSION['username'];
// $pass_word = $_SESSION['password'];
// $selectquery = mysqli_query($conn, "SELECT * FROM `employeemaster` where username='$user_name' ");
// while ($fetchdata = mysqli_fetch_array($selectquery)) {
    
//     $user_employee_name = $fetchdata['employee_name'];
    
// }


if($user_name == true){

}else{
    header('location:admin_login.php');
}
?>

<body>
    <div class="container  mb-3 col-md-4 pt-5">
        <h2 class="text-center text-secondary">Employee Update :</h2>

        <form action="add_emp_update.php?employee_id=<?php echo $employee_id; ?>" method="post" class=" border border-secondary mt-5">

            
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



            <div class="mb-3 col-md-9  mx-5">
                <label for="" class="form-label mb-3"> Employee
                    Name</label>
                <input type="text" class="form-control " id="" name="employee_name"  value="<?php echo $employee_name; ?>">
            </div>
            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3"> Email</label>
                <input type="email" class="form-control " id="" name="employee_email"  value="<?php echo $employee_email; ?>">
            </div>

            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3">Mobile</label>
                <input type="text" class="form-control " id="" name="employee_mobile"  value="<?php echo $employee_mobile; ?>">
            </div>
         

            <div class="col-md-9  mx-5">
                <input type="submit" class="btn btn-secondary col-md-5" name="save" value="Save">
                <button class="btn btn-secondary m-3 col-md-5"> <a href="add_emp_list.php"
                class="alert-link text-light text-decoration-none  ">Cancel</a></button>
            </div>
        </form>
    </div>

</body>