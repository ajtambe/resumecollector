<?php
error_reporting(0);
include('config.php');
session_start();
?>

<?php
$selectquery = mysqli_query($conn, "SELECT * FROM `settingmaster` where admin_id='1' ");
while ($fetchdata = mysqli_fetch_array($selectquery)) {

    $company_id = $fetchdata['company_id'];

    $company_name = $fetchdata['company_name'];
    $appemployee_email_type = $fetchdata['employee_email'];
    $tag_line = $fetchdata['tag_line'];
    $address = $fetchdata['address'];
    $super_admin_password = $fetchdata['super_admin_password'];
}

?>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
if($username=='admin'){

}else{
    
}

    // if ($username == $company_name && $password == $super_admin_password) {
    // if ($username !=""  && $password !="" ) {

        $checkuser = mysqli_query($conn, "select * from employeemaster where `username`='$username' && `password`='$password'");
        $checkuser2 = mysqli_query($conn, "select * from settingmaster where `company_name`='$username' && `super_admin_password`='$password'");
        
        $count = mysqli_num_rows($checkuser);
        $count1 = mysqli_num_rows($checkuser2);
        if($count==1)
        { 
            
            $_SESSION['username'] = $username;
            //    && $_SESSION['password']=$password ){
                
                
                $success_msg = " Login Succefully !";
                header("Location: dashboard.php");
                
            }    elseif ($count1==1) {
                $_SESSION['username'] = $username;
                //    && $_SESSION['password']=$password ){
            
            
                $success_msg = " Login Succefully !";
                header("Location: dashboard.php");
                
            }else {
                
                $error_msg = "Please Check User Name & Password !";
          

    }
    ;
}
 
// }  



?>





<nav class="navbar navbar-expand-lg navbar-light bg-secondary ">
  <div class="container-fluid">
    <a class="navbar-brand text-white " href="#"><b>Resume Collector</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
       
        
       
      </ul>
<div class="login mx-1 px-3 bg-danger bg-gradient text-white rounded-pill">
    <a class="nav-link active text-white text-end" aria-current="page" href="admin_login.php">Login</a>

</div>    

    </div>
  </div>
</nav>




<?php //include('navbar.php'); ?>

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
            background-color: white;
            border-radius: 3px;
        }

        .container table {
            background-color: white;
            border-radius: 3px;
        }
/* .stop{
    transition: 1s;
}
.move{
    transform: translateX(100%);
} */
    </style>
</head>

<body>
    <div class="container  mb-3 col-md-4 pt-5">

        <h2 class="text-center text-secondary">Login</h2>
        <form action="admin_login.php" method="post" class=" border border-secondary mt-5 py-4 ">

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



            <div class="mb-3 col-md-9  mx-5">
                <label for="" class="form-label mb-3"> User Name :</label>
                <input type="text" class="form-control " id="email" name="username" autocomplete="off">
            </div>

            <div class="mb-3 col-md-9 mx-5">
                <label for="" class="form-label mb-3"> Password :</label>
                <input type="password" class="form-control " id="password" name="password">
            </div>
            <div class="">
                <button type="submit" class="btn btn-secondary col-md-4  mx-5 my-2" name="login"
                     id="submit">Login</button>
            </div>
        </form>
    </div>

<!-- 
<script>
const emailInput=document.getElementById("email");

const passwordInput=document.getElementById("password"); 
 let submitButton=document.getElementById("submit");


submitButton.addEventListener("mouseover", (button)=>{
    let email=emailInput.value;
    let password=passwordInput.value;







let validate=/^([a-zA-Z0-9\._]+)@([a-zA-Z0-9]+).([a-z]+)?/.

test (email)
 && 
/[a-zA-Z0-9]{8}/.test(password)







if(!validate){

button.target.classList.toggle("move"); 
submitButton.style.background="red";
submitButton.innerHTML= "Pahile data tak" ;





}else{

button.target.classList.add("stop")
 submitButton.style.background="green"
submitButton.innerHTML= "Haa aab thik hey" ;


}




})

</script> -->




</body>

</html>