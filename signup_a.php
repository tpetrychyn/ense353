<?php

if (!isset($_POST['submit'])) {
    header("location:/index.php");
    die();
}

require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$verification = uniqid();

$sql = "SELECT * FROM signups where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location:signup.php?error=email");
    die();
}

$sql = "SELECT * FROM signups where username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location:signup.php?error=username");
    die();
}

$sql = "SELECT * FROM users where email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location:signup.php?error=email");
    die();
}

$sql = "SELECT * FROM users where username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location:signup.php?error=username");
    die();
}

$sql = "INSERT INTO signups (email, username, password, verification) 
    VALUES ('$email', '$username', '$password', '$verification')";
$result = $conn->query($sql);

$subject = 'Verify your ENSE353 Account';
$link = 'http://taylor.ursse.org/verify.php?verification='.$verification;
$message = 'Welcome to Taylors ENSE site. Please verify your email by clicking the following link: ' . $link;

mail($email, $subject, $message);

echo 'You have successfully signed up. <br/>';
echo 'You will receive a verification email at ' . $email . ' shortly. <br/>';
echo 'Once verified you will able to login. <br/> <br/>';

echo '<a href="/login.php">Click here to be returned to login.</a>';

?>