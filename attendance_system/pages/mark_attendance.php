<?php
session_start();
include '../config/db.php';

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
<title>Mark Attendance</title>
<link rel="stylesheet" href="../assets/css/style.css">

<style>
.title {
    color: white;
    margin-bottom: 20px;
}

/* Grid layout */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(180px,1fr));
    gap: 20px;
}

/* Student Card */
.student-card {
    padding: 20px;
    border-radius: 20px;
    text-align: center;
    color: white;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.student-card:hover {
    transform: translateY(-8px) scale(1.03);
}

/* Avatar */
.avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-bottom: 10px;
}

/* Status buttons */
.status {
    display: flex;
    justify-content: space-around;
    margin-top: 10px;
}

.status label {
    padding: 10px;
    border-radius: 50%;
    background: rgba(255,255,255,0.3);
    cursor: pointer;
    font-weight: bold;
}

.status input {
    display: none;
}

.status input:checked + label {
    background: #ff7eb3;
    color: white;
}

/* Submit button */
.submit-btn {
    margin-top: 25px;
    padding: 12px 25px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg,#ff7eb3,#ff758c);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

.submit-btn:hover {
    transform: scale(1.05);
}
</style>

</head>
<body>

<div class="sidebar">
<h2>🎓 System</h2>
<a href="../dashboard.php">Dashboard</a>
<a href="#">Attendance</a>
<a href="view_attendance.php">Records</a>
<a href="../actions/logout.php">Logout</a>
</div>

<div class="topbar">
<h3>Mark Attendance ✍️</h3>
</div>

<div class="main">

<h2 class="title">📋 Select Student Status</h2>

<form method="POST" action="../actions/mark_attendance_action.php">

<div class="grid">

<?php while($row = $result->fetch_assoc()){ ?>
<div class="student-card">

<h4><?php echo $row['name']; ?></h4>

<div class="status">

<input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Present" id="p<?php echo $row['id']; ?>" required>
<label for="p<?php echo $row['id']; ?>">P</label>

<input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Absent" id="a<?php echo $row['id']; ?>">
<label for="a<?php echo $row['id']; ?>">A</label>

<input type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Leave" id="l<?php echo $row['id']; ?>">
<label for="l<?php echo $row['id']; ?>">L</label>

</div>

</div>
<?php } ?>

</div>

<center>
<button class="submit-btn">Submit Attendance</button>
</center>

</form>

</div>

</body>
</html>