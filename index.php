<!DOCTYPE html>

<html>
<head>
    <title>Nyumbani Manager</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
        body {
            margin: 0;
            padding: 0;

            background: linear-gradient(
                rgba(0,0,0,0.5),
                rgba(0,0,0,0.5)
            ),
            url('assets/images/home-bg.jpeg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-box {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);

            padding: 50px;
            border-radius: 20px;

            text-align: center;
            color: white;

            width: 800px;
        }
        .mt-4 {
            font-family: 'Great Vibes', cursive;
        }
        .display-4 {
            font-family: 'Kaushan Script', cursive;
        }

        .btn-custom {
            padding: 12px 30px;
            border-radius: 12px;
        }
        .lead {
            font-family: 'Dancing Script', cursive;
        }
    </style>
</head>
<body>

<div class="hero-box shadow-lg">

    <h1 class="display-4" >🏠 Nyumbani Manager</h1>

    <p class="lead">
        Manage your family expenses & contributions easily.
    </p>

    <div class="mt-4">
        <a href="auth/login.php" class="btn btn-primary btn-custom">
            Login
        </a>

        <a href="auth/register.php" class="btn btn-outline-light btn-custom">
            Register
        </a>
    </div>

</div>

</body>

</html>