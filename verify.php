<?php
require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);

$verification = $_GET['verification'];

echo $verification . "<br/>";
$sql = "SELECT * FROM signups where verification = '$verification'";
$result = $conn->query($sql);

$signup = mysqli_fetch_assoc($result);

if ($signup['username'] == null) {
    header("Location:/index.php");
    die();
}

$username = $signup['username'];
$password = $signup['password'];
$email = $signup['email'];
$subscription = 0;
$role = 0;

$sql = "INSERT INTO users (username, password, email, subscription, role) 
    VALUES ('$username', '$password', '$email', '$subscription', '$role');";
$result = $conn->query($sql);

$sql = "DELETE FROM signups WHERE verification='$verification'";
$result = $conn->query($sql);

$conn->close();

header("Location:/login.php");
?>