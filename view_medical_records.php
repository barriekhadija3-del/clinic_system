<?php
include 'db.php';

$result = mysqli_query($conn,"SELECT * FROM medical_records");
?>

<h1>Medical Records</h1>

<table border="1">

<tr>
<th>ID</th>
<th>Patient</th>
<th>Doctor</th>
<th>Diagnosis</th>
<th>Treatment</th>
<th>Prescription</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['record_id']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['doctor_name']; ?></td>
<td><?php echo $row['diagnosis']; ?></td>
<td><?php echo $row['treatment']; ?></td>
<td><?php echo $row['prescription']; ?></td>
</tr>

<?php } ?>

</table>