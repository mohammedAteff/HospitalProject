<?php

include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';

if(isset($_POST['register'])){
    $name = $_POST['userName'];
    $password = $_POST['password'];
    $insert = "INSERT INTO `admin` VALUES (NULL , '$name' , '$password')";
    $i = mysqli_query($conn , $insert);
    header("Refresh:0; url= http://localhost/Hospital/admin/login.php");
}


?>

<h1 class="text-center text-danger display-1 b">registration Page</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Admin Name</label>
                    <input type="text" name="userName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Admin Password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <button name="register" class="btn btn-dark m-6 mx-auto  btn-block">register</button>

            </form>
        </div>
    </div>

</div>

<?php include '../shared/script.php'; ?>