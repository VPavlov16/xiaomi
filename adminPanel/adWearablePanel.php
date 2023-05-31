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

            $CheckIDS = $connection->prepare("SELECT id FROM wearable ORDER BY id DESC LIMIT 1"); 
            $CheckIDS->execute();
            $result = $CheckIDS->fetch(PDO::FETCH_ASSOC);
            $lastid = $result["id"];
       
        


	if ( isset( $_POST['submit'] ) ) {


       
	
        $id = $lastid +1;

		$model = $_POST['model'];
		$price = $_POST['price'];
		$display = $_POST['display'];
        $battery = $_POST['battery'];
        $gps = $_POST['gps'];
        $bluetooth = $_POST['Bluetooth'];
       //pics
        $file = $_FILES['pic'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
       

        $file2 = $_FILES['pic1'];
        $fileName2 = $file2['name'];
        $fileTemp2 = $file2['tmp_name'];
        
        $file3 = $_FILES['pic2'];
        $fileName3 = $file3['name'];
        $fileTemp3 = $file3['tmp_name'];

        $file4 = $_FILES['pic3'];
        $fileName4 = $file4['name'];
        $fileTemp4 = $file4['tmp_name'];

        $file5 = $_FILES['pic4'];
        $fileName5 = $file5['name'];
        $fileTemp5 = $file5['tmp_name'];

       
            $sql2 = "INSERT INTO products (id) VALUES (?)";
            $stmt2 = $connection->prepare($sql2);
            $stmt2->execute([$id]);

           
            $sql = "INSERT INTO wearable (id,Model, price, display, battery, GPS, bluetooth, pic, pic1, pic2, pic3, pic4) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id,$model, $price, $display, $battery, $gps, $bluetooth, $fileName, $fileName2, $fileName3, $fileName4, $fileName5]);


            copy($fileTemp, "../wearable/" .  $fileName);
            copy($fileTemp, "../homeCover/" .  $fileName);
            move_uploaded_file($fileTemp2, "../wearable/" .  $fileName2);
            move_uploaded_file($fileTemp3, "../wearable/" .  $fileName3);
            move_uploaded_file($fileTemp4, "../wearable/" .  $fileName4);
            move_uploaded_file($fileTemp5, "../wearable/" .  $fileName5);
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