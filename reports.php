<?php
session_start();

include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

// Total calculations
$expenses = $conn->query("SELECT SUM(amount) as total FROM expenses")->fetch_assoc()['total'] ?? 0;
$contributions = $conn->query("SELECT SUM(amount) as total FROM contributions")->fetch_assoc()['total'] ?? 0;

$balance = $contributions - $expenses;

// Category breakdown
$category = $conn->query("
SELECT category, SUM(amount) as total
FROM expenses
GROUP BY category
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Reports - Nyumbani Manager</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:
    linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
    url('assets/images/home-bg.jpg');
    background-size:cover;
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
    margin:15px 0;
    text-decoration:none;
}

.glass-card{
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(15px);
    border-radius:20px;
    padding:20px;
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

<!-- CONTENT -->
<div class="col-md-10 p-4">

<h2>📊 Financial Reports</h2>

<div class="row mt-4">

<div class="col-md-4">
<div class="glass-card text-center">
<h5>💸 Expenses</h5>
<h3><?= number_format($expenses) ?> Tsh</h3>
</div>
</div>

<div class="col-md-4">
<div class="glass-card text-center">
<h5>💰 Contributions</h5>
<h3><?= number_format($contributions) ?> Tsh</h3>
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

<h5>📂 Expenses by Category</h5>

<table class="table table-dark mt-3">

<tr>
<th>Category</th>
<th>Total</th>
</tr>

<?php while($row = $category->fetch_assoc()) { ?>
<tr>
<td><?= $row['category'] ?></td>
<td><?= number_format($row['total']) ?> Tsh</td>
</tr>
<?php } ?>

</table>

</div>

</div>
</div>
</div>

</body>
</html>