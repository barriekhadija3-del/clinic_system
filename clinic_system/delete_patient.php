<?php

include 'db.php';

if(isset($_GET['id']))
{
$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM patients
WHERE patient_id='$id'");
}

header("Location: patients.php");
exit();

?>