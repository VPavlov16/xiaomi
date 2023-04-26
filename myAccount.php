<?php

$servername = "localhost";
$username = "root";
$password = "fyre02";
$database = "xiaomi";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $connection->prepare("SELECT * FROM xiaomi.registers;");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My account</title>
    <link rel="stylesheet" href="myAccount.css">
</head>
<body>
    <?php
        require('nav.php');
    ?>

    <div class="container">
    <h1 class="header">My Account</h1>
    
    <label for="myParagraph">This is a label for the paragraph:</label>
    <p id="myParagraph">This is a paragraph.</p>
    <label for="myParagraph">This is a label for the paragraph:</label>
    <p id="myParagraph">This is a paragraph.</p>
    <label for="myParagraph">This is a label for the paragraph:</label>
    <p id="myParagraph">This is a paragraph.</p>

    </div>
</body>
</html>