<?php
include "../config/db.php";

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $role = "member";

    $stmt = $conn->prepare("
        INSERT INTO users
        (name,email,phone,password,role)
        VALUES (?,?,?,?,?)
    ");

    $stmt->bind_param(
        "sssss",
        $name,
        $email,
        $phone,
        $password,
        $role
    );

    if($stmt->execute()){
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Nyumbani Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            padding:0;

            background:
            linear-gradient(
            rgba(0,0,0,0.55),
            rgba(0,0,0,0.55)),
            url('../assets/images/HOME-555.jpg');

            background-size:cover;
            background-position:center;
            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        .glass-card{
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(15px);

            border-radius:20px;
            padding:40px;
            width:450px;

            color:white;
            box-shadow:0 8px 30px rgba(0,0,0,0.3);
        }

        input{
            border-radius:12px !important;
        }

        .btn-register{
            border-radius:12px;
            padding:12px;
        }
    </style>
</head>

<body>

<div class="glass-card">

<h2 class="text-center mb-4">
📝 Register
</h2>

<form method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text"
name="name"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email"
name="email"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text"
name="phone"
class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password"
name="password"
class="form-control"
required>
</div>

<button
type="submit"
name="register"
class="btn btn-success w-100 btn-register mb-3">

Register
</button>

<div class="text-center">

<p class="mb-2 text-light">
Already have an account?
</p>

<a href="login.php"
class="btn btn-outline-light w-100">

Login
</a>

</div>

</form>

</div>

</body>
</html>