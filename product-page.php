<?php
include("add_to_cart.php");

require("info.php");
$prodID = $_GET["id"];
$VehCSS = "";
$MobCSS = "";
$SmartCSS = "";
$WearCSS = "";
    if($prodID >= 100 && $prodID < 200 ){
       include("pageMob.php");
        $VehCSS = "none";
        $MobCSS = "inline-block";
        $SmartCSS = "none";
        $WearCSS = "none";
    }
    if($prodID >= 200 && $prodID < 300){
        include("pageSmdev.php");
        $VehCSS = "none";
        $MobCSS = "none";
        $SmartCSS = "inline-block";
        $WearCSS = "none";
    }
    if($prodID >= 300 && $prodID < 400){
        include("pageVeh.php");
        $VehCSS = "inline-block";
        $MobCSS = "none";
        $SmartCSS = "none";
        $WearCSS = "none";
    }
    if($prodID >= 400 && $prodID < 500){
        include("pageWear.php");
        $VehCSS = "none";
        $MobCSS = "none";
        $SmartCSS = "none";
        $WearCSS = "inline-block";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
    <link rel="stylesheet" type="text/css" href="product-page.css">
    <style>
        .adMob{
            display: <?php echo $MobCSS; ?>;
        }.adSmdev{
            display: <?php echo $SmartCSS; ?>;
        }.adVehicles{
            display: <?php echo $VehCSS; ?>;
        }.adWear{
            display: <?php echo $WearCSS; ?>;
        }
    </style>
</head>
<body>
    <?php
        require('nav.php');
    ?>
<div class="product-page">
    <div class="gallery">
        <div class="gallery-div">
            <div class="gallery__item">
            <img class="gallery__img" src="<?php echo $folder . '/' . $cover ?>" alt=""/>
        </div>
        <div class="gallery__item">
            <img class="gallery__img" src="<?php echo $folder . '/' . $pic1 ?>" alt=""/>
        </div>
        <div class="gallery__item">
            <img class="gallery__img" src="<?php echo $folder . '/' . $pic2 ?>" alt=""/>
        </div>
        <div class="gallery__item">
            <img class="gallery__img" src="<?php echo $folder . '/' . $pic3 ?>" alt=""/>
        </div>
        <div class="gallery__item">
            <img class="gallery__img" src="<?php echo $folder . '/' . $pic4 ?>" alt=""/>
        </div>
    </div> 
</div> 
        <!--
        <div class="gallery__item">
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
            </div>
        </div> 
        -->
          
         
        <div class="product-details">
            <div class="product-details-inner">
                <h1 class = "product-name"><?php echo $title?></h1>
                <h2 class = "price"><?php echo $price?> BGN</h2>
                    <hr class="line">
                <div class="product-description">
                    <div class="adMob" id ="adMob">
                        <p class='card-info'>Rear Camera: <?php echo $RCam ?> MP</p>
                        <p class='card-info'>Front Camera: <?php echo $FCam ?> MP</p>
                        <p class='card-info'>Storage: <?php echo $storage ?> GB</p>
                        <p class='card-info'>RAM: <?php echo $ram ?> GB</p>
                        <p class='card-info'>CPU: <?php echo $cpu ?> </p>
                        <p class='card-info'>GPU: <?php echo $gpu ?> </p>
                        <p class='card-info'>Battery: <?php echo $batt ?> mA/h</p>
                        <p class='card-info'>Description: <?php echo $desc ?> </p>
                    </div>  
                    <div class="adSmdev" id="adSmdev">
                        <p class='card-info'>Suction power: <?php echo $spower ?> pA</p>
                        <p class='card-info'>Battery life: <?php echo $batt ?> h</p>
                        <p class='card-info'>Dust tank: <?php echo $dust ?> ml</p>
                        <p class='card-info'>Water tank: <?php echo $water ?> ml</p>
                    </div>
                    <div class="adVehicles" id="adVehicles">
                        <p class='card-info'>Weight: <?php echo $weight ?> kg</p>
                        <p class='card-info'>Mileage: <?php echo $mileage ?> km</p>
                        <p class='card-info'>Motor power: <?php echo $power ?> W</p>
                        <p class='card-info'>Battery life: <?php echo $battery ?> h</p>
                        <p class='card-info'>Max weight: <?php echo $maxWeight ?> kg</p>
                        <p class='card-info'>Top speed: <?php echo $speed ?> km/h</p>
                        <p class='card-info'>Charge time: <?php echo $charge ?> h</p>
                        <p class='card-info'>Tire diameter: <?php echo $tire ?> inch</p>
                        <p class='card-info'>Color: <?php echo $color ?> </p>
                    </div>
                    <div class="adWear" id="adWear">
                        <p class='card-info'>Display: <?php echo $display ?> px</p>
                        <p class='card-info'>GPS: <?php echo $gps ?> </p>
                        <p class='card-info'>Bluetooth: <?php echo $bluetooth ?> </p>
                        <p class='card-info'>Battery: <?php echo $battery ?> mA/h</p>
                    </div>
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