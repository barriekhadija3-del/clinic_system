<?php
include 'db.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    mysqli_query($conn,
    "DELETE FROM medical_records WHERE record_id='$id'");
}

header("Location: medical_records.php");
exit();
?>