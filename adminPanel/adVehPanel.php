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
            $CheckIDS = $connection->prepare("SELECT id FROM vehicles ORDER BY id DESC LIMIT 1"); 
            $CheckIDS->execute();
            $result = $CheckIDS->fetch(PDO::FETCH_ASSOC);
            $lastid = $result["id"];

	if ( isset( $_POST['submit'] ) ) {

        $id = $lastid +1;
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
       

            $sql = "INSERT INTO vehicles (id, Model, weight, mileage, motorPower, battery, maxWeight, topSpeed, charge, tiresDiameter, color, price, pic, pic1, pic2, pic3, pic4) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $connection->prepare($sql);
            $stmt->execute([$id,$title, $weight, $mileage, $motorPower, $battery, $maxWeight, $topSpeed, $charge, $tiresDiameter, $color, $price, $fileName,$fileName2,$fileName3,$fileName4,$fileName5]);


            copy($fileTemp, "../vehicles/" .  $fileName);
            copy($fileTemp, "../homeCover/" .  $fileName);
            move_uploaded_file($fileTemp2, "../vehicles/" .  $fileName2);
            move_uploaded_file($fileTemp3, "../vehicles/" .  $fileName3);
            move_uploaded_file($fileTemp4, "../vehicles/" .  $fileName4);
            move_uploaded_file($fileTemp5, "../vehicles/" .  $fileName5);

        
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

   <p class="panel-title">Add vehicle</p>

    <input type="text" name="title" maxlength="40" required placeholder="Title"class="txt-num">
    <input type="number" max="30" name="weight" required  placeholder="Weight" class="txt-num">
    <input type="number" max="100" name="mileage" required placeholder="Mileage"class="txt-num">
    <input type="number" max="2000" name="motorPower" required placeholder="Motor Power" class="txt-num">
    <input type="number" max="2000" name="battery" required placeholder="Battery" class="txt-num">
    <input type="number" max="200" name="maxWeight" required placeholder="Max Weight" class="txt-num">
    <input type="number" max="120" name="topSpeed" required placeholder="Top Speed" class="txt-num">
    <input type="number" max="20" name="charge" required  placeholder="Charge time" class="txt-num">
    <input type="number" max="12" name="tiresDiameter" required placeholder="Tires Diameter" class="txt-num">
    <input type="text" name="color" required placeholder="Color" class="txt-num">
    <input type="number" max="3000" name="price" required placeholder="Price" class="txt-num">
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