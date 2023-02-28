<?php
error_reporting(0);
include('config.php');
session_start();


$employee_id = $_GET['employee_id'];


// $dec_emp_id = base64_decode($employee_id);
if ($employee_id != "") {
    $deleterecord = mysqli_query($conn, "delete from employeemaster where employee_id='$employee_id' ");
    $success_msg = "Record Deleted Successfully!";

}

?>




<?php include('navbar.php'); ?>
<?php
$user_name = $_SESSION['username'];

if($user_name == true){

}else{
    header('location:admin_login.php');
}
?>


<div class="container mt-5">

    <h2 class="text-center text-secondary my-4">Employee List</h2>

    <div class="col-md-12 text-end">
        <button class="btn btn-secondary m-3 col-md-2"> <a href="add_emp.php"
                class="alert-link text-light text-decoration-none">Add Employee</a></button>
    </div>




    <table class="table table-hover table-bordered ">
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
        <thead class="bg-secondary text-light">
            <tr>
                <th class="hidden">Employee Id</th>
                <th>Employee Name</th>
                <th>Employee Email</th>
                <th>Mobile Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <?php
        $selectquery = mysqli_query($conn, "SELECT * FROM `employeemaster`");
        while ($fetchdata = mysqli_fetch_array($selectquery)) {

            $employee_id = $fetchdata['employee_id'];
            $employee_name = $fetchdata['employee_name'];
            $employee_email = $fetchdata['employee_email'];
            $employee_mobile = $fetchdata['employee_mobile'];

            ?>
            <tbody>
                <tr>
                    <td class="hidden">
                        <?php echo $employee_id; ?>
                    </td>
                    <td>
                        <?php echo $employee_name; ?>
                    </td>
                    <td>
                        <?php echo $employee_email; ?>
                    </td>
                    <td>
                        <?php echo $employee_mobile; ?>
                    </td>

                    <td><a href="add_emp_update.php?employee_id=<?php echo $employee_id; ?>">Edit</a></td>
                    <td><a href="add_emp_list.php?employee_id=<?php echo $employee_id; ?>"
                            onclick="return confirm('Do you want to delete this record?');">Delete</a></td>
                </tr>

            </tbody>
            <?php
        }
        ?>
</div>