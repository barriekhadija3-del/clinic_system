<?php
include 'db.php';

$search = "";

if(!isset($_SESSION['user_id']) || 
$_SESSION['role'] != 'patients')
{
    header("Location: login.php");
    exit();
}
if(isset($_GET['search']))
{
    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $result = mysqli_query($conn,
    "SELECT * FROM patients
    WHERE full_name LIKE '%$search%'
    ORDER BY patient_id DESC");
}
else
{
    $result = mysqli_query($conn,
    "SELECT * FROM patients
    ORDER BY patient_id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Patients List</title>

<style>

body{
font-family:Arial;
margin:20px;
}

table{
width:100%;
border-collapse:collapse;
}

th,td{
border:1px solid #ccc;
padding:10px;
}

th{
background:#f2f2f2;
}

.edit{
background:blue;
color:white;
padding:5px 10px;
text-decoration:none;
}

.delete{
background:red;
color:white;
padding:5px 10px;
text-decoration:none;
}

</style>

</head>

<body>

<h1>Patients List</h1>
<a href="add_patient.php">
<button>Add New Patient</button>
</a>

<br><br>

<form method="GET">

<input type="text"
name="search"
placeholder="Search patient name">

<button type="submit">
Search
</button>

</form>

<br>

<table>

<tr>
<th>ID</th>
<th>Full Name</th>
<th>Gender</th>
<th>Phone</th>
<th>Address</th>
<th>Date of Birth</th>
<th>Actions</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['patient_id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['address']; ?></td>

<td><?php echo $row['date_of_birth']; ?></td>

<td>

<a class="edit"
href="edit_patient.php?id=<?php echo 
$row['patient_id']; ?>">
Edit
</a>

<a class="btn delete"
href="delete_patient.php?id=<?php echo $row['patient_id']; ?>"
onclick="return confirm('Delete this patient?');">
Delete
</a>

</td>
<a href="my_appointments.php" class="btn">
My Appointments
</a>
</tr>


<?php } ?>

</table>

</body>
</html>