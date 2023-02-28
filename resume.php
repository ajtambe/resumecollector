<?php
error_reporting(0);
include('config.php');
session_start();
$todaysdate = date("y-m-d"); //date



if (isset($_POST['login'])) {
    $app_type_id = $_POST['app_type_id'];
    $education_status_id = $_POST['education_status_id'];
    $course_name = $_POST['course_name'];
    $stream = $_POST['stream'];
    $college_name = $_POST['college_name'];
    $passing_year = $_POST['passing_year'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $primary_ref = $_POST['primary_ref'];
    $secondary_ref = $_POST['secondary_ref'];



    


    if ($education_status_id != "" && $app_type_id != "") {



       

        $insert = mysqli_query($conn, "insert into `resumemaster` 
        set 
        `app_type_id`='$app_type_id',
        `education_status_id`='$education_status_id',
        `course_name`='$course_name',
        `stream`='$stream',
        `college_name`='$college_name',
        `passing_year`='$passing_year',
        `fullname`='$fullname',
        `email`='$email',
        `mobile`='$mobile',
        `birth_date`='$birth_date',
        `gender`='$gender',
        `address`='$address',
        `primary_ref`='$primary_ref',
        `secondary_ref`='$secondary_ref',
        `createdon`='$todaysdate'
        
        ");


        $lastempid = mysqli_insert_id($conn);

            $target_dir = "resume/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imagename = basename($_FILES["fileToUpload"]["name"]);

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


                $updateprofilephotoquery = mysqli_query($conn, "update resumemaster set `resume`='$imagename' where `resume_id`='$lastempid'");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        

            // if($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/jpg")
            // {


            $target_dir = "profile_photo/";
            // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            // && $imageFileType != "gif" ) {
                $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
                $imagename = basename($_FILES["profile_photo"]["name"]);
                
                $uploadOk = 1;
                
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
                    
                    
                    $updateprofilephotoquery2 = mysqli_query($conn, "update resumemaster set `profile_photo`='$imagename' where `resume_id`='$lastempid'");
                } else {
                    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    // $uploadOk = 0;
                    echo "Sorry, there was an error uploading your file.";
                }
                
              
            



        // }
        // else
        // {
        // echo "Error !!, Only jpeg and gif image allowed";
        // }
            
            $success_msg = "Succefully Employee Added!";
        } else {
            $error_msg = "Please Check Application  Type & Employee Status !";
    }
    ;
    
   
}




?>
<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Collector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
body{
    background-color:#e9ecef ;
}

.container {
            width: 45%;
            margin: auto;
        }

    </style>

</head>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#"><b>Resume </b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="add_employee.php">Add Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="list_employee.php">List Employee</a>
        </li>
       
      </ul> -->

        </div>
    </div>
</nav>

<div class="container my-5 bg-white border border-white  border border-4 rounded">

    <form action="resume.php" method="post" class="form " enctype="multipart/form-data">


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
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3">Application Type :</label>
            </div>
            <div class="col-md-9">

                <select class="form-select" id="floatingSelect" name="app_type_id">
                    <option selected disabled> --Application Type--</option>
                    <?php
                    $getapptype = mysqli_query($conn, "SELECT * FROM `applicationtypemaster`");
                    while ($dataapptype = mysqli_fetch_array($getapptype)) {

                        $application_id = $dataapptype['application_id'];
                        // $enc_emp_id = base64_encode($employee_id);
                        $app_type = $dataapptype['app_type'];
                        $app_description = $dataapptype['app_description'];

                        ?>
                        <option value="<?php echo $application_id; ?>"><?php echo $app_type; ?></option>
                        <?php


}
                    ?>

                </select>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3">Education Status :</label>
            </div>
            <div class="col-md-9">

                <select class="form-select" id="floatingSelect" name="education_status_id">
                    <option selected disabled> --Education Status--</option>
                    <?php
                    $getapptype = mysqli_query($conn, "SELECT * FROM `educationstatusmaster`");
                    while ($dataapptype = mysqli_fetch_array($getapptype)) {

                        $education_id = $dataapptype['education_id'];
                        // $enc_emp_id = base64_encode($employee_id);
                        $education_status = $dataapptype['education_status'];

                        ?>
                        <option value="<?php echo $education_id; ?>"><?php echo $education_status; ?></option>
                        <?php

                    }
                    ?>
                </select>
            </div>
        </div>



        <div class="row m-2">
            <div class="col-md-3">
                <label for="" class="form-label mb-3"> Course Name :</label>
            </div>
            <div class="col-md-9">

                <input type="text" class="form-control " id="Name" name="course_name">
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Stream : </label>

            </div>
            <div class="col-md-9">

                <input type="text" class="form-control " id="Name" name="stream">
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> College Name :</label>
            </div>
            <div class="col-md-9">

                <input type="text" class="form-control " id="" name="college_name">
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-3">


                <label for="">Year of Passing :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" name="passing_year">
            </div>
        </div>

        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Full Name :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control " id="Name" name="fullname">
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Email :</label>
            </div>
            <div class="col-md-9">
                <input type="email" class="form-control " id="" name="email">
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Mobile :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control " id="Name" name="mobile">
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="">Date of Birth :</label>
            </div>
            <div class="col-md-9">
                <input type="date" class="form-control" name="birth_date">
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3">Gender</label>
            </div>
            <div class="col-md-9">

                <select class="form-select" id="floatingSelect" name="gender">
                    <option selected disabled> --Gender--</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Address :</label>
            </div>
            <div class="col-md-9">

                <input type="text" class="form-control " id="" name="address">
            </div>
        </div>
        
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Upload Photo :</label>
            </div>

            <div class="col-md-9">
                <input class="form-control form-control-sm" type="file" name="profile_photo" id="fileToUpload" accept="image/*">
               <!-- <input type="file" name="myImage" accept="image/png,image/gif,image/jpeg"/> -->
            </div>

            
        </div>

        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> Upload Resume :</label>
            </div>

            <div class="col-md-9">
                <input class="form-control form-control-sm" type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf">
            </div>



        </div>
        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3">Primary
                    Reference :</label>
            </div>
            <div class="col-md-9">

                <select class="form-select" id="floatingSelect" name="primary_ref">
                    <option selected disabled> --Primary Reference--
                    </option>
                    <?php

                    $getapptype = mysqli_query($conn, "SELECT * FROM `employeemaster`");
                    while ($dataapptype = mysqli_fetch_array($getapptype)) {

                        $employee_id = $dataapptype['employee_id'];
                        // $enc_emp_id = base64_encode($employee_id);
                        $employee_name = $dataapptype['employee_name'];
                        // $education_desc = $dataapptype['education_desc'];
                    
                        ?>
                        <option value="<?php echo $employee_id; ?>"><?php echo $employee_name; ?></option>
                        <?php

                    }
                    ?>

                </select>

            </div>
        </div>


        <div class="row m-2">
            <div class="col-md-3">

                <label for="" class="form-label mb-3"> secondary
                    Reference :</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control " id="" name="secondary_ref">
            </div>
        </div>
        
        <div class="row m-2">
            <div class="col-md-3">

       
            </div>
            <div class="col-md-9">
            <input type="submit" class="btn btn-secondary col-md-7    " name="login" value="Login">

        </div>
        </div>

    </form>

</div>