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
    .button {
    background-color: #df4618; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  }
  
  .button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
  }
  .admin{
    display: <?php echo $buttonDisplay; ?>;
  }


    </style>
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
    <br>
    <button onclick=logout() class='button button2'>Log out</button>
    <br>
    <button onclick="window.location.href='adWearablePanel.php';" class="button button2 admin">Post a mobile device</button>
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