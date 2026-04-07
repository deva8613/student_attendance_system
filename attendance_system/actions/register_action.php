<?php
include '../config/db.php';

$username = trim($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// check user exists
$check = $conn->prepare("SELECT * FROM users WHERE username=?");
$check->bind_param("s", $username);
$check->execute();

if($check->get_result()->num_rows > 0){
    echo "<script>alert('Username exists'); window.location='../pages/register.html';</script>";
    exit();
}

$stmt = $conn->prepare("INSERT INTO users(username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

$stmt->execute();

echo "<script>alert('Registered Successfully'); window.location='../pages/login.html';</script>";
?>