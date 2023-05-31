<?php
session_start();
require("info.php");

try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
}

if (isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $stmt = $connection->prepare("UPDATE registers SET token = NULL WHERE token = ?");
    $stmt->execute([$token]);
}

setcookie('remember_token', '', time() - 3600);
$_SESSION = array();
session_destroy();

session_regenerate_id();

exit();
?>