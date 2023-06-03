<?php 
require("info.php");
$prodID = $_GET["id"];
$folder = "smart devices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM smart_devices WHERE id = ".$prodID.";";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['Model'];
$price = $row['price'];
$cover = $row['pic'];
$pic1 = $row['pic1'];
$pic2 = $row['pic2'];
$pic3 = $row['pic3'];
$pic4 = $row['pic4'];
$spower = $row['suction_power'];
$batt = $row['battery_life'];
$dust = $row['dust_tank'];
$water = $row['water_tank'];

?>