<?php
include '../config/db.php';

$result = $conn->query("
SELECT students.name, attendance.date, attendance.status 
FROM attendance 
JOIN students ON attendance.student_id = students.id
ORDER BY attendance.date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance Records</title>
<link rel="stylesheet" href="../assets/css/style.css">

<style>
.table-box {
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(15px);
    padding: 20px;
    border-radius: 20px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    color: white;
}

th {
    background: rgba(0,0,0,0.3);
}

td, th {
    padding: 12px;
    text-align: center;
}

/* Status colors */
.present { color: #00ffae; }
.absent { color: #ff4d4d; }
.leave { color: #ffd700; }

/* Hover */
tr:hover {
    background: rgba(255,255,255,0.1);
}
</style>

</head>
<body>

<div class="sidebar">
<h2>🎓 System</h2>
<a href="../dashboard.php">Dashboard</a>
<a href="mark_attendance.php">Attendance</a>
<a href="#">Records</a>
<a href="../actions/logout.php">Logout</a>
</div>

<div class="topbar">
<h3>Attendance Records 📅</h3>
</div>

<div class="main">

<div class="table-box">
<h2 style="color:white;">📊 Attendance History</h2>

<table>
<tr>
<th>Student Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['date']; ?></td>

<td class="<?php echo strtolower($row['status']); ?>">
<?php echo $row['status']; ?>
</td>
</tr>
<?php } ?>

</table>

</div>

</div>

</body>
</html>