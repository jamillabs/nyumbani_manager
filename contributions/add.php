<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if (isset($_POST['add'])) {

    $user_id = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $purpose = $_POST['purpose'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("
        INSERT INTO contributions (user_id, amount, purpose, date)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param("idss", $user_id, $amount, $purpose, $date);
    $stmt->execute();

    header("Location: view.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Contribution</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
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
    min-height:100vh;
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
    padding:30px;
}

.form-control{
    border-radius:12px;
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
    <a href="view.php">👨‍👩‍👧 Contributions</a>
    <a href="../bills/view.php">📑 Bills</a>

    <a href="../reports.php">📊 Reports</a>
        <a href="../members.php">👥 Members</a>
        
    <a href="../auth/logout.php">🚪 Logout</a>
</div>

<div class="col-md-10 p-5">

<h2>👨‍👩‍👧 Add Contribution</h2>

<div class="glass-card col-md-7">

<form method="POST">

<div class="mb-3">
<label>Amount</label>
<input type="number" name="amount" class="form-control" required>
</div>

<div class="mb-3">
<label>Purpose</label>
<input type="text" name="purpose" class="form-control" required>
</div>

<div class="mb-3">
<label>Date</label>
<input type="date" name="date" class="form-control" required>
</div>

<button name="add" class="btn btn-success w-100">
Save Contribution
</button>

</form>

</div>

</div>
</div>
</div>

</body>
</html>