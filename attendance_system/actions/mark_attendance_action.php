<?php
include '../config/db.php';

$date = date("Y-m-d");

if(isset($_POST['attendance'])){

    foreach($_POST['attendance'] as $student_id => $status){

        // 🔥 Make sure status comes from form
        $status = trim($status);

        // DEBUG (remove after test)
        // echo $student_id . " => " . $status . "<br>";

        // Check existing record
        $check = $conn->prepare("SELECT id FROM attendance WHERE student_id=? AND date=?");
        $check->bind_param("is", $student_id, $date);
        $check->execute();
        $res = $check->get_result();

        if($res->num_rows > 0){

            // UPDATE
            $stmt = $conn->prepare("UPDATE attendance SET status=? WHERE student_id=? AND date=?");
            $stmt->bind_param("sis", $status, $student_id, $date);
            $stmt->execute();

        } else {

            // INSERT
            $stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $student_id, $date, $status);
            $stmt->execute();
        }
    }

    echo "<script>alert('Attendance Saved Successfully'); window.location='../pages/view_attendance.php';</script>";
}
?>