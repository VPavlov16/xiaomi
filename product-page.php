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
    <link rel="shortcut icon" type="image/x-icon" href="images\logo-xiaomi.png"/>

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
                <div class="gallery__container">
                    <div class="expanded-image-container">
                        <div class="expanded-image">
                            <img id="expanded-image" class="rounded" src="<?php echo $folder . '/' . $cover ?>" alt="Expanded Image">
                        </div>
                    </div>
                    <div class="gallery__row">
                        <div class="gallery__item" onclick="expandImage('<?php echo $folder . '/' . $cover ?>')">
                            <img src="<?php echo $folder . '/' . $cover ?>" alt="Image 1">
                        </div>
                        <div class="gallery__item" onclick="expandImage('<?php echo $folder . '/' . $pic1 ?>')">
                            <img src="<?php echo $folder . '/' . $pic1 ?>" alt="Image 2">
                        </div>
                        <div class="gallery__item" onclick="expandImage('<?php echo $folder . '/' . $pic2 ?>')">
                            <img src="<?php echo $folder . '/' . $pic2 ?>" alt="Image 3">
                        </div>
                        <div class="gallery__item" onclick="expandImage('<?php echo $folder . '/' . $pic3 ?>')">
                            <img src="<?php echo $folder . '/' . $pic3 ?>" alt="Image 4">
                        </div>
                        <div class="gallery__item" onclick="expandImage('<?php echo $folder . '/' . $pic4 ?>')">
                            <img src="<?php echo $folder . '/' . $pic4 ?>" alt="Image 5">
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details">
                <div class="product-details-inner">
                    <h1 class = "product-name"><?php echo $title?></h1>
                    <h2 class = "price"> <mark><?php echo $price?> BGN</mark></h2>
                    <hr class="line">

                    <div class="product-description">
                        <div class="adMob" id ="adMob">
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Rear Camera: <?php echo $RCam ?> MP</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Front Camera: <?php echo $FCam ?> MP</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Storage: <?php echo $storage ?> GB</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">RAM: <?php echo $ram ?> GB</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">CPU: <?php echo $cpu ?> </p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">GPU: <?php echo $gpu ?> </p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Battery: <?php echo $batt ?> mA/h</p>
                            <p class='card-info'>Description: <?php echo $desc ?> </p>
                        </div>  
                        <div class="adSmdev" id="adSmdev">
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Suction power: <?php echo $spower ?> pA</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Battery life: <?php echo $batt ?> h</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Dust tank: <?php echo $dust ?> ml</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Water tank: <?php echo $water ?> ml</p>
                        </div>
                        <div class="adVehicles" id="adVehicles">
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Weight: <?php echo $weight ?> kg</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Mileage: <?php echo $mileage ?> km</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Motor power: <?php echo $power ?> W</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Battery life: <?php echo $battery ?> h</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Max weight: <?php echo $maxWeight ?> kg</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Top speed: <?php echo $speed ?> km/h</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Charge time: <?php echo $charge ?> h</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Tire diameter: <?php echo $tire ?> inch</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Color: <?php echo $color ?> </p>
                        </div>
                        <div class="adWear" id="adWear">
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Display: <?php echo $display ?> px</p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">GPS: <?php echo $gps ?> </p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Bluetooth: <?php echo $bluetooth ?> </p>
                            <p class='card-info'><img src="images\arrowhead.png" alt="arrow" class="arrow">Battery: <?php echo $battery ?> mA/h</p>
                        </div>

                    </div>
                                        
                    <div class='buttons-div'>
                        <form method='post' action='add_to_cart.php'>
                            <input type='hidden' name='product_id' value="<?php echo $prodID ?>">
                            <button class='button-cart' name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>
                            </form>
                            <form method='post' action='add_to_wish.php'>
                            <input type='hidden' name='product_id' value="<?php echo $prodID ?>">
                            <button class='button-wish' name='wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>
                            </form>
                    </div>

                </div>
            </div>
    </div>



<script>
        // Select the first image by default
        var firstImage = document.querySelector('.gallery__item img');
        firstImage.classList.add('selected');

        function expandImage(src) {
            var expandedImage = document.getElementById('expanded-image');
            expandedImage.style.opacity = '0';

            setTimeout(function() {
                expandedImage.src = src;
                expandedImage.style.opacity = '1';
            }, 300);

            // Remove the "selected" class from all images
            var galleryItems = document.querySelectorAll('.gallery__item img');
            galleryItems.forEach(function(item) {
                item.classList.remove('selected');
            });

            // Add the "selected" class to the clicked image
            var clickedImage = event.target;
            clickedImage.classList.add('selected');
        }

        // Show the first image in the expanded view by default
        expandImage('<?php echo $folder . '/' . $cover ?>');
    </script>


</body>
</html>