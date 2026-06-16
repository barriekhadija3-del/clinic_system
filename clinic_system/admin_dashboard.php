<?php
session_start();
include 'db.php';


if(!isset($_SESSION['user_id']) ||
 $_SESSION['role'] != 'admin')
{
    header("Location: login.php");
    exit();
}

$patient_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM patients"));
$appointment_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM appointments"));
$records_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM medical_records"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <style>

    body{
        margin:0;
        font-family:Arial, sans-serif;
        background:#f4f6f9;
    }

    .sidebar{
        width:250px;
        height:100vh;
        background:#1e3a8a;
        position:fixed;
        left:0;
        top:0;
    }

    .sidebar h2{
        color:white;
        text-align:center;
        padding:20px 0;
    }

    .sidebar a{
        display:block;
        color:white;
        padding:15px;
        text-decoration:none;
    }

    .sidebar a:hover{
        background:#3b82f6;
    }

    .main{
        margin-left:250px;
        padding:20px;
    }

    .cards{
        display:flex;
        gap:20px;
        flex-wrap:wrap;
    }

    .card{
        background:white;
        width:220px;
        padding:20px;
        border-radius:10px;
        box-shadow:0 0 10px rgba(0,0,0,0.1);
    }

    .card h3{
        margin:0;
    }

    .card h1{
        margin-top:15px;
    }

    .quick-links{
        margin-top:30px;
    }

    .quick-links a{
        display:inline-block;
        padding:10px 15px;
        background:#1e3a8a;
        color:white;
        text-decoration:none;
        margin-right:10px;
        border-radius:5px;
    }

    </style>

</head>

<body>

<div class="sidebar">

    <h2>CLINIC SYSTEM</h2>

    <a href="admin_dashboard.php">Dashboard</a>
    <a href="patient.php">Patients</a>
    <a href="appointment.php">Appointments</a>
    <a href="medical_records.php">Medical Records</a>
    <a href="view_appointments.php">View Appointments</a>
    <a href="view_medical_records.php">View Records</a>
    <a href="logout.php">Logout</a>

</div>

<div class="main">

    <h1>Welcome <?php echo $_SESSION['full_name']; ?></h1>

    <div class="cards">

        <div class="card">
            <h3>Total Patients</h3>
            <h1><?php echo $patient_count; ?></h1>
        </div>

        <div class="card">
    <h3>👥 Total Patients</h3>
    <h2><?php echo $patient_count; ?></h2>
</div>

<div class="card">
    <h3>📅 Appointments</h3>
    <h2><?php echo $appointment_count; ?></h2>
</div>

<div class="card">
    <h3>🩺 Medical Records</h3>
    <h2><?php echo $records_count; ?></h2>
</div>

    <div class="quick-links">

        <h2>Quick Actions</h2>

        <a href="admin_dashboard.php">🏠 Dashboard</a>
<a href="admin_patients.php">👥 Patients</a>
<a href="admin_appointments.php">📅 Appointments</a>
<a href="medical_records.php">🩺 Medical Records</a>
<a href="logout.php">🚪 Logout</a>
    </div>

</div>

</body>
</html>