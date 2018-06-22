<?php

session_start();

if (!isset($_POST['submit']) || !isset($_POST['subscription']) || !isset($_SESSION['user'])) {
    header("Location:index.php");
    die();
}

require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);

$username = $_SESSION['user']['username'];
$subscription = $_POST['subscription'];

$sql = "UPDATE users SET subscription='$subscription' WHERE username='$username'";
$result = $conn->query($sql);

$_SESSION['user']['subscription'] = $subscription;  

header("Location:index.php");

?>