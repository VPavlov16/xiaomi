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

   <p class="panel-title">Add mobile device</p>

    <input type="text" name="model" maxlength="30" placeholder="Model"  class="txt-num" required>
    <input type="number" name="price" maxlength="30" placeholder="Price"  class="txt-num" required>
    <input type="text" name="cpu" maxlength="30" placeholder="CPU"  class="txt-num" required>
    <input type="text" name="gpu" maxlength="30" placeholder="GPU"  class="txt-num" required>
    <input type="number" name="battery" maxlength="30" placeholder="Battery"  class="txt-num" required>
    <input type="number" max="1000" name="storage" maxlength="30" placeholder="Storage"  class="txt-num" required> 
    <input type="number" max="16" name="ram" maxlength="30" placeholder="RAM"  class="txt-num" required>
    <input type="number" max="200" name="frontCamera" maxlength="30" placeholder="Front Camera"  class="txt-num" required>
    <input type="number" max="200" name="rearCamera" maxlength="30" placeholder="Rear Camera"  class="txt-num" required>
    
    <div class="div-textarea">
        <textarea name="" id="" cols="30" data-min-rows='5' class="textarea"></textarea>    
    </div>
    <input id="text" type="file" name="pic" value="asd" class="custom-input" required>
    
    <div class= "btn-div">
        <input type="submit" name="submit" value="send" class="send-btn">
        <a href="../myAccount.php" class="cancel-btn"> Cancel </a>
    </div>
   </div>
    </form>
    
    
</body>
</html>