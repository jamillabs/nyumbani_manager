<?php
include "../includes/auth.php";
requireAdmin();

include "../config/db.php";

if (!isset($_GET['id'])) {
    header("Location: view_expenses.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM expenses WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: view_expenses.php");
exit();
?>