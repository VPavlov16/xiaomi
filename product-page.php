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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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
    <div id="overlay"></div>
    <div id="popupWrapper">
        <div id="popupContent">
            <h2>PLEASE LOGIN FIRST</h2>
            <p>If you don't have an account register <a href="login-register.php">here</a>.</p>
            <button id="closeButton">Close</button>
        </div>
    </div>


    <script>


    const hamburgerMenu = document.querySelector('.hamburger-icon');
    const navbar = document.querySelector('.hamburger');

        hamburgerMenu.addEventListener('click', function() {
        hamburgerMenu.classList.toggle('active');
    });


        const openButton = document.getElementById('openButton');
        const closeButton = document.getElementById('closeButton');
        const overlay = document.getElementById('overlay');
        const popupWrapper = document.getElementById('popupWrapper');

        openButton.addEventListener('click', openPopup);
        closeButton.addEventListener('click', closePopup);
        overlay.addEventListener('click', outsideClick);

        function openPopup() {
        overlay.style.opacity = '1';
        overlay.style.visibility = 'visible';

        popupWrapper.style.opacity = '1';
        popupWrapper.style.visibility = 'visible';
        }

        function closePopup() {
        overlay.style.opacity = '0';
        overlay.style.visibility = 'hidden';

        popupWrapper.style.opacity = '0';
        popupWrapper.style.visibility = 'hidden';
        }

        function outsideClick(e) {
        if (e.target === overlay) {
            closePopup();
        }
        }


</script>

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


        <div class="gallery-swipe ">
            <div class="swiper-container">

               
                    <div class="swiper-wrapper">  

                        <div class="swiper-slide">
                            <img src="<?php echo $folder . '/' . $cover ?>" alt="Image 1">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo $folder . '/' . $pic1 ?>" alt="Image 2">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo $folder . '/' . $pic2 ?>" alt="Image 3">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo $folder . '/' . $pic3 ?>" alt="Image 4">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?php echo $folder . '/' . $pic4 ?>" alt="Image 5">
                        </div> 

                    </div>                        
                    
                    <div class="pagination-prev-outer">
                        <div class="pagination-prev"><img src="images\next.png" alt=""></div>
                    </div>

                    <div class="pagination-next-outer">
                        <div class="pagination-next"><img src="images\next.png" alt=""></div>
                    </div>

                    <div class="pagination-outer">
                        <div class="swiper-pagination"></div>
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
                    <?php
                    echo "<div class='buttons-div'>";
                    if(isset($_SESSION['user'])){
                    echo "<form method='post' action='add_to_cart.php'>"; 
                    echo "<input type='hidden' name='product_id' value='" . $prodID . "'>"; 
                    echo "<button class='button-cart' name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>";
                    echo "</form>"; 
                    echo "<form method='post' action='add_to_wish.php'>"; 
                    echo "<input type='hidden' name='product_id' value='" . $prodID . "'>"; 
                    echo "<button class='button-wish' name='wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>";
                    echo "</form>";    
                    } else {
                        echo "<button class='button-cart' onclick=\"openPopup()\" name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>";
                        echo "<button class='button-wish' onclick=\"openPopup()\" name='wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>";
                    }
                    echo "</div>";
                    ?>
                </div>
            </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>

        
    var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.pagination-next',
        prevEl: '.pagination-prev',
    },
    loop: true,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    });


//-------------------------------------------------------------------------------//

                
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