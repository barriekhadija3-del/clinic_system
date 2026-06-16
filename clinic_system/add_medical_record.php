<?php
include 'db.php';

if(isset($_POST['save']))
{
    $patient_id = $_POST['patient_id'];
    $doctor = $_POST['doctor_name'];
    $appointment = $_POST['appointment_id'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];
    $prescription = $_POST['prescription'];
    $date = $_POST['record_date'];

    // STEP 1: GET patient name safely
    $patient_name = "";

    $result = mysqli_query($conn,
    "SELECT full_name FROM patients WHERE patient_id='$patient_id'");

    if($result && mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $patient_name = $row['full_name'];
    }
    else
    {
        die("Error: Patient not found");
    }

    // STEP 2: INSERT RECORD
    $sql = "INSERT INTO medical_records
    (patient_id, patient_name, doctor_name, appointment_id, diagnosis, treatment, prescription, record_date)
    VALUES
    ('$patient_id','$patient_name','$doctor','$appointment','$diagnosis','$treatment','$prescription','$date')";

    if(mysqli_query($conn,$sql))
    {
        header("Location: medical_records.php");
        exit();
    }
    else
    {
        die("Insert Error: " . mysqli_error($conn));
    }
}
?>