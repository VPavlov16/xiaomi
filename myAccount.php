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

    if ($rows[0]['type'] == "admin") {
        $buttonDisplay = "inline-block";
    } else {
        $buttonDisplay = "none";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My account</title>
    <link rel="stylesheet" href="myAccount.css">
    <style>
        .admin{
            display: <?php echo $buttonDisplay; ?>;
        }
    </style>
</head>
<body>

    <div class="container">
    <h1 class="header">My Account</h1>
    
    <label for="firstname">First name:</label>
    <?php echo"<p id='firstname' class='p-info'>".$rows[0]['fname']."</p>"?>
    <br>
    <label for="lastname">Last name:</label>
    <?php echo"<p id='lastname' class='p-info'>".$rows[0]['lname']."</p>"?>
    <br>
    <label for="email">Email:</label>
    <?php echo"<p id='email' class='p-info'>".$rows[0]['email']."</p>"?>
    <div class="buttons-div">
        <button onclick="window.location.href='adminPanel/adWearablePanel.php';" class="button button2 admin">Post a wearable device</button>
        <button onclick="window.location.href='adminPanel/adMobdevPanel.php';" class="button button2 admin">Post a mobile device</button>
        <button onclick="window.location.href='adminPanel/adVehPanel.php';" class="button button2 admin">Post a vehicle</button>
        <button onclick="window.location.href='adminPanel/adSmdevPanel.php';" class="button button2 admin">Post a smart device</button>
        <button onclick=logout() class='button button2 logout'>Log out</button>
    </div>
</div>
</body>
</html>

<script>
function logout() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = 'home.php';
        }
    };
    xhttp.open("GET", "logout.php", true);
    xhttp.send();
}
</script>