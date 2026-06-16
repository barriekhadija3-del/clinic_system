<?php
include 'db.php';

if(!isset($_GET['id']))
{
    die("No record selected");
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM medical_records WHERE record_id='$id'");

$row = mysqli_fetch_assoc($result);
?>

<h2>Edit Medical Record</h2>

<form method="POST" action="update_medical_record.php">

<input type="hidden" name="record_id" value="<?php echo $row['record_id']; ?>">

Patient Name:<br>
<input type="text" name="patient_name" value="<?php echo $row['patient_name']; ?>" readonly>
<br><br>

Doctor Name:<br>
<input type="text" name="doctor_name" value="<?php echo $row['doctor_name']; ?>">
<br><br>

Appointment ID:<br>
<input type="text" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
<br><br>

Diagnosis:<br>
<input type="text" name="diagnosis" value="<?php echo $row['diagnosis']; ?>">
<br><br>

Treatment:<br>
<input type="text" name="treatment" value="<?php echo $row['treatment']; ?>">
<br><br>

Prescription:<br>
<input type="text" name="prescription" value="<?php echo $row['prescription']; ?>">
<br><br>

Record Date:<br>
<input type="date" name="record_date" value="<?php echo $row['record_date']; ?>">
<br><br>

<button type="submit">Update Record</button>

</form>