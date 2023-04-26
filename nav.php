<?php
session_start();
if(isset($_SESSION['user'])){
    debug_to_console($_SESSION['user']);
}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi BG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images\logo-xiaomi.png"/>
    <link rel="stylesheet" href="nav-and-home.css">
</head>
<body>

    <nav class="navbar">
        <ul>
            <li>
                <a href="home.php" class="logo-a">
                    <div class="xiaomi-div">
                        <img src="images\mi-logo.svg" alt="logo" class="xiaomi-logo">
                    </div>
                    <span class="xlogo">XIAOMI</span>    
                </a>
            </li>

            <div class="list">
                <li>
                    <a href="#" class="list-a">
                        <img src="images\search.png" alt="logo" class="logo">
                        <input type="text" placeholder="Search.." class="searchbar">
                    </a>
                    </li> 
                </div>

            <div class="list">
            <li>
                <a href="home.php" class="list-a"> 
                    <img src="images\home.png" alt="logo" class="logo">
                  <span class="nav-item">Home</span>
                </a>
                </li> 
            </div>

            <div class="list">
            <li>
                <a href="mobdev.php" class="list-a">
                    <img src="images\smartphone-tablet.png" alt="logo" class="logo">
                    <span class="nav-item">Mobile devices</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="vehicles.php" class="list-a">
                    <img src="images\scooter.png" alt="logo" class="logo">
                    <span class="nav-item">Vehicles</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="wearable.php" class="list-a">
                    <img src="images\watch.png" alt="logo" class="logo">
                    <span class="nav-item">Wearable</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="smdev.php" class="list-a">
                    <img src="images\lightbulb.png" alt="logo" class="logo">
                    <span class="nav-item">Smart devices</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="login-register.php" class="list-a">
                    <img src="images\user.png" alt="logo" class="logo">
                    <span class="nav-item">My account</span>
                </a>
            </li>
            </div>
        </ul>
    </nav>
    
</body>
</html>