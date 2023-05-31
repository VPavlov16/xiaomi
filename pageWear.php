<?php 
require("info.php");
$prodID = $_GET["id"];
$folder = "wearable";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM wearable WHERE id = ".$prodID.";";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['Model'];
$price = $row['price'];
$cover = $row['pic'];
$pic1 = $row['pic1'];
$pic = $row['pic2'];
$pic3 = $row['pic3'];
$pic4 = $row['pic4'];
$display = $row['display'];
$battery = $row['battery'];
$gps = $row['GPS'];
$bluetooth = $row['bluetooth'];
?>