<?php
session_start();
include "includes/auth.php";
requireLogin();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

// Data
$total_expenses = $conn->query("SELECT SUM(amount) as total FROM expenses")->fetch_assoc()['total'] ?? 0;
$total_contributions = $conn->query("SELECT SUM(amount) as total FROM contributions")->fetch_assoc()['total'] ?? 0;
$balance = $total_contributions - $total_expenses;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Nyumbani Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            padding:0;

            background:
            linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
            url('assets/images/home-bg.jpg');

            background-size:cover;
            background-position:center;
            min-height:100vh;
            color:white;
        }

        .sidebar{
            background:rgba(0,0,0,0.4);
            backdrop-filter:blur(10px);
            height:100vh;
            padding:20px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            margin:15px 0;
            font-size:16px;
        }

        .sidebar a:hover{
            color:#00d4ff;
        }

        .glass-card{
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(15px);
            border-radius:18px;
            padding:20px;
            box-shadow:0 8px 30px rgba(0,0,0,0.3);
        }

        .topbar{
            padding:20px;
        }

        .title{
            font-size:26px;
            font-weight:bold;
        }
    </style>
</head>

<body>

<div class="container-fluid">
<div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 sidebar">

        <h4>🏠 Nyumbani</h4>

        <a href="dashboard.php">📊 Dashboard</a>
        <a href="expenses/view_expenses.php">💸 Expenses</a>
        <a href="contributions/view.php">👨‍👩‍👧 Contributions</a>
        <a href="bills/view.php">📑 Bills</a>

        <a href="reports.php">📊 Reports</a>
        <a href="members.php">👥 Members</a>

        <a href="auth/logout.php">🚪 Logout</a>

    </div>

    <!-- MAIN CONTENT -->
    <div class="col-md-10 p-4">

        <div class="topbar">
            <div class="title">
                Welcome, <?= $_SESSION['name'] ?> 👋
            </div>
            <small>Family Finance Overview</small>
        </div>

        <div class="row mt-4">

            <div class="col-md-4">
                <div class="glass-card text-center">
                    <h5>💸 Expenses</h5>
                    <h3><?= number_format($total_expenses) ?> Tsh</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card text-center">
                    <h5>💰 Contributions</h5>
                    <h3><?= number_format($total_contributions) ?> Tsh</h3>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card text-center">
                    <h5>📊 Balance</h5>
                    <h3><?= number_format($balance) ?> Tsh</h3>
                </div>
            </div>

        </div>

        <div class="glass-card mt-4">
            <h5>📈 Quick Insight</h5>
            <p>
                This is your family financial summary dashboard.
                Track expenses, contributions, and balance in real time.
            </p>
        </div>

    </div>

</div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>