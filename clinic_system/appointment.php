<?php
include 'db.php';

/* =========================
   SAVE APPOINTMENT SECTION
========================= */
if(isset($_POST['book']))
{
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $reason = $_POST['reason'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $status = "Pending";

    $sql = "INSERT INTO appointments
    (patient_name, doctor_name, reason, appointment_date, appointment_time, status)
    VALUES
    ('$patient_name', '$doctor_name', '$reason', '$appointment_date', '$appointment_time', '$status')";

    if(mysqli_query($conn, $sql))
    {
        header("Location: appointment.php");
        exit();
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>

    <style>
        body{
            font-family: Arial;
            margin: 20px;
            background: #f4f6f9;
        }

        h1{
            color: #333;
        }

        input[type=text], input[type=date], input[type=time]{
            width: 300px;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        button{
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover{
            background: #0056b3;
        }

        .view-btn{
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
        }
    </style>
</head>

<body>

<h1>Book Appointment</h1>

<form method="POST">

    Patient Name:<br>
    <input type="text" name="patient_name" required><br>

    Doctor Name:<br>
    <input type="text" name="doctor_name" required><br>

    Reason:<br>
    <input type="text" name="reason" required><br>

    Appointment Date:<br>
    <input type="date" name="appointment_date" required><br>

    Appointment Time:<br>
    <input type="time" name="appointment_time" required><br><br>

    <button type="submit" name="book">Book Appointment</button>

</form>

<br><br>

<a href="view_appointments.php">
    <button type="button">View All Appointments</button>
</a>

</body>
</html>