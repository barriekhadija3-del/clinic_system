<?php
include 'db.php';

$id = $_POST['record_id'];
$doctor = $_POST['doctor_name'];
$appointment = $_POST['appointment_id'];
$diagnosis = $_POST['diagnosis'];
$treatment = $_POST['treatment'];
$prescription = $_POST['prescription'];
$date = $_POST['record_date'];

$sql = "UPDATE medical_records SET
doctor_name='$doctor',
appointment_id='$appointment',
diagnosis='$diagnosis',
treatment='$treatment',
prescription='$prescription',
record_date='$date'
WHERE record_id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: medical_records.php");
    exit();
}
else
{
    echo "Error: " . mysqli_error($conn);
}
?>