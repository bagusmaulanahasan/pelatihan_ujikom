<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['status']) || $_SESSION['status'] !== true) {
    $login_url = isset($login_url) ? $login_url : 'login.php';
    header('location:' . $login_url);
    exit;
}
