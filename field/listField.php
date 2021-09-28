<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';

$select = "SELECT * FROM fields";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `fields` WHERE id = $id";
    $d = mysqli_query($conn, $delete);
    textMessage($d, "DELETE");
}
auth();
?>



<h1 class="text-center text-danger display-1 b">list Fields</h1>


<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Field ID</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($s as $field) { ?>
                    <tr>
                        <td><?php echo $field['id']; ?></td>
                        <td><?php echo $field['field']; ?></td>
                        <td> <a href="listField.php?delete=<?php echo $field['id'] ?>" class="btn btn-danger">Delete</a></td>
                        <td> <a href="addField.php?edit=<?php echo $field['id'] ?>" class="btn btn-primary">Update</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include '../shared/script.php'; ?>