<?php
	$servername = "localhost";
	$username = "root";
	$password = "123456789";
	$database = "xiaomi";

	try {
		$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully";
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

	if ( isset( $_POST['submit'] ) ) {
	
	
		$model = $_POST['model'];
		$price = $_POST['price'];
		$display = $_POST['display'];
        $battery = $_POST['battery'];
       
        $file = $_FILES['pic'];
        $fileName = $_FILES['pic'] ['name'];
        $fileTemp = $_FILES['pic'] ['temp'];
        $fileType = $_FILES['pic'] ['type'];
		// заявка към базата, с която се записват полетата

           
            $sql = "INSERT INTO wearable ( Model, price, display, battery,pic) VALUES (?,?,?,?,?)";
		$connection->prepare($sql)->execute([$model,$price, $display, $battery,$fileTemp]);

        
        move_uploaded_file($fileTemp,"wearable/".$fileName.".jpg");
        
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
    <form method="post">
   <div class="panel">
    <input type="text" name="model" maxlength="30" placeholder="Model">
    <br>
    <br>
    <input type="number" name="price" maxlength="30" placeholder="Price">
    <br>
    <br>
    <input type="text" name="display" maxlength="30" placeholder="Display">
    <br>
    <br>
    <input type="text" name="battery" maxlength="30" placeholder="Battery">
    <br>
    <br>
    <input id="text" type="file" name="pic">
    <br>
    <br>

    <input type="submit" name="submit" value="send">
    

   </div>
    </form>
    
    
</body>
</html>