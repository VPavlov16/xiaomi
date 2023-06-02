<?php
session_start();

if (isset($_SESSION['user']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    if (!isset($_SESSION['user']['cart'])) {
        $_SESSION['user']['cart'] = array();
    }

    $_SESSION['user']['cart'][] = $productId;

    // Store cart data in a cookie
    setcookie('cart_' . $_SESSION['user']['id'], serialize($_SESSION['user']['cart']), time() + 604800, '/'); // 86400 seconds = 1 day

    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
} elseif (!isset($_SESSION['user']) && isset($_POST['product_id'])) {
    echo '<script>alert("You cannot add items to the cart! Register first!");</script>';
    echo '<script>window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    exit();
}
?>
