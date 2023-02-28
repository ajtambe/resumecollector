<?php
error_reporting(0);
include('config.php');
session_start();




?>

<!-- <style>
  body{
      font-family:'Poppins';
  }
  #example{
      font-family:'Poppins';
      font-size:13px;
  }
  </style> -->
  <!------------------------ EXPORT TO EXCEL, PDF, CSV ------------------------->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> -->
  <!------------------------ EXPORT TO EXCEL, PDF, CSV ------------------------->
  <?php include('navbar.php'); ?>

  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

<?php

$user_name = $_SESSION['username'];


// $pass_word = $_SESSION['password'];

if ($user_name == true) {

} else {
    header('location:admin_login.php');
}
?>

<body>
    <div class="container mt-5">

        <h2 class="text-center text-secondary my-4">Dashboard</h2>
        <!-- 
<div class="col-md-12 text-end">
                <button class="btn btn-secondary m-3  col-md-2"> <a href="education_status.php"
                class="alert-link text-light text-decoration-none">Add Education Status</a></button>
            </div> -->


        <table class="table table-hover table-bordered " id="example" style="width:100%">
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
                    <th class="hidden">Resume Id</th>
                    <th>Fullname</th>
                    <th>Application Type </th>
                    <th>Education Status</th>
                    <th>Year of Passing</th>
                    <th>Primary Ref</th>
                    <th>Added On</th>
                    <th>View Resume</th>
                </tr>
            </thead>

            <?php
            $selectquery = mysqli_query($conn, "SELECT * FROM `resumemaster`");
            while ($fetchdata = mysqli_fetch_array($selectquery)) {

                $resume_id = $fetchdata['resume_id'];
                // $enc_emp_id = base64_encode($employee_id);
                $fullname = $fetchdata['fullname'];

                $app_type_id = $fetchdata['app_type_id'];
                $selectquery1 = mysqli_query($conn, "SELECT * FROM `applicationtypemaster` where 
                 application_id='$app_type_id'");
                while ($fetchdata1 = mysqli_fetch_array($selectquery1)) {

                    $app_type_name = $fetchdata1['app_type'];

                }

                $education_status_id = $fetchdata['education_status_id'];

                $selectquery2 = mysqli_query($conn, "SELECT * FROM `educationstatusmaster` where 
                 education_id='$education_status_id'");
                while ($fetchdata2 = mysqli_fetch_array($selectquery2)) {

                    $education_status_name = $fetchdata2['education_status'];

                }

                $passing_year = $fetchdata['passing_year'];
                $createdon = $fetchdata['createdon'];
                $primary_ref = $fetchdata['primary_ref'];

                $selectquery3 = mysqli_query($conn, "SELECT * FROM `employeemaster` where 
                employee_id='$primary_ref'");
                while ($fetchdata3 = mysqli_fetch_array($selectquery3)) {

                    $primary_ref_name = $fetchdata3['employee_name'];

                }

                ?>
                <tbody>
                    <tr>
                        <td class="hidden">
                            <?php echo $resume_id; ?>
                        </td>

                        <td>
                            <?php echo $fullname; ?>
                        </td>
                        <td>
                            <?php echo $app_type_name; ?>
                        </td>
                        <td>
                            <?php echo $education_status_name; ?>
                        </td>
                        <td>
                            <?php echo $passing_year; ?>
                        </td>
                        <td>
                            <?php echo $primary_ref_name; ?>
                        </td>
                        <td>
                            <?php echo $createdon; ?>
                        </td>
                        <td><a href="view_resume.php?resume_id=<?php echo $resume_id; ?>">view</a></td>
                        <!-- <td><a href="education_status_list.php?education_id=<?php //echo $education_id; ?>"
                                        onclick="return confirm('Do you want to delete this record?');">Delete</a></td> -->
                    </tr>

                </tbody>
                <?php
            }
            ?>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.js "></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js "></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js "></script>



    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });


    </script>



    <!-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->


    <!-- ---------------------- EXPORT TO EXCEL, PDF, CSV ----------------------- -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script type="text/javascript">
    $('#example').DataTable({
        order: [[0, 'desc']],
         dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            }
        ]
    });
    <!-- </script> -->
    <!-- ---------------------- EXPORT TO EXCEL, PDF, CSV ----------------------- -->

</body>