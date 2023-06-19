<?php
session_start();
require("info.php");

if(!isset($_SESSION['user'])){
    echo '<script>alert("You cannot add items to the cart! Login first!");</script>';
    echo '<script>window.location.href = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
}else{
try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
}

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user'][0];
    $stmt = $connection->prepare("SELECT cart FROM registers WHERE id = ?");
    $stmt->execute([$userId]);
    $cartData = $stmt->fetchColumn();

    if ($cartData !== false) {
        $_SESSION['user']['cart'] = unserialize($cartData);
    } else {
        $_SESSION['user']['cart'] = array();
    }
}

if (isset($_POST['product_id'])) {
    if (isset($_SESSION['user'])) {
       
        $productId = $_POST['product_id'];

        if (!isset($_SESSION['user']['cart'])) {
            $_SESSION['user']['cart'] = array();
        }

        $_SESSION['user']['cart'][] = $productId;

        $userId = $_SESSION['user'][0];
        $cartData = serialize($_SESSION['user']['cart']);

        $stmt = $connection->prepare("UPDATE registers SET cart = ? WHERE id = ?");
        $stmt->execute([$cartData, $userId]);

        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } 
}
}
?>
