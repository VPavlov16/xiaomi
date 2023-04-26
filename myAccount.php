<?php
require('nav.php');
$servername = "localhost";
$username = "root";
$password = "123456789";
$database = "xiaomi";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$stmt = $connection->prepare("SELECT * FROM registers WHERE id = ?"); 
	$stmt->execute([ $_SESSION['user'][0]]); 
	$rows = $stmt->fetchAll();

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

    <div class="container">
    <h1 class="header">My Account</h1>
    
    <label for="firstname">First name:</label>
   <?php echo"<p id='firstname'>".$rows[0]['fname']."</p>"?>
    <br>
    <label for="lastname">Last name:</label>
    <?php echo"<p id='lastname'>".$rows[0]['lname']."</p>"?>
    <br>
    <label for="email">Email:</label>
    <?php echo"<p id='email'>".$rows[0]['email']."</p>"?>

    </div>
</body>
</html>