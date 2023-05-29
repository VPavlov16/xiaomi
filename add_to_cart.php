<?php
session_start();

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Add the product ID to the user's shopping cart in the session
    if (!isset($_SESSION['user']['cart'])) {
        $_SESSION['user']['cart'] = array(); // Create an empty cart array if it doesn't exist
    }
    $_SESSION['user']['cart'][] = $productId;

    // Redirect back to the page where the product was added to the cart
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
