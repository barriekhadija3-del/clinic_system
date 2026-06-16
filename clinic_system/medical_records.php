<?php
include 'db.php';

$patients = mysqli_query($conn, "SELECT * FROM patients");

$records = mysqli_query($conn,
"SELECT * FROM medical_records ORDER BY record_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Medical Records</title>
</head>

<body>

<h1>Medical Records</h1>

<h3>Add New Record</h3>

<form method="POST" action="add_medical_record.php">

Patient:
<select name="patient_id" required>
<option value="">Select Patient</option>

<?php while($p = mysqli_fetch_assoc($patients)) { ?>
<option value="<?php echo $p['patient_id']; ?>">
<?php echo $p['full_name']; ?>
</option>
<?php } ?>

</select>
<br><br>

Doctor Name:
<input type="text" name="doctor_name" required>
<br><br>

Appointment ID:
<input type="number" name="appointment_id">
<br><br>

Diagnosis:
<input type="text" name="diagnosis">
<br><br>

Treatment:
<input type="text" name="treatment">
<br><br>

Prescription:
<input type="text" name="prescription">
<br><br>

Record Date:
<input type="date" name="record_date">
<br><br>

<button type="submit" name="save">
Save Record
</button>

</form>

<hr>

<h2>All Medical Records</h2>

<table border="1" width="100%">
<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Appointment</th>
<th>Diagnosis</th>
<th>Treatment</th>
<th>Prescription</th>
<th>Date</th>
</tr>

<?php while($r = mysqli_fetch_assoc($records)) { ?>

<tr>
<td><?php echo $r['record_id']; ?></td>
<td><?php echo $r['patient_name']; ?></td>
<td><?php echo $r['doctor_name']; ?></td>
<td><?php echo $r['appointment_id']; ?></td>
<td><?php echo $r['diagnosis']; ?></td>
<td><?php echo $r['treatment']; ?></td>
<td><?php echo $r['prescription']; ?></td>
<td><?php echo $r['record_date']; ?></td>

<td>
<a href="edit_medical_record.php?id=<?php echo $r['record_id']; ?>">Edit</a> |
<a href="delete_medical_record.php?id=<?php echo $r['record_id']; ?>" onclick="return confirm('Delete this record?')">Delete</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>