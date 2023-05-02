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
	
	
		$title = $_POST['title'];
		$weight = $_POST['weight'];
		$mileage = $_POST['mileage'];
        $motorPower = $_POST['motorPower'];
        $battery = $_POST['battery'];
		$maxWeight = $_POST['maxWeight'];
		$topSpeed = $_POST['topSpeed'];
        $charge = $_POST['charge'];
        $tiresDiameter = $_POST['tiresDiameter'];
        $color = $_POST['color'];
        $price = $_POST['price'];
       
        $file = $_FILES['pic'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

            $sql = "INSERT INTO vehicles ( title, weight, mileage, motorPower, battery, maxWeight, topSpeed, charge, tiresDiameter, color, price, pic) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$title, $weight, $mileage, $motorPower, $battery, $maxWeight, $topSpeed, $charge, $tiresDiameter, $color, $price, $fileName]);


            move_uploaded_file($fileTemp, "../vehicles/" . $fileName);

        
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="panels.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
   <div class="panel">
    <input type="text" name="title" maxlength="40" required placeholder="Title">
    <input type="number" max="30" name="weight" required  placeholder="Weight">
    <input type="number" max="100" name="mileage" required placeholder="Mileage">
    <input type="number" max="2000" name="motorPower" required placeholder="Motor Power">
    <input type="number" max="2000" name="battery" required placeholder="Battery">
    <input type="number" max="200" name="maxWeight" required placeholder="Max Weight">
    <input type="number" max="120" name="topSpeed" required placeholder="Top Speed">
    <input type="number" max="20" name="charge" required  placeholder="Charge time">
    <input type="number" max="12" name="tiresDiameter" required placeholder="Tires Diameter">
    <input type="text" name="color" required placeholder="Color">
    <input type="number" max="3000" name="price" required placeholder="Price">
    <input id="text" type="file" name="pic" required value="asd">

    <input type="submit" name="submit" value="send">
    

   </div>
    </form>
    
    
</body>
</html>