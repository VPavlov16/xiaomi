<?php 
require("info.php");
$prodID = $_GET["id"];
$folder = "vehicles";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM vehicles WHERE id = ".$prodID.";";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['Model'];
$price = $row['price'];
$cover = $row['pic'];
$pic1 = $row['pic1'];
$pic = $row['pic2'];
$pic3 = $row['pic3'];
$pic4 = $row['pic4'];
$weight = $row['weight'];
$mileage = $row['mileage'];
$power = $row['motorPower'];
$battery = $row['battery'];
$maxWeight = $row['maxWeight'];
$speed = $row['topSpeed'];
$charge = $row['charge'];
$tire = $row['tiresDiameter'];
$color = $row['color'];
?>