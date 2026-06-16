<?php
session_start();
include "../includes/auth.php";
requireAdmin();

include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

if (isset($_POST['add'])) {

    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $paid_by = $_SESSION['user_id'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("
        INSERT INTO expenses
        (title, amount, category, paid_by, date)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "sdsis",
        $title,
        $amount,
        $category,
        $paid_by,
        $date
    );

    $stmt->execute();

    header("Location: view_expenses.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Expense - Nyumbani Manager</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    padding:0;

    background:
    linear-gradient(
    rgba(0,0,0,0.6),
    rgba(0,0,0,0.6)),
    url('../assets/images/home-bg.jpg');

    background-size:cover;
    background-position:center;
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
    border-radius:20px;
    padding:30px;
    box-shadow:0 8px 30px rgba(0,0,0,0.3);
}

.form-control,
.form-select{
    border-radius:12px;
}

.btn-save{
    border-radius:12px;
    padding:12px;
}
</style>
</head>

<body>

<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<div class="col-md-2 sidebar">

    <h4>🏠 Nyumbani</h4>

    <a href="../dashboard.php">
        📊 Dashboard
    </a>

    <a href="view_expenses.php">
        💸 Expenses
    </a>

    <a href="../contributions/view.php">
        👨‍👩‍👧 Contributions
    </a>

    <a href="../bills/view.php">
        📑 Bills
    </a>


    <a href="../reports.php">📊 Reports</a>
        <a href="../members.php">👥 Members</a>


    <a href="../auth/logout.php">
        🚪 Logout
    </a>

</div>

<!-- MAIN CONTENT -->
<div class="col-md-10 p-5">

    <h2 class="mb-4">
        💸 Add Expense
    </h2>

    <div class="glass-card col-md-7">

        <form method="POST">

            <div class="mb-3">
                <label>Expense Title</label>

                <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Example: Grocery Shopping"
                required>
            </div>

            <div class="mb-3">
                <label>Amount (Tsh)</label>

                <input
                type="number"
                name="amount"
                class="form-control"
                placeholder="Enter amount"
                required>
            </div>

            <div class="mb-3">
                <label>Category</label>

                <select
                name="category"
                class="form-select"
                required>

                    <option value="">
                        Select Category
                    </option>

                    <option>Food</option>
                    <option>Rent</option>
                    <option>Electricity</option>
                    <option>Water</option>
                    <option>Internet</option>
                    <option>Transport</option>
                    <option>Emergency</option>
                    <option>School Fees</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Date</label>

                <input
                type="date"
                name="date"
                class="form-control"
                required>
            </div>

            <button
            type="submit"
            name="add"
            class="btn btn-primary w-100 btn-save">

                Save Expense
            </button>

        </form>

    </div>

</div>

</div>
</div>

</body>
</html>