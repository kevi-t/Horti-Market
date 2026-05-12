<?php
session_start();

if (empty($_SESSION['message'])) {
    $_SESSION['message'] = 'Something went wrong. Please try again.';
}

$referer = $_SERVER['HTTP_REFERER'] ?? '';

// Route back to the page that triggered the error
if (strpos($referer, 'signuppage') !== false || strpos($referer, 'signUp') !== false) {
    $redirect = '../signuppage.php';
} elseif (strpos($referer, 'uploadProduct') !== false) {
    $redirect = '../products/uploadProduct.php';
} elseif (strpos($referer, 'buyNow') !== false) {
    $redirect = $referer;
} elseif (strpos($referer, 'updateProfile') !== false) {
    $redirect = $referer;
} elseif (strpos($referer, 'loginpage') !== false || strpos($referer, 'login') !== false) {
    $redirect = '../loginpage.php';
} else {
    $redirect = '../loginpage.php';
}

header('Location: ' . $redirect);
exit;
