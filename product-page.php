<?php

require("info.php");
$prodID = $_GET["id"];
$table = "";
$folder = "";


    if($prodID >= 100 && $prodID < 200 ){
        $table = "mobdev";
        $folder = "mobile_devices";
    }
    if($prodID >= 200 && $prodID < 300){
        $table = "smart_devices";
        $folder = "smart devices";
    }
    if($prodID >= 300 && $prodID < 400){
        $table = "vehicles";
        $folder = "vehicles";
    }
    if($prodID >= 400 && $prodID < 500){
        $table = "wearable";
        $folder = "wearable";
    }
    



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM ".$table." WHERE id = ".$prodID.";";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['Model'];
$price = $row['price'];
$cover = $row['pic'];

include("add_to_cart.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
    <link rel="stylesheet" type="text/css" href="product-page.css">
</head>
<body>
    <?php
        require('nav.php');
    ?>
<div class="product-page">

    <div class="gallery-div">
        <img src="<?php echo $folder . "/" . $cover  ?>"alt="img" class = "trota">
        <!--<div class="gallery__item">
                <input type="radio" id="img-1" checked name="gallery" class="gallery__selector"/>
                <img class="gallery__img" src="https://picsum.photos/id/1015/600/400.jpg" alt=""/>
                <label for="img-1" class="gallery__thumb"><img src="https://picsum.photos/id/1015/150/100.jpg" alt=""/></label>
            </div>
            <div class="gallery__item">
                <input type="radio" id="img-2" name="gallery" class="gallery__selector"/>
                <img class="gallery__img" src="https://picsum.photos/id/1039/600/400.jpg" alt=""/>
                <label for="img-2" class="gallery__thumb"><img src="https://picsum.photos/id/1039/150/100.jpg" alt=""/></label>
            </div>
            <div class="gallery__item">
                <input type="radio" id="img-3" name="gallery" class="gallery__selector"/>
                <img class="gallery__img" src="https://picsum.photos/id/1057/600/400.jpg" alt=""/>
                <label for="img-3" class="gallery__thumb"><img src="https://picsum.photos/id/1057/150/100.jpg" alt=""/></label>
            </div>
            <div class="gallery__item">
                <input type="radio" id="img-4" name="gallery" class="gallery__selector"/>
                <img class="gallery__img" src="https://picsum.photos/id/106/600/400.jpg" alt=""/>
                <label for="img-4" class="gallery__thumb"><img src="https://picsum.photos/id/106/150/100.jpg" alt=""/></label>
            </div>-->
        </div> 
               
        <div class="product-details">
            <div class="product-details-inner">
                <h1 class = "product-name"><?php echo $title?></h1>
                <h2 class = "price"><?php echo $price?> BGN</h2>
                    <hr class="line">
                <div class="product-description">
                    <div id ="adMob">
                        <p class='card-info'>Rear Camera: " . $row["rear_camera"] . "MP</p>
                        <p class='card-info'>Front Camera: " . $row["front_camera"] . "MP</p>
                        <p class='card-info'>Storage: " . $row["storage"] . "GB</p>
                        <p class='card-info'>RAM: " . $row["ram"] . " GB</p>
                    </div>  
                    <!--<div id="adSmdev">
                        <p class = 'card-info'>Suction Power: " . $row["suction_power"] . " pA</p>
                    </div>
                    <div id="adVehicles">
                        <p class = 'card-info'>Motor power: " . $row["motorPower"] . "W</p>
                        <p class = 'card-info'>Top speed: " . $row["topSpeed"] . " km/h</p>
                        <p class = 'card-info'>Battery: " . $row["battery"] . " Wh</p>
                    </div>
                    <div id="adWear">
                        <p class = 'card-info'>Display: " . $row["display"] . " px</p>
                        <p class = 'card-info'>Battery: " . $row["battery"] . " mAh</p>
                    </div>
                    <div id="adWear">
                        <p class = 'card-info'>Display: " . $row["display"] . " px</p>
                        <p class = 'card-info'>Battery: " . $row["battery"] . " mAh</p>
                    </div>
                    <div id="adWear">
                        <p class = 'card-info'>Display: " . $row["display"] . " px</p>
                        <p class = 'card-info'>Battery: " . $row["battery"] . " mAh</p>
                    </div>-->
                </div>
                                    
                <div class='buttons-div'>
                    <form method='post' action='add_to_cart.php'>
                        <input type='hidden' name='product_id' value="<?php echo $prodID ?>">
                        <button class='button-cart' name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>
                        </form>
                        <button class='button-wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>
                    </div>
                </div>
            </div>

</body>
</html>