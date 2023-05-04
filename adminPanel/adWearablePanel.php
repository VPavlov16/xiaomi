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
    <form method="post" enctype="multipart/form-data" class="full-form">
        <div class="panel">
            
            <p class="panel-title">Add wearable product</p>

            <div class= "div-txt-num">
            <input type="text" name="model" maxlength="30" placeholder="Model" class="txt-num" required>
            <input type="number" name="price" maxlength="30" placeholder="Price" class="txt-num" required>
            <input type="text" name="display" maxlength="30" placeholder="Display" class="txt-num" required>
            <input type="text" name="battery" maxlength="30" placeholder="Battery" class="txt-num" required> 
            </div>

            <div class="radios">
                <span>GPS?</span>
                <div class="inputs">
                    <input type="radio" id="No" name="gps" value="No" required>
                    <label for="No">No</label>
                    <input type="radio" id="Yes" name="gps" value="Yes" required>
                    <label for="Yes">Yes</label>
                </div>
            </div>

            <div class="radios">
                <span>Bluetooth?</span><br>
                <div class="inputs">
                    <input type="radio" id="No" name="Bluetooth" value="No">
                    <label for="No">No</label>
                    <input type="radio" id="Bluetooth 5.1" name="Bluetooth" value="Bluetooth 5.1" required>
                    <label for="Bluetooth 5.1">Bluetooth 5.1</label>
                    <input type="radio" id="Bluetooth 5.2" name="Bluetooth" value="Bluetooth 5.2" required>
                    <label for="Bluetooth 5.2">Bluetooth 5.2</label>
                </div>
            </div>

            <label for="pic">Cover Picture</label>
            <input id="text" type="file" name="pic" value="pic" class="custom-input" required>
            <label for="pic1">2nd Picture</label>
            <input id="text" type="file" name="pic1" value="pic1" class="custom-input" required>
            <label for="pic2">3th Picture</label>
            <input id="text" type="file" name="pic2" value="pic2" class="custom-input" required>
            <label for="pic3">4th Picture</label>
            <input id="text" type="file" name="pic3" value="pic3" class="custom-input" required>
            <label for="pic4">5th Picture</label>
            <input id="text" type="file" name="pic4" value="pic4" class="custom-input" required>
            
            <div class= "btn-div">
                <input type="submit" name="submit" value="send" class="send-btn">
                <a href="../myAccount.php" class="cancel-btn"> Cancel </a>
            </div>
        </div>
    </form>
    
    
</body>
</html>