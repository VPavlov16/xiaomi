<?php
session_start();
require("info.php");
    $productId = $_POST['remove'];

    if (!empty($_SESSION['user']['cart'])) {
        if (($key = array_search($productId, $_SESSION['user']['cart'])) !== false) {
            unset($_SESSION['user']['cart'][$key]);
        }

        $userId = $_SESSION['user'][0];
        $cartData = serialize($_SESSION['user']['cart']);

        try {
            $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $connection->prepare("UPDATE registers SET cart = ? WHERE id = ?");
            $stmt->execute([$cartData, $userId]);

            header("Location: cart.php");
            exit();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>