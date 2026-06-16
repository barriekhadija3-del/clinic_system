<?php
include 'db.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM appointments WHERE appointment_id='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location: view_appointment.php");
        exit();
    }
    else
    {
        echo "Error deleting: " . mysqli_error($conn);
    }
}
else
{
    echo "No ID received";
}
?>