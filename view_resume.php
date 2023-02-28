<?php
error_reporting(0);
include('config.php');


$resume_id = $_GET['resume_id'];

$selectquery = mysqli_query($conn, "SELECT * FROM `resumemaster` where resume_id ='$resume_id'");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $employee_id = $fetchdata['employee_id'];
    $enc_emp_id = base64_encode($employee_id);

    $fullname = $fetchdata['fullname'];
    $app_type_id = $fetchdata['app_type_id'];
    $selectquery1 = mysqli_query($conn, "SELECT * FROM `applicationtypemaster` where application_id='$app_type_id'");
    while ($fetchdata1 = mysqli_fetch_array($selectquery1)) {

        $app_type_name = $fetchdata1['app_type'];

    }
    $education_status_id = $fetchdata['education_status_id'];

    $selectquery2 = mysqli_query($conn, "SELECT * FROM `educationstatusmaster` where education_id='$education_status_id'");
    while ($fetchdata2 = mysqli_fetch_array($selectquery2)) {

        $education_status_name = $fetchdata2['education_status'];

    }

    $course_name = $fetchdata['course_name'];
    $stream = $fetchdata['stream'];
    $college_name = $fetchdata['college_name'];
    $passing_year = $fetchdata['passing_year'];
    $email = $fetchdata['email'];
    $mobile = $fetchdata['mobile'];
    $birth_date = $fetchdata['birth_date'];
    $gender = $fetchdata['gender'];
    $address = $fetchdata['address'];
    $primary_ref = $fetchdata['primary_ref'];
    $selectquery3 = mysqli_query($conn, "SELECT * FROM `employeemaster` where employee_id='$primary_ref'");
    while ($fetchdata3 = mysqli_fetch_array($selectquery3)) {

        $primary_ref_name = $fetchdata3['employee_name'];

    }

    $secondary_ref = $fetchdata['secondary_ref'];
    $createdon = $fetchdata['createdon'];
    $resume = $fetchdata['resume'];
    $profile_photo = $fetchdata['profile_photo'];

}

?>
<?php include('navbar.php'); ?>


<body>

    <div class="container mt-5">
<!-- <div class="col-md-12 text-end"> -->
    <!-- <button class="btn btn-secondary m-3 col-md-2 " > <a href="dashboard.php"
                class="alert-link text-light text-decoration-none  ">Dashboard</a></button>
                </div> -->

        <table class="table table-hover table-bordered " style="width: 60%;">

            <tr>
                <th class="text-center pt-5 ">Profile Photo</th>
                <td>
                    <?php
                if($profile_photo!=NULL)
	 {
        ?>
                    <img src="profile_photo/<?php echo $profile_photo; ?>" alt="img" style="width: 200px;">
<?php
     }
?>
                    
                </td>


            </tr>

            <tr>
                <th>Full Name</th>
                <td>
                    <?php echo $fullname; ?>
                </td>
            </tr>
            <tr>
                <th>Application Type</th>
                <td>
                    <?php echo $app_type_name; ?>
                </td>


            </tr>
            <tr>
                <th>Education Status</th>
                <td>
                    <?php echo $education_status_name; ?>
                </td>

            </tr>

            <tr>
                <th>Course Name</th>
                <td>
                    <?php echo $course_name; ?>
                </td>
            </tr>
            <tr>
                <th>Stream</th>
                <td>
                    <?php echo $stream; ?>
                </td>
            </tr>
            <tr>
                <th>College Name</th>
                <td>
                    <?php echo $college_name; ?>
                </td>
            </tr>
            <tr>
                <th>Passing Year </th>
                <td>
                    <?php echo $passing_year; ?>
                </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <?php echo $email; ?>
                </td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>
                    <?php echo $mobile; ?>
                </td>
            </tr>
            <tr>
                <th>Birth date </th>
                <td>
                    <?php echo $birth_date; ?>
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>
                    <?php echo $gender; ?>
                </td>
            </tr>
            <tr>
                <th>Address</th>
                <td>
                    <?php echo $address; ?>
                </td>
            </tr>
            <tr>
                <th>Primary ref</th>
                <td>
                    <?php echo $primary_ref_name; ?>
                </td>
            </tr>
            <tr>
                <th>Secondary ref</th>
                <td>
                    <?php echo $secondary_ref; ?>
                </td>
            </tr>

            <tr>
                <th>Added On</th>
                <td>
                    <?php echo $createdon; ?>
                </td>
            </tr>
            <tr>
                <th>Primary ref</th>
                <td>
                    <?php echo $secondary_ref; ?>
                </td>
            </tr>
            <th class="pt-5">Resume</th>
            <?php
	 
	 if($resume!=NULL)
	 {
	 ?>
            <td><iframe src="resume/<?php echo $resume; ?>" frameborder="0" width="100%"; height="400px"></iframe></td>
            <?php

     }
     ?>
            </tbody>
        </table>