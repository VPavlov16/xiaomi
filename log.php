<?php 
// стартиране на сесия ( ще трябва по-долу )
session_start();

$servername = "localhost";
$username = "root";
$password = "123456789";
$database = "xiaomi";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
}

if ( isset( $_POST['submit1'] ) ) {

	// записване на данните от полетата в променливи за по-удобно

	$email = $_POST['email'];
	$password = hash('sha256',$_POST['password']);
	
	// зареждане от базата на потребител с въведените от формата име и парола
	
	$stmt = $connection->prepare("SELECT * FROM registers WHERE email = ? AND pass = ?"); 
	$stmt->execute([ $email, $password ]); 
	$user = $stmt->fetch();
	
	if ( $user ) {
	
		// ако са въведени правилни име и парола се задава масива user в сесията
		
		$_SESSION['user'] = $user;
		
		// пренасочване към страница admin.php
		
		header("location: home.html");
		exit;
		
	} else {
		
		echo "<b style='color:red;'>Невалидни потребителски данни</b><br><br>";
	}
}
	
?>	
