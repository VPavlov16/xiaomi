<?php
	$servername = "localhost";
	$username = "root";
	$password = "123456789";
	$database = "xiaomi";

	try {
		$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
	} catch(PDOException $e) {
		//echo "Connection failed: " . $e->getMessage();
	}

	if ( isset( $_POST['submit'] ) ) {
	
		// записване на данните от полетата в променливи за по-удобно
	
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);	
		// заявка към базата, с която се записват полетата

		$sql = "INSERT INTO registers ( fname, lname, email, pass) VALUES (?,?,?,?)";
		$connection->prepare($sql)->execute([$fname,$lname, $email, $password]);
	}
 ?>