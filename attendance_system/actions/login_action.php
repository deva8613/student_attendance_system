<?php
session_start();
include '../config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){
    $user = $result->fetch_assoc();

    if(password_verify($password, $user['password'])){
        $_SESSION['user'] = $username;
        header("Location: ../dashboard.php");
    } else {
        echo "<script>alert('Wrong Password'); window.location='../pages/login.html';</script>";
    }
} else {
    echo "<script>alert('User not found'); window.location='../pages/login.html';</script>";
}
?>