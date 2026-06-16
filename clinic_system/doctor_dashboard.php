<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']) ||
   $_SESSION['role'] != 'doctor')
{
    header("Location: login.php");
    exit();
}

/* CURRENT DOCTOR */
$doctor_name = $_SESSION['full_name'];

/* DOCTOR APPOINTMENTS ONLY */
$appointments = mysqli_query($conn,
"SELECT * FROM appointments 
WHERE doctor_name='$doctor_name'
ORDER BY appointment_id DESC");

/* COUNTERS (LIKE ADMIN STYLE) */
$total_appointments = mysqli_num_rows($appointments);
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Dashboard</title>

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#F8FAFC;
}

.sidebar{
    width:250px;
    height:100vh;
    background:#0F172A;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h2{
    color:black;
    text-align:center;
    padding:20px 0;
}

.sidebar a{
    display:block;
    color:#e5e7eb;
    padding:15px;
    text-decoration:none;
}

.sidebar a:hover{
    background:#2563EB;
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
    width:250px;
    padding:20px;
    border-radius:15px;
    box-shadow:0 0 4px 12px rgba(0,0,0,0.1);
}

.card h3{
    margin-top:0;
}

.btn{
    display:inline-block;
    margin-top:10px;
    padding:10px 15px;
    background:#2563EB;
    color:white;
    text-decoration:none;
    border-radius:8px;
}

.btn:hover{
    background:#1D4ED8;
}

</style>

</head>

<body>

<div class="sidebar">

    <h2>DOCTOR PANEL</h2>

    <a href="doctor_dashboard.php">🏠 Dashboard</a>
<a href="appointment.php">📅 My Appointments</a>
<a href="view_medical_records.php">🩺 Medical Records</a>
<a href="logout.php">🚪 Logout</a>
</div>

<div class="main">

    <h1>Welcome Dr. <?php echo $_SESSION['full_name']; ?></h1>

    <div class="cards">

        <div class="card">
            <h3>Patients List</h3>
            <p>View and manage patients.</p>

            <a class="btn" href="patients.php">
                Open Patients
            </a>
        </div>

        <div class="card">
            <h3>Appointments</h3>
            <p>View all appointments.</p>

            <a class="btn" href="appointment.php">
                Open Appointments
            </a>
        </div>

        <div class="card">
            <h3>Medical Records</h3>
            <p>Manage patient records.</p>

            <a class="btn" href="medical_records.php">
                Open Records
            </a>
        </div>

    </div>

</div>

</body>
</html>