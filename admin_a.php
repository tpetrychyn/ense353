<?php

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location:index.php");
    die();
}

require_once('secrets.php');

$conn = new mysqli(Secrets::SERVERNAME, Secrets::USERNAME, Secrets::PASSWORD, Secrets::DB);

if (isset($_POST['delete'])) {
    $userId = $_POST['userId'];
    $sql = "DELETE FROM users WHERE id='$userId'";
    $conn->query($sql);
    die();
}

if (isset($_POST['edit'])) {
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $subscription = $_POST['subscription'];
    $sql = "UPDATE users SET password='$password', subscription='$subscription' WHERE id='$userId'";
    $conn->query($sql);
    die();
}

if (isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $subscription = $_POST['subscription'];
    $sql = "INSERT INTO users (username, password, email, subscription) VALUES ('$username', '$password','$email', '$subscription')";
    $conn->query($sql);
    die();
}

?>