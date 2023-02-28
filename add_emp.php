<?php
error_reporting(0);
include('config.php');
session_start();



if (isset($_POST['save'])) {
    $employee_name = $_POST['employee_name'];
    $employee_email = $_POST['employee_email'];
    $employee_mobile = $_POST['employee_mobile'];
    $password = $_POST['password'];
    
    if ($employee_name != "" && $employee_email != "") {
        
        $insert = mysqli_query($conn, "insert into `employeemaster` 
        set 
        `employee_name`='$employee_name',
        `employee_email`='$employee_email',
        `employee_mobile`='$employee_mobile',
        `username`='$employee_mobile',
        `password`='$password'
        
        ");
        
        
        $success_msg = "Succefully Employee Added!";
    } else {
        $error_msg = "Please enter Employee Name type & Employee Email !";
    }
    ;
}

?>


<?php include('navbar.php'); ?>
<?php
$user_name = $_SESSION['username'];
// $pass_word = $_SESSION['password'];

if($user_name == true){

}else{
    header('location:admin_login.php');
}
?>

<body>
    <div class="container  mb-3 col-md-4 pt-5">
        <h2 class="text-center text-secondary">Employee</h2>
        
        <form action="add_emp.php" method="post" class=" border border-secondary mt-5 ">

            
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
                <input type="text" class="form-control " id="" name="employee_name">
            </div>
            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3"> Email</label>
                <input type="email" class="form-control " id="" name="employee_email">
            </div>

            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3">Mobile/Username</label>
                <input type="text" class="form-control " id="" name="employee_mobile">
            </div>

            
            <div class="mb-3 col-md-9  mx-5">

                <label for="" class="form-label mb-3">Password</label>
                <input type="password" class="form-control " id="" name="password">
            </div>


            <div class="mb-3 col-md-9  mx-5 mt-3">
                <input type="submit" class="btn btn-secondary col-md-5 " name="save" value="Save">
                <button class="btn btn-secondary m-3 col-md-5"> <a href="add_emp_list.php"
                class="alert-link text-light text-decoration-none  ">Cancel</a></button>
            </div>
        </form>
    </div>

</body>

</html>