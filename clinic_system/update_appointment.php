<?php

include 'db.php';

$id = $_POST['appointment_id'];
$patient_name = $_POST['patient_name'];
$reason = $_POST['reason'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$status = $_POST['status'];

$sql = "UPDATE appointments SET
patient_name='$patient_name',
reason='$reason',
appointment_date='$appointment_date',
appointment_time='$appointment_time',
status='$status'
WHERE appointment_id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: view_appointments.php");
    exit();
}
else
{
    echo "Error: " . mysqli_error($conn);
}
?>