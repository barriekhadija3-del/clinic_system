<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$search = "";

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
    "SELECT * FROM patients ORDER BY patient_id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - Patients Control</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f6f9;
}

.sidebar{
    width:250px;
    height:100vh;
    background:#1e3a8a;
    position:fixed;
}

.sidebar h2{
    color:white;
    text-align:center;
    padding:20px;
}

.sidebar a{
    display:block;
    color:white;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#3b82f6;
}

.main{
    margin-left:250px;
    padding:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th,td{
    padding:10px;
    border:1px solid #ccc;
}

th{
    background:#e5e7eb;
}

.btn{
    padding:5px 10px;
    text-decoration:none;
    color:white;
    border-radius:4px;
}

.edit{
    background:#2563eb;
}

.delete{
    background:#dc2626;
}

input[type=text]{
    padding:8px;
    width:250px;
}

button{
    padding:8px 12px;
}

</style>

</head>

<body>

<div class="sidebar">

    <h2>ADMIN PANEL</h2>

    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admin_patients.php">Patients</a>
    <a href="appointment.php">Appointments</a>
    <a href="medical_records.php">Medical Records</a>
    <a href="logout.php">Logout</a>

</div>

<div class="main">

<h1>Patients Management</h1>

<form method="GET">

<input type="text" name="search" placeholder="Search patient">

<button type="submit">Search</button>

</form>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Gender</th>
<th>Phone</th>
<th>Address</th>
<th>DOB</th>
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

<a class="btn edit" href="edit_patient.php?id=<?php echo $row['patient_id']; ?>">
Edit
</a>

<a class="btn delete"
href="delete_patient.php?id=<?php echo $row['patient_id']; ?>"
onclick="return confirm('Are you sure?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>