<?php
session_start();
require("info.php");
    $productId = $_POST['remove'];

    if (!empty($_SESSION['user']['wishlist'])) {
        if (($key = array_search($productId, $_SESSION['user']['wishlist'])) !== false) {
            unset($_SESSION['user']['wishlist'][$key]);
        }

        $userId = $_SESSION['user'][0];
        $cartData = serialize($_SESSION['user']['wishlist']);

        try {
            $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $connection->prepare("UPDATE registers SET wishlist = ? WHERE id = ?");
            $stmt->execute([$cartData, $userId]);

            header("Location: wishlist.php");
            exit();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>