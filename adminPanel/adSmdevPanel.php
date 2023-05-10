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
             $CheckIDS = $connection->prepare("SELECT id FROM smart_devices ORDER BY id DESC LIMIT 1"); 
            $CheckIDS->execute();
            $result = $CheckIDS->fetch(PDO::FETCH_ASSOC);
            $lastid = $result["id"];

	if ( isset( $_POST['submit'] ) ) {
        $id = $lastid +1;
       //pics
        $file = $_FILES['pic'];
        $fileName = $file['name'];
        $fileTemp = $file['tmp_name'];
        $fileC = $file['tmp_name'];

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
	
	
		$model = $_POST['model'];
		$price = $_POST['price'];
		$suctionPower = $_POST['suctionPower'];
        $battery = $_POST['battery_life'];
        $dust = $_POST['dustTank'];
        $water = $_POST['waterTank'];
       
       

           
            $sql = "INSERT INTO smart_devices (id, Model, price,battery_life,dust_tank,water_tank, suction_power, pic, pic1, pic2, pic3, pic4) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id,$model, $price, $suctionPower,$battery,$dust,$water, $fileName, $fileName2, $fileName3, $fileName4, $fileName5]);


            move_uploaded_file($fileTemp, "../smart devices/" .  $fileName);
            move_uploaded_file($fileC, "../homeCover/" .  $fileName);
            move_uploaded_file($fileTemp2, "../smart devices/" .  $fileName2);
            move_uploaded_file($fileTemp3, "../smart devices/" .  $fileName3);
            move_uploaded_file($fileTemp4, "../smart devices/" .  $fileName4);
            move_uploaded_file($fileTemp5, "../smart devices/" .  $fileName5);
        
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
        <input type="number" max="2000" name="suctionPower"  required placeholder="Suction Power" class="txt-num" required>
        <input type="number" name="price" max="2000"  required placeholder="Price" class="txt-num" required>
        <input type="number" name="battery_life" placeholder="Battery Life" class="txt-num" required>
        <input type="number" name="dustTank"   required placeholder="Dust Tank" class="txt-num" required>
        <input type="number" name="waterTank"  placeholder="Water Tank" class="txt-num" required>
        
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