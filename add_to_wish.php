<?php
session_start();
require("info.php");

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user'][0];
    $stmt = $connection->prepare("SELECT wishlist FROM registers WHERE id = ?");
    $stmt->execute([$userId]);
    $cartData = $stmt->fetchColumn();

    if ($cartData !== false) {
        $_SESSION['user']['wish'] = unserialize($cartData);
    } else {
        $_SESSION['user']['wish'] = array();
    }
}

if (isset($_POST['product_id'])) {
    if (isset($_SESSION['user'])) {
       
        $productId = $_POST['product_id'];

        if (!isset($_SESSION['user']['wish'])) {
            $_SESSION['user']['wish'] = array();
        }

        $_SESSION['user']['wish'][] = $productId;

        $userId = $_SESSION['user'][0];
        $cartData = serialize($_SESSION['user']['wish']);

        $stmt = $connection->prepare("UPDATE registers SET wishlist = ? WHERE id = ?");
        $stmt->execute([$cartData, $userId]);

        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo '<script>alert("You cannot add items to your wishlist! Login first!");</script>';
        echo '<script>window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
        exit();
    }
}
?>
