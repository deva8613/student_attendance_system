<?php
include '../config/db.php';

$name = trim($_POST['name']);
$class = trim($_POST['class']);

$stmt = $conn->prepare("INSERT INTO students(name, class) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $class);

if($stmt->execute()){
    echo "<script>alert('Student Added'); window.location='../pages/add_student.html';</script>";
} else {
    echo "Error!";
}
?>