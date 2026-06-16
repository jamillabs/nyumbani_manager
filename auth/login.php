<?php
session_start();
include "../config/db.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE email = ?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../dashboard.php");
            exit();

        } else {
            $error = "Wrong password!";
        }

    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Nyumbani Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            padding:0;

            background:
            linear-gradient(
            rgba(0,0,0,0.55),
            rgba(0,0,0,0.55)),
            url('../assets/images/home-bg2.png');

            background-size:cover;
            background-position:center;
            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;
        }

        .glass-card{
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(15px);
            border-radius:20px;
            padding:40px;
            width:400px;
            color:white;
            box-shadow:0 8px 30px rgba(0,0,0,0.3);
        }

        input{
            border-radius:12px !important;
        }

        .btn-login{
            border-radius:12px;
            padding:12px;
        }
    </style>
</head>

<body>

<div class="glass-card">

    <h2 class="text-center mb-4">
        🔐 Login
    </h2>

    <?php if(isset($error)) { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="mb-3">
            <label>Email</label>
            <input type="email"
                   name="email"
                   class="form-control"
                   required>
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
    name="login"
    class="btn btn-primary w-100 btn-login mb-3">

    Login
</button>

<div class="text-center">
    <p class="mb-2 text-light">
        Don't have an account?
    </p>

    <a href="register.php"
       class="btn btn-outline-light w-100">

       Create Account
    </a>
</div>

    </form>

</div>

</body>

</html>