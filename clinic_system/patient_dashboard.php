<?php
session_start();

if(!isset($_SESSION['user_id']) ||
   $_SESSION['role'] != 'patient')
{
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Patient Dashboard</title>

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
    color:brow;
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
    margin-top:0;
}

</style>

</head>

<body>

<div class="sidebar">

    <h2>PATIENT PANEL</h2>

    <a href="patient_dashboard.php">🏠 Dashboard</a>
<a href="view_appointments.php">📅 My Appointments</a>
<a href="view_medical_records.php">🩺 My Records</a>
<a href="logout.php">🚪 Logout</a>
</div>

<div class="main">

    <h1>Welcome <?php echo $_SESSION['full_name']; ?></h1>

    <div class="cards">

        <div class="card">
            <h3>Appointments</h3>
            <p>View your appointments</p>
        </div>

        <div class="card">
            <h3>Medical Records</h3>
            <p>View your health records</p>
        </div>

        <div class="card">
            <h3>Profile</h3>
            <p>Manage your profile</p>
        </div>

    </div>

</div>

</body>
</html>