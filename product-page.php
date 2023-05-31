<!DOCTYPE html>
<html>
<head>
    <title>Product name</title>
    <link rel="stylesheet" type="text/css" href="product-page.css">
</head>
<body>
    <?php
        require('nav.php');
    ?>
<div class="product-page">

    <div class="gallery">
        <img src="vehicles\4ProBG.png" alt="img" class = "trota">
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
                <h1 class = "product-name">Product Name</h1>
                <h2 class = "price">XX.XX BGN</h2>
                <p calss = "product-description">Description of the product goes here. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga deleniti, deserunt obcaecati, quo doloribus atque, laudantium explicabo illum cumque alias voluptas molestias repellendus nobis incidunt voluptate facere recusandae. Explicabo, error!</p>
                <button class='button-cart' name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>
                <button class='button-wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>
            </div>
        </div>

</body>
</html>