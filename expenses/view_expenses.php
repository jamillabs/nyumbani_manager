<?php
session_start();
include "../includes/auth.php";
requireLogin();

include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$result = $conn->query("
SELECT expenses.*, users.name
FROM expenses
JOIN users ON expenses.paid_by = users.id
ORDER BY date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Expenses - Nyumbani Manager</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:
    linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
    url('../assets/images/home-bg.jpg');
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

<div class="col-md-2 sidebar">
    <h4>🏠 Nyumbani</h4>

    <a href="../dashboard.php">📊 Dashboard</a>
    <a href="view_expenses.php">💸 Expenses</a>
    <a href="../contributions/view.php">👨‍👩‍👧 Contributions</a>
    <a href="../bills/view.php">📑 Bills</a>

    <a href="../reports.php">📊 Reports</a>
        <a href="../members.php">👥 Members</a>
        
    <a href="../auth/logout.php">🚪 Logout</a>
</div>

<div class="col-md-10 p-4">

<h2>💸 Expenses</h2>

<a href="add_expense.php" class="btn btn-primary mb-3">
+ Add Expense
</a>





<div class="glass-card">
    

<table class="table table-dark table-hover">

<tr>
<th>Title</th>
<th>Amount</th>
<th>Category</th>
<th>Paid By</th>
<th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
<td><?= $row['title'] ?></td>
<td><?= number_format($row['amount']) ?> Tsh</td>
<td><?= $row['category'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['date'] ?></td>
</tr>

<?php } ?>

</table>

</div>

</div>
</div>
</div>

</body>
</html>