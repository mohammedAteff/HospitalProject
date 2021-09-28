<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';


if (isset($_POST['send'])) {
    $name = $_POST['name'];

    $insert = "INSERT INTO  `fields` VALUES (NULL , '$name' )";
    $i = mysqli_query($conn, $insert);
    textMessage($i, " Insert ");
}
// Select fields table

$select = "SELECT * FROM `fields`";
$add = mysqli_query($conn, $select);
// Edit
$name = "";
$edit = false;
if (isset($_GET['edit'])) { //دي كدة اول ماتدوس ع edit doctor 
    $edit = true;
    $id = $_GET['edit'];
    $select = "SELECT * FROM `fields` WHERE id = $id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    $name = $row['field'];

    if (isset($_POST['update'])) { // دي فانكشن ال update نفسها
        $name = $_POST['name'];
        $fieldID = $_POST['field'];
        $update = "UPDATE `fields` SET field = '$name'  WHERE id = $id";
        $u = mysqli_query($conn, $update);
        header("Refresh:0; url=listField.php");
    }
}
auth();
?>


<h1 class="text-center text-danger display-1 b">Add Patient</h1>


<!-- <h1 > Edit Doctor  : <?php echo $row['name'] ?> </h1> -->

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for=""> Fields Name </label>
                    <input name="name" value="<?php echo $name ?>" type="text" class="form-control" placeholder="Name">
                </div>

                <?php

                if ($edit) : ?>
                    <button name="update" class="btn btn-info m-3 mx-auto  btn-block"> update Data</button>
                <?php else : ?>
                    <button name="send" class="btn btn-dark m-3 mx-auto  btn-block"> Send Data</button>
                <?php endif; ?>


            </form>
        </div>
    </div>
</div>

<?php include '../shared/script.php'; ?>