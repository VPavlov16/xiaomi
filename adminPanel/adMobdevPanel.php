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
		$cpu = $_POST['cpu'];
        $gpu = $_POST['gpu'];
        $battery = $_POST['battery'];
		$storage = $_POST['storage'];
		$ram = $_POST['ram'];
        $fCamera = $_POST['frontCamera'];
        $rCamera = $_POST['rearCamera'];
        $desc = $_POST['description'];
       
        $file = $_FILES['pic'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

            $sql = "INSERT INTO mobdev ( Model, price, CPU, GPU, battery, storage, ram, front_camera, rear_camera, description, pic) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$model, $price, $cpu, $gpu, $battery, $storage, $ram, $fCamera, $rCamera, $desc, $fileName]);


            move_uploaded_file($fileTemp, "../mobile_devices/" . $fileName);

        
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
    <input type="text" name="model" maxlength="30" placeholder="Model">
    <input type="number" name="price" maxlength="30" placeholder="Price">
    <input type="text" name="cpu" maxlength="30" placeholder="CPU">
    <input type="text" name="gpu" maxlength="30" placeholder="GPU">
    <input type="number" name="battery" maxlength="30" placeholder="Battery">
    <input type="number" max="1000" name="storage" maxlength="30" placeholder="Storage">
    <input type="number" max="16" name="ram" maxlength="30" placeholder="RAM">
    <input type="number" max="200" name="frontCamera" maxlength="30" placeholder="Front Camera">
    <input type="number" max="200" name="rearCamera" maxlength="30" placeholder="Rear Camera">
    <input type="textfield" name="description" placeholder="Description">
    <input id="text" type="file" name="pic" value="asd">

    <input type="submit" name="submit" value="send">
    

   </div>
    </form>
    
    
</body>
</html>