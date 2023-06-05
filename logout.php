<?php
session_start();
require("info.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}

// Save cart in cookies before unsetting the session
if (isset($_SESSION['user']['cart'])) {
    $cartData = serialize($_SESSION['user']['cart']);
    setcookie('cart', $cartData, time() + 604800);
}

if (isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $stmt = $connection->prepare("UPDATE registers SET token = NULL WHERE token = ?");
    $stmt->execute([$token]);
}

// Clear cart cookie after logout
setcookie('cart', '', time() - 1);

unset($_SESSION['user']);

session_regenerate_id();



exit();
?>
