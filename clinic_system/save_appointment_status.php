<?php
include 'db.php';

$id = $_POST['appointment_id'];
$status = $_POST['status'];

$sql = "UPDATE appointments SET status='$status'
WHERE appointment_id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: admin_appointments.php");
}
else
{
    echo "Error updating status: " . mysqli_error($conn);
}
?>