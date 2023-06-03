<?php 
require("info.php");
$prodID = $_GET["id"];
$folder = "mobile_devices";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mobdev WHERE id = ".$prodID.";";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['Model'];
$price = $row['price'];
$cover = $row['pic'];
$pic1 = $row['pic1'];
$pic2 = $row['pic2'];
$pic3 = $row['pic3'];
$pic4 = $row['pic4'];
$RCam = $row['rear_camera'];
$FCam = $row['front_camera'];
$storage = $row['storage'];
$ram = $row['ram'];
$cpu = $row['CPU'];
$gpu = $row['GPU'];
$batt = $row['battery'];
$desc = $row['description'];
?>