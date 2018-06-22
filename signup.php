<?php include('header.php'); ?>

<?php
require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

$error = $_GET['error'];

?>

<div class="row align-items-center justify-content-center">
    <div class="col-lg-6 col-12">
        <h2>Register for an account</h2>
        <form action="signup_a.php" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <?php if ($error == 'email') echo '<small class="text-danger">Email already exists.</small>' ?>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                <?php if ($error == 'username') echo '<small class="text-danger">Username already exists.</small>' ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</div>

<?php 
$conn->close();
?>

<?php include('footer.php'); ?>
