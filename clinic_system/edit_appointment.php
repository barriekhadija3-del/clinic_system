<?php
include 'db.php';

if(!isset($_GET['id']))
{
    die("No appointment selected");
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM appointments WHERE 
appointment_id='$id'");
if(!$result || mysqli_num_rows($result) == 0)
{
    die("Appointment not found");
} 

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
</head>

<body>

<h2>Edit Appointment</h2>

<form method="POST" action="update_appointment.php">

<input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">

Patient Name:<br>
<input type="text" name="patient_name" value="<?php echo $row['patient_name']; ?>">
<br><br>

Reason:<br>
<input type="text" name="reason" value="<?php echo $row['reason']; ?>">
<br><br>

Appointment Date:<br>
<input type="date" name="appointment_date" value="<?php echo $row['appointment_date']; ?>">
<br><br>

Appointment Time:<br>
<input type="time" name="appointment_time" value="<?php echo $row['appointment_time']; ?>">
<br><br>

Status:<br>
<select name="status">
    <option value="Pending">Pending</option>
    <option value="Approved">Approved</option>
    <option value="Completed">Completed</option>
    <option value="Cancelled">Cancelled</option>
</select>

<br><br>

<button type="submit">Update_appointment</button>

</form>

</body>
</html>