<?php
include "../includes/auth.php";
requireAdmin();

include "../config/db.php";

if (!isset($_GET['id'])) {
    header("Location: view.php");
    exit();
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM contributions WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: view.php");
exit();
?>