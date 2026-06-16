<?php
session_start();
include "config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

$users = $conn->query("SELECT id, name, email, phone, role FROM users");
?>

<!DOCTYPE html>
<html>
<head>
<title>Members - Nyumbani Manager</title>

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

<h2>👥 Family Members</h2>

<div class="glass-card">

<table class="table table-dark table-hover">

<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
</tr>

<?php while($u = $users->fetch_assoc()) { ?>
<tr>
<td><?= $u['name'] ?></td>
<td><?= $u['email'] ?></td>
<td><?= $u['phone'] ?></td>
<td>
<?php if($u['role'] == 'admin') { ?>
<span class="badge bg-danger">Admin</span>
<?php } else { ?>
<span class="badge bg-primary">Member</span>
<?php } ?>
</td>
</tr>
<?php } ?>

</table>

</div>

</div>
</div>
</div>

</body>
</html>