<?php
if (!(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password']))) {
    header("Location:/index.php");
    die();
}

session_start();
require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
$result = $conn->query($sql);
$user = mysqli_fetch_assoc($result);


if ($user['username'] == null) {
    header("Location:/login.php");
    die();
}

$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();
$_SESSION['user'] = $user;

$conn->close();

header("Location:/index.php");
?>