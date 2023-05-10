<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "123456789";
$database = "xiaomi";
$status = "none";


try {
  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit1'] ) ) {

	$email = $_POST['email'];
	$password = hash('sha256',$_POST['password']);
	
	$stmt = $connection->prepare("SELECT * FROM registers WHERE email = ? AND pass = ?"); 
	$stmt->execute([ $email, $password ]); 
	$userInfo = $stmt->fetchAll();
	
	if ( $userInfo ) {
		$_SESSION['user'] = [$userInfo[0]['id'],$userInfo[0]['fname'],$userInfo[0]['lname'],$userInfo[0]['email'],$userInfo[0]['type']];
		$status = "none";
		
	
		header("location: home.php");
		exit;
		
	} else {
	   $status = "inline-block";
	}
}
?>	
