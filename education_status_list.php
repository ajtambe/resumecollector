<?php
error_reporting(0);
include('config.php');
session_start();

$education_id = $_GET['education_id'];


// $dec_emp_id = base64_decode($employee_id);
if ($education_id != "") {
    $deleterecord = mysqli_query($conn, "delete from educationstatusmaster where education_id ='$education_id' ");
    $success_msg = "Record Deleted Successfully!";

}

?>

<?php
$user_name = $_SESSION['username'];
// $pass_word = $_SESSION['password'];

if ($user_name == "") {

    header('.php');
}
?>


<?php include('navbar.php'); ?>


<div class="container mt-5">

    <h2 class="text-center text-secondary my-4">Education Status</h2>

    <div class="col-md-12 text-end">
        <button class="btn btn-secondary m-3  col-md-2"> <a href="education_status.php"
                class="alert-link text-light text-decoration-none">Add Education Status</a></button>
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
                <th class="hidden">Education Status Id</th>
                <th>Education Status </th>
                <th>Education Status Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <?php
        $selectquery = mysqli_query($conn, "SELECT * FROM `educationstatusmaster`");
        while ($fetchdata = mysqli_fetch_array($selectquery)) {

            $education_id = $fetchdata['education_id'];
            // $enc_emp_id = base64_encode($employee_id);
            $education_status = $fetchdata['education_status'];
            $education_desc = $fetchdata['education_desc'];

            ?>
            <tbody>
                <tr>
                    <td class="hidden">
                        <?php echo $education_id; ?>
                    </td>
                    <td>
                        <?php echo $education_status; ?>
                    </td>
                    <td>
                        <?php echo $education_desc; ?>
                    </td>

                    <td><a href="education_status_update.php?education_id=<?php echo $education_id; ?>">Edit</a></td>
                    <td><a href="education_status_list.php?education_id=<?php echo $education_id; ?>"
                            onclick="return confirm('Do you want to delete this record?');">Delete</a></td>
                </tr>

            </tbody>
            <?php
        }
      
      ?>
    </table>
</div>