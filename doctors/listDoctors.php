<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';

$select = "SELECT fields.field field , doctors.id  , doctors.name  FROM doctors JOIN fields ON doctors.fieldID = fields.id";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `doctors` WHERE id = $id";
    $d = mysqli_query($conn, $delete);
    textMessage($d, "DELETE");
}
auth();

?>

<h1 class="text-center text-danger display-1 b">List Doctor</h1>


<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Field ID</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($s as $doctor) { ?>
                    <tr>
                        <td><?php echo $doctor['id']; ?></td>
                        <td><?php echo $doctor['name']; ?></td>
                        <td><?php echo $doctor['field']; ?></td>
                        <td> <a href="listDoctors.php?delete=<?php echo $doctor['id'] ?>" class="btn btn-danger">Delete</a></td>
                        <td> <a href="addDoctors.php?edit=<?php echo $doctor['id'] ?>" class="btn btn-primary">Update</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>


<?php include '../shared/script.php'; ?>