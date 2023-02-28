<?php
session_start();

?>
<?php
$user_name = $_SESSION['username'];
// $pass_word = $_SESSION['password'];

if ($user_name == true) {

} else {
  header('location:admin_login.php');
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
    body {
      background-color: #e9ecef;

    }

    .container form {
      border-radius: 8px;
    box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
      background-color: white;
      /* border-radius: 3px; */
    }

    .container table {
      border-radius: 8px;
    box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
      background-color: white;
      /* border-radius: 3px; */
    }

    .hidden {

      /* display: none; */
    }
  </style>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="dashboard.php"><b>Resume Collector</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link text-white" href="setting.php">Setting </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="add_emp_list.php">Employee Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="application_type_list.php">Application Type </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="education_status_list.php">Educational Status</a>
        </li>
      </ul>
      <!-- <div class="login mx-1 px-3 bg-danger bg-gradient text-white rounded-pill">
    <a class="nav-link active text-white" aria-current="page" href="admin_login.php">Login</a>

</div>     -->
      <div class="login mx-3 bg-danger bg-gradient text-white rounded-pill">
        <a class="nav-link active text-white" aria-current="page" href="">Welcome :
          <?php echo $user_name; ?>
        </a>

      </div>

      <div class="login mx-3 bg-danger bg-gradient text-white rounded-pill">
        <a class="nav-link active text-white" aria-current="page" href="logout.php">Logout</a>

      </div>


    </div>
  </div>
</nav>