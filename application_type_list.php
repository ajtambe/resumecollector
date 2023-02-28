<?php
error_reporting(0);
include('config.php');
session_start();

$application_id = $_GET['application_id'];


// $dec_emp_id = base64_decode($employee_id);
if ($application_id != "") {
    $deleterecord = mysqli_query($conn, "delete from applicationtypemaster where application_id='$application_id' ");
    $success_msg = "Record Deleted Successfully!";

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


<div class="container mt-5">

    <h2 class="text-center text-secondary my-4">Application Type</h2>

    <div class="col-md-12 text-end">
        <button class="btn btn-secondary m-3  col-md-2"> <a href="application_type.php"
                class="alert-link text-light text-decoration-none">Add Application Type</a></button>
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
                <th class="hidden">Application Type Id</th>
                <th>Application Type</th>
                <th>Application Type Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <?php
        $selectquery = mysqli_query($conn, "SELECT * FROM `applicationtypemaster`");
        while ($fetchdata = mysqli_fetch_array($selectquery)) {

            $application_id = $fetchdata['application_id'];
            // $enc_emp_id = base64_encode($employee_id);
            $app_type = $fetchdata['app_type'];
            $app_description = $fetchdata['app_description'];

            ?>
            <tbody>
                <tr>
                    <td class="hidden">
                        <?php echo $application_id; ?>
                    </td>
                    <td>
                        <?php echo $app_type; ?>
                    </td>
                    <td>
                        <?php echo $app_description; ?>
                    </td>

                    <td><a href="application_type_update.php?application_id=<?php echo $application_id; ?>">Edit</a></td>
                    <td><a href="application_type_list.php?application_id=<?php echo $application_id; ?>"
                            onclick="return confirm('Do you want to delete this record?');">Delete</a></td>
                </tr>

            </tbody>
            <?php
        }
        ?>
</div>