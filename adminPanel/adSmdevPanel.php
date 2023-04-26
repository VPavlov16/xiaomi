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
	
	
		$model = $_POST['model'];
		$price = $_POST['price'];
		$suctionPower = $_POST['suctionPower'];
       
        $file = $_FILES['pic'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
		// заявка към базата, с която се записват полетата

           
            $sql = "INSERT INTO smart_devices ( Model, price, suction_power, pic) VALUES (?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$model, $price, $suctionPower, $fileName]);


            move_uploaded_file($fileTemp, "../smart devices/" . $fileName);
        
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        .panel{
            text-align: center;
            border: 3px;
            border-color: black;
        }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
   <div class="panel">
    <input type="text" name="model" maxlength="30" required placeholder="Model">
    <br>
    <br>
    <input type="number" name="price" max="2000" maxlength="30" required placeholder="Price">
    <br>
    <br>
    <input type="number" max="2000" name="suctionPower"  required placeholder="Suction Power">
    <br>
    <br>
    <input id="text" type="file" name="pic" value="asd">
    <br>
    <br>

    <input type="submit" name="submit" value="send">
    

   </div>
    </form>
    
    
</body>
</html>