<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM appointments ORDER BY appointment_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Appointments</title>

<style>
body{font-family:Arial;margin:20px;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #ccc;padding:10px;}
th{background: #f6f6f6;font: 3px;f2;}

.btn{
padding:5px 10px;
text-decoration:none;
border-radius:4px;
color:light blue;
}

.edit{background:light blue;}
.delete{background:red;}
</style>
</head>

<body>

<h1>Appointment List</h1>

<table>

<tr>
<th>ID</th>
<th>Patient Name</th>
<th>Reason</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
?>

<tr>
<td><?php echo $row['appointment_id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['reason']; ?></td>
<td><?php echo $row['appointment_date']; ?></td>
<td><?php echo $row['appointment_time']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a href="edit_appointment.php?id=<?php
 echo $row['appointment_id']; ?>">
Edit
</a>

<a href="delete_appointment.php?id=<?php echo $row['appointment_id']; ?>"
onclick="return confirm('Delete this appointment?');">
Delete
</a>
</td>

</tr>

<?php
    }
}
else
{
    echo "<tr><td colspan='7'>No appointments found in database</td></tr>";
}
?>

</table>

</body>
</html>