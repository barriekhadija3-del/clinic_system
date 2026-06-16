<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,
"SELECT * FROM appointments ORDER BY appointment_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Appointments</title>

    <style>
        body{
            font-family: Arial;
            margin: 0;
            background: #f2f6ff;
        }

        .sidebar{
            width: 250px;
            height: 100vh;
            background: #1e3a8a;
            position: fixed;
            padding-top: 20px;
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

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        th,td{
            border:1px solid #ccc;
            padding:10px;
        }

        th{
            background:#eee;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2 style="color:white;text-align:center;">CLINIC SYSTEM</h2>

    <a href="admin_dashboard.php">Dashboard</a>
    <a href="admin_appointments.php">Appointments</a>
    <a href="patients.php">Patients</a>
    <a href="medical_records.php">Medical Records</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">

<h1>Appointments Management</h1>

<table>
<tr>
    <th>ID</th>
    <th>Patient Name</th>
    <th>Doctor Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Reason</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['appointment_id']; ?></td>
    <td><?php echo $row['patient_name']; ?></td>
    <td><?php echo $row['doctor_name']; ?></td>
    <td><?php echo $row['appointment_date']; ?></td>
    <td><?php echo $row['appointment_time']; ?></td>
    <td><?php echo $row['reason']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>