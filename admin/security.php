<?php
session_start();
include('database/db.php');

if (!$conn) {
    die("Database connection failed. Please check your database configuration.");
}

if (!isset($_SESSION['username']) || !$_SESSION['username']) {
    header('Location: login.php');
    exit;
}
?>
