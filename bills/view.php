<?php
session_start();
include "../config/db.php";

$result = $conn->query("
SELECT * FROM bills
ORDER BY due_date ASC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Bills</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:
linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
url('../assets/images/home-bg.jpg');
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
padding:20px;
border-radius:20px;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<div class="col-md-2 sidebar">

<h4>🏠 Nyumbani</h4>

<a href="../dashboard.php">📊 Dashboard</a>
<a href="../expenses/view_expenses.php">💸 Expenses</a>
<a href="../contributions/view.php">👨‍👩‍👧 Contributions</a>
<a href="view.php">📑 Bills</a>

<a href="../reports.php">📊 Reports</a>
<a href="../members.php">👥 Members</a>

<a href="../auth/logout.php">🚪 Logout</a>

</div>

<div class="col-md-10 p-4">

<h2>📑 Bills</h2>
<div class="mb-3">

    <a href="add.php"
   class="btn btn-outline-info shadow-sm px-4 py-2">

   + Add Bill
</a>

</div>

<div class="glass-card">

<table class="table table-dark table-hover">

<tr>
<th>Bill</th>
<th>Amount</th>
<th>Due Date</th>
<th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
<td><?= $row['bill_name'] ?></td>
<td><?= number_format($row['amount']) ?> Tsh</td>
<td><?= $row['due_date'] ?></td>
<td><?= ucfirst($row['status']) ?></td>
</tr>

<?php } ?>

</table>

</div>

</div>
</div>
</div>

</body>
</html>