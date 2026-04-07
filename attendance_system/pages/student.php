<?php
include '../config/db.php';

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $result = $conn->query("SELECT * FROM students WHERE name LIKE '%$search%'");
} else {
    $result = $conn->query("SELECT * FROM students");
}
?>

<link rel="stylesheet" href="../assets/css/style.css">

<h2>Students</h2>

<form class="search-box">
<input type="text" name="search" placeholder="Search student...">
<button>Search</button>
</form>

<table border="1">
<tr>
<th>Name</th>
<th>Class</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td>
<a href="../actions/delete_student.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
</td>
</tr>
<?php } ?>

</table>