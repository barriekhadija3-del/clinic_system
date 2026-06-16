<?php
include 'db.php';

if(!isset($_GET['id']))
{
die("No patient selected");
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM patients
WHERE patient_id='$id'");

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Patient</title>
</head>

<body>

<h2>Edit Patient</h2>

<form method="POST" action="update_patient.php">

<input type="hidden"
name="patient_id"
value="<?php echo $row['patient_id']; ?>">

Full Name:<br>
<input type="text"
name="full_name"
value="<?php echo $row['full_name']; ?>">
<br><br>

Gender:<br>
<input type="text"
name="gender"
value="<?php echo $row['gender']; ?>">
<br><br>

Phone:<br>
<input type="text"
name="phone"
value="<?php echo $row['phone']; ?>">
<br><br>

Date of Birth:<br>
<input type="date"
name="date_of_birth"
value="<?php echo $row['date_of_birth']; ?>">
<br><br>

<button type="submit">
Update Patient
</button>

</form>

</body>
</html>