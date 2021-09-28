<?php
session_start();
if(isset($_GET['Logout'])){
  session_unset();
  session_destroy();
}
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/Hospital/index.php">Hospital</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Hospital/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
<?php if(isset($_SESSION['admin'])) : ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Doctors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Hospital/doctors/addDoctors.php">Add Doctor</a>
          <a class="dropdown-item" href="/Hospital/doctors/listDoctors.php">List Doctor</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fields
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Hospital/field/addField.php">Add Field</a>
          <a class="dropdown-item" href="/Hospital/field/listField.php">List Field</a>
        </div>
      </li>
    </ul>

    <form action="">
  <button class="btn btn-outline-danger my-2 my-sm-0" name="Logout" type="submit">Logout</button>
    </form>
    <?php else : ?>
    <a href="/Hospital/admin/login.php"> <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Login</button></a>
    <a href="/Hospital/admin/addadmin.php"> <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">registration</button></a>

    <?php endif; ?>
  </div>
</nav>