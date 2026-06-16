<?php

include 'db.php';

$id = $_POST['patient_id'];
$name = $_POST['full_name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$dob = $_POST['date_of_birth'];

$sql = "UPDATE patients SET
full_name='$name',
gender='$gender',
phone='$phone',
date_of_birth='$dob'
WHERE patient_id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: patient.php");
    exit();
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>