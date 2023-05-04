<?php
	$servername = "localhost";
	$username = "root";
	$password = "fyre02";
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
    <link rel="stylesheet" href="panels.css">

</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <div class="panel">

    <p class="panel-title">Add smart device</p>

        <input type="text" name="model" maxlength="30" required placeholder="Model" class="txt-num" required>
        <input type="number" name="price" max="2000" maxlength="30" required placeholder="Price" class="txt-num" required>
        <input type="number" max="2000" name="suctionPower"  required placeholder="Suction Power" class="txt-num" required>
        <input id="text" type="file" name="pic" value="asd" class="custom-input" required>

        <div class= "btn-div">
            <input type="submit" name="submit" value="send" class="send-btn">
            <a href="../myAccount.php" class="cancel-btn"> Cancel </a>
        </div>   
    </div>
    </form>
    
    
</body>
</html>