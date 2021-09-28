<?php

include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';

if (isset($_POST['login'])) {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `admin` WHERE name ='$userName' AND password ='$password' ";
    $a = mysqli_query($conn, $select);
    $num = mysqli_num_rows($a);
    if ($num > 0) {
        echo "<h1 class = 'text-center text-primary b pt-5'> True Admin </h1>";
        $_SESSION['admin'] = $userName;
        header("Refresh:0; url= http://localhost/Hospital/index.php");
    } else {

        echo "<h1 class = 'text-center text-primary b pt-5'> False Admin </h1>";
    }
}

// print_r( $_SESSION);

?>

<h1 class="text-center text-danger display-1 b">Login Page</h1>

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
                <button name="login" class="btn btn-dark m-6 mx-auto  btn-block">Login</button>

            </form>
        </div>
    </div>

</div>

<?php include '../shared/script.php'; ?>