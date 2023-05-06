<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = 1;
    
    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // If it is, add the new quantity to the existing quantity
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        // If it isn't, add the product to the cart with the specified quantity
        $_SESSION['cart'][$product_id] = $quantity;
    }
    
    // Redirect back to the previous page
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    echo "Error: Product ID or quantity not specified.";
}

?>