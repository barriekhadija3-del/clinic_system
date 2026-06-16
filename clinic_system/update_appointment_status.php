<?php
include 'db.php';

if(!isset($_GET['id']))
{
    die("No appointment selected");
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM appointments WHERE appointment_id='$id'");

$row = mysqli_fetch_assoc($result);
?>

<h2>Update Appointment Status</h2>

<form method="POST" action="save_appointment_status.php">

<input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">

<p>Patient: <?php echo $row['patient_name']; ?></p>
<p>Date: <?php echo $row['appointment_date']; ?></p>
<p>Time: <?php echo $row['appointment_time']; ?></p>
<p>Reason: <?php echo $row['reason']; ?></p>

Status:
<select name="status" required>
    <option value="Pending">Pending</option>
    <option value="Approved">Approved</option>
    <option value="Completed">Completed</option>
</select>

<br><br>

<button type="submit">Update Status</button>

</form>