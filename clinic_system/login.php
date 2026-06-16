<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['full_name'] = $user['full_name'];
    $row['full_name'];
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 'admin')
{
    header("Location: admin_dashboard.php");
}
elseif($user['role'] == 'doctor')
{
    header("Location: doctor_dashboard.php");
}
elseif($user['role'] == 'patient')
{
    header("Location: patient_dashboard.php");
}

exit();
}
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Clinic System Login</title>
</head>
<body>

<h1>Digital Appointment & Record System</h1>
<h3>Local Clinics in Eswatini</h3>

<form method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>

</form>

</body>
</html>