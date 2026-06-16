<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /nyumbani-manager/auth/login.php");
        exit();
    }
}

function requireAdmin() {
    requireLogin();

    if ($_SESSION['role'] !== 'admin') {
        die("🚫 Access Denied: Admin only area");
    }
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
?>