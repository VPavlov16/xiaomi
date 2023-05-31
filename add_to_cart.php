<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "xiaomi";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
}

if (isset($_SESSION['user']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['user'][0];

    if (!isset($_SESSION['user']['cart'])) {
        $_SESSION['user']['cart'] = array();
    }
    $_SESSION['user']['cart'][] = $productId;

    // Serialize the cart data into JSON
    $serializedCart = json_encode($_SESSION['user']['cart']);

    // Update the cart data in the database for the logged-in user
    $stmt = $connection->prepare("UPDATE registers SET cart = ? WHERE id = ?");
    $stmt->execute([$serializedCart, $userId]);

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} elseif (!isset($_SESSION['user']) && isset($_POST['product_id'])) {
    echo '<script>alert("You cannot add items to the cart! Register first!");</script>';
    echo '<script>window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
    exit();
}
?>