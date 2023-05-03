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
		$display = $_POST['display'];
        $battery = $_POST['battery'];
        $gps = $_POST['gps'];
        $bluetooth = $_POST['Bluetooth'];
       
        //cover
        $_FILES['pic']['name']['tmp_name']['pic1']['name1']['tmp_name1']['pic2']['name2']['tmp_name2']['pic3']['name3']['tmp_name3']['pic4']['name4']['tmp_name4'];
        /*
        //1
        $_FILES['pic1']['name1']['tmp_name1']['type1'];
        //2
        $_FILES['pic2']['name2']['tmp_name2']['type2'];
        //3
        $_FILES['pic3']['name3']['tmp_name3']['type3'];
        //4
        $_FILES['pic4']['name4']['tmp_name4']['type4'];
       /*
        $file = $_FILES['pic'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
        $fileType = $file['type'];
        */
        $fileExt = pathinfo($_FILES['name'], PATHINFO_EXTENSION);
        $fileExt = pathinfo($_FILES['name1'], PATHINFO_EXTENSION);
        $fileExt = pathinfo($_FILES['name2'], PATHINFO_EXTENSION);
        $fileExt = pathinfo($_FILES['name3'], PATHINFO_EXTENSION);
        $fileExt = pathinfo($_FILES['name4'], PATHINFO_EXTENSION);
		// заявка към базата, с която се записват полетата

           
            $sql = "INSERT INTO wearable ( Model, price, display, battery, GPS, bluetooth, pic, pic1, pic2, pic3, pic4) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$model, $price, $display, $battery, $gps, $bluetooth, $_FILES['pic'],$_FILES['pic1'],$_FILES['pic2'],$_FILES['pic3'],$_FILES['pic4']]);


            move_uploaded_file($_FILES['tmp_name'], "../wearable/" .  $_FILES['name']);
            move_uploaded_file($_FILES['tmp_name1'], "../wearable/" .  $_FILES['name1']);
            move_uploaded_file($_FILES['tmp_name2'], "../wearable/" .  $_FILES['name2']);
            move_uploaded_file($_FILES['tmp_name3'], "../wearable/" .  $_FILES['name3']);
            move_uploaded_file($_FILES['tmp_name4'], "../wearable/" .  $_FILES['name4']);
       // move_uploaded_file($fileTemp,"wearable/".$fileName.".jpg");
        
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
    <input type="text" name="display" maxlength="30" placeholder="Display">
    <input type="text" name="battery" maxlength="30" placeholder="Battery">
    <input id="text" type="file" name="pic" value="asd">
    <input type="submit" name="submit" value="send">
    </form>
     </div>
    
</body>
</html>