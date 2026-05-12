<?php
session_start();

$referer = $_SERVER['HTTP_REFERER'] ?? '';

// Order placement → go to market so the flash banner shows there
if (strpos($referer, 'buyNow') !== false) {
    header('Location: ../market.php');
} else {
    header('Location: ../home.php');
}
exit;
