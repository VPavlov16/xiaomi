<?php
require("info.php");
require("nav.php");
require("cart.php");
try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
if (isset($_POST['submit'])) {
    $date = date("Y-m-d");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $totalPrice = 0;
    $serializedProdIds = [];
    foreach ($_SESSION['user']['cart'] as $productId) {
        $serializedProdIds[] = serialize($productId);
    }
    $prodIds = implode(",", $serializedProdIds);
    // Calculate total price
    foreach ($_SESSION['user']['cart'] as $productId) {
        // Use the provided query to fetch the price for each product
        $sql = "
            SELECT * FROM (
                SELECT price FROM xiaomi.mobdev
                WHERE id = " . $productId . "
            ) AS t1
            UNION ALL
            SELECT * FROM (
                SELECT price FROM xiaomi.smart_devices
                WHERE id = " . $productId . "
            ) AS t2
            UNION ALL
            SELECT * FROM (
                SELECT price FROM xiaomi.vehicles
                WHERE id = " . $productId . "
            ) AS t3
            UNION ALL
            SELECT * FROM (
                SELECT price FROM xiaomi.wearable
                WHERE id = " . $productId . "
            ) AS t4";

        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $price = $stmt->fetchColumn();
        $totalPrice += $price;
    }
    $sql = "INSERT INTO orders (date, pid, fname, lname, address, phone, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $connection->prepare($sql)->execute([$date, $prodIds, $fname, $lname, $address, $phone, $totalPrice]);
    $orderId = $connection->lastInsertId();

    if ($orderId) {
        foreach ($_SESSION['user']['cart'] as $productId) {
            if (($key = array_search($productId, $_SESSION['user']['cart'])) !== false) {
                unset($_SESSION['user']['cart'][$key]);
            }
        }
        $userId = $_SESSION['user'][0];
        $cartData = serialize($_SESSION['user']['cart']);
        $sql2 = "UPDATE registers SET cart = ? WHERE id = ?";
        $connection->prepare($sql2)->execute([$cartData, $userId]);
        
        echo "<script>window.location.href = 'home.php';</script>";
        //header("Location: home.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Finish order</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .button-cart {
            display: none;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="finishOrder.php">
        <input type="text" name="fname" placeholder="First name" required><br>
        <input type="text" name="lname" placeholder="Last name" required><br>
        <input type="text" name="address" placeholder="Address" required><br>
        <input type="number" name="phone" placeholder="Phone" required><br>
        <button name="submit" class="button" type="submit" value="Finish">Order</button>
    </form>
</body>
</html>
