<!DOCTYPE html>
<html>
<head>
<title>Digital Clinic System</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(to right,#e3f2fd,#f8fffe);
    margin:0;
    padding:0;
}

.container{
    width:500px;
    margin:80px auto;
    background:white;
    padding:40px;
    border-radius:15px;
    box-shadow:0px 0px 15px rgba(0,0,0,0.2);
    text-align:center;
}

h1{
    color:#0077b6;
    margin-bottom:10px;
}

p{
    color:#555;
    margin-bottom:30px;
}

.btn{
    display:block;
    width:80%;
    margin:15px auto;
    padding:15px;
    text-decoration:none;
    color:white;
    border-radius:8px;
    font-size:18px;
    font-weight:bold;
}

.admin{
    background:#e63946;
}

.admin:hover{
    background:#c1121f;
}

.doctor{
    background:#2a9d8f;
}

.doctor:hover{
    background:#1d7874;
}

.patient{
    background:#219ebc;
}

.patient:hover{
    background:#126782;
}

.logout{
    background:#6c757d;
}

.logout:hover{
    background:#495057;
}

.icon{
    font-size:60px;
    margin-bottom:15px;
}

</style>

</head>
<body>

<div class="container">

<div class="icon">
🏥
</div>

<h1>DIGITAL CLINIC SYSTEM</h1>

<p>
Digital Appointment and Medical Records Management System
</p>

<a class="btn admin" href="login.php?role=admin">
Admin Portal
</a>

<a class="btn doctor" href="login.php?role=doctor">
Doctor Portal
</a>

<a class="btn patient" href="login.php?role=patient">
Patient Portal
</a>

<a class="btn logout" href="logout.php">
Logout
</a>

</div>

</body>
</html>