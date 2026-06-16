<?php
include 'db.php';

if(isset($_POST['save']))
{
    $name = $_POST['full_name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['date_of_birth'];

    $sql = "INSERT INTO patients
    (full_name, gender, phone, address, date_of_birth)
    VALUES
    ('$name','$gender','$phone','$address','$dob')";

    if(mysqli_query($conn,$sql))
    {
        header("Location: patient.php");
        exit();
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Patient</title>
</head>

<body>

<h2>Add New Patient</h2>

<form method="POST">

Full Name:<br>
<input type="text" name="full_name" required>
<br><br>

Gender:<br>
<select name="gender" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<br><br>

Phone:<br>
<input type="text" name="phone" required>
<br><br>

Address:<br>
<input type="text" name="address" required>
<br><br>

Date of Birth:<br>
<input type="date" name="date_of_birth" required>
<br><br>

<button type="submit" name="save">
Save Patient
</button>

</form>

</body>
</html>