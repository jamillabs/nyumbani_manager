<?php

include "auth.php";

/**
 * Allow only admin to modify data
 */
function requireAdmin() {
    requireLogin();

    if ($_SESSION['role'] !== 'admin') {
        die("🚫 Access Denied: Admin privileges required");
    }
}

/**
 * Allow only admin OR owner (optional use case)
 */
function requireOwnerOrAdmin($owner_id) {
    requireLogin();

    if ($_SESSION['role'] !== 'admin' && $_SESSION['user_id'] != $owner_id) {
        die("🚫 Access Denied");
    }
}
?>