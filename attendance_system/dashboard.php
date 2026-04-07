<?php
session_start();
include 'config/db.php';

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}

// total students
$students = $conn->query("SELECT COUNT(*) as total FROM students")->fetch_assoc()['total'];

// today attendance
$today = date("Y-m-d");
$attendance = $conn->query("SELECT COUNT(*) as total FROM attendance WHERE date='$today'")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="assets/css/style.css">

<style>
/* Dashboard Enhancements */
.dashboard-title {
    color: white;
    margin-bottom: 20px;
    font-size: 28px;
}

/* Profile box */
.profile-box {
    position: absolute;
    right: 30px;
    top: 15px;
    color: white;
    font-size: 14px;
}

/* Stat Cards Grid */
.stat-cards {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

/* Cards */
.stat {
    flex: 1;
    min-width: 200px;
    padding: 25px;
    border-radius: 20px;
    color: white;
    position: relative;
    overflow: hidden;
    animation: fadeUp 0.8s ease;
}

/* Gradient Colors */
.blue { background: linear-gradient(135deg,#3b82f6,#6366f1); }
.green { background: linear-gradient(135deg,#10b981,#34d399); }
.orange { background: linear-gradient(135deg,#f59e0b,#fbbf24); }
.purple { background: linear-gradient(135deg,#8b5cf6,#a78bfa); }

/* Hover effect */
.stat:hover {
    transform: translateY(-8px) scale(1.03);
    transition: 0.3s;
}

/* Numbers */
.stat h3 {
    font-size: 30px;
}

/* Floating glow */
.stat::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    top: -30px;
    right: -30px;
}

/* Animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Quick actions */
.quick-actions {
    margin-top: 30px;
}

.quick-actions a {
    display: inline-block;
    margin: 10px;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    color: white;
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(10px);
    transition: 0.3s;
}

.quick-actions a:hover {
    background: white;
    color: black;
}
</style>

</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
<h2>🎓 System</h2>
<a href="#">Dashboard</a>
<a href="pages/add_student.html">Add Student</a>
<a href="pages/mark_attendance.php">Attendance</a>
<a href="pages/view_attendance.php">Records</a>
<a href="actions/logout.php">Logout</a>
</div>

<!-- Topbar -->
<div class="topbar">
<h3>Welcome <?php echo $_SESSION['user']; ?> 👋</h3>

<div class="profile-box">
Logged in as <b><?php echo $_SESSION['user']; ?></b>
</div>
</div>

<!-- Main -->
<div class="main">

<h2 class="dashboard-title">📊 Dashboard Overview</h2>

<div class="stat-cards">

<div class="stat blue">
<h3><?php echo $students; ?></h3>
<p>Total Students</p>
</div>

<div class="stat green">
<h3><?php echo $attendance; ?></h3>
<p>Today's Attendance</p>
</div>

<div class="stat orange">
<h3>Active</h3>
<p>System Status</p>
</div>

<div class="stat purple">
<h3>Reports</h3>
<p>View Analytics</p>
</div>

</div>

<!-- Quick Actions -->
<div class="quick-actions">
<a href="pages/add_student.html">➕ Add Student</a>
<a href="pages/mark_attendance.php">✅ Mark Attendance</a>
<a href="pages/view_attendance.php">📅 View Records</a>
</div>

</div>

</body>
</html>