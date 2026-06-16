<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome <?php echo $_SESSION['full_name']; ?></h1>

<h2>Digital Appointment & Record System Dashboard</h2>

<p>Role: <?php echo $_SESSION['role']; ?></p>

<a href="logout.php">Logout</a>