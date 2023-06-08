<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi BG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images\logo-xiaomi.png"/>
    <link rel="stylesheet" href="nav-and-home.css?v=<?= time() ?>">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li>
                <a href="home.php" class="logo-a">
                    <div class="xiaomi-div">
                        <img src="images\mi-logo.svg" alt="logo" class="xiaomi-logo">
                    </div>
                    <span class="xlogo">XIAOMI</span>    
                </a>
            </li>

            <div class="list">
                <li>
                <form method="post" action="home.php">
                    <a href="#" class="list-a">
                        <img src="images\search.png" alt="logo" class="logo">
                        <input type="text" name="search" placeholder="Search.." class="searchbar">
                    </a> 
                    </form>
                    </li> 
                </div>

            <div class="list">
            <li>
                <a href="home.php" class="list-a"> 
                    <img src="images\home.png" alt="logo" class="logo">
                  <span class="nav-item">Home</span>
                </a>
                </li> 
            </div>

            <div class="list">
            <li>
                <a href="mobdev.php" class="list-a">
                    <img src="images\smartphone-tablet.png" alt="logo" class="logo">
                    <span class="nav-item">Mobile devices</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="vehicles.php" class="list-a">
                    <img src="images\scooter.png" alt="logo" class="logo">
                    <span class="nav-item">Vehicles</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="wearable.php" class="list-a">
                    <img src="images\watch.png" alt="logo" class="logo">
                    <span class="nav-item">Wearable</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="smdev.php" class="list-a">
                    <img src="images\lightbulb.png" alt="logo" class="logo">
                    <span class="nav-item">Smart devices</span>
                </a>
            </li>
            </div>

           
        <div class="list">
            <li>
                 <a href="<?php echo isset($_SESSION['user']) ? 'myAccount.php' : 'login-register.php'; ?>" class="list-a">
                  <img src="images\user.png" alt="logo" class="logo">
                  <span class="nav-item"><?php echo isset($_SESSION['user']) ? 'Profile' : 'Login/Register'; ?></span>
                 </a>
            </li>
            </div> 
            
        <div class="btn-div">
            <button class='btn-cart' name='cart' onclick="window.location.href='cart.php';"><i class='fa-solid fa-cart-shopping'></i></button>        
            <button class='btn-wish' name='wish' onclick="window.location.href='wishlist.php';"><i class='fa-regular fa-heart'></i></button>
        </div>

        </ul>
    </nav>

    <header class="header">
        <div class = "hamburger-icon">
            <span class="icon"></span>
            <span class="icon"></span>
            <span class="icon"></span>
        </div>

        <nav class="hamburger">
        <ul class = "hamburger-ul">
            <li class = "hamburger-li">
                <a href="home.php" class="logo-a">
                    <div class="xiaomi-div">
                        <img src="images\mi-logo.svg" alt="logo" class="xiaomi-logo">
                    </div>
                    <span class="xlogo">XIAOMI</span>    
                </a>
            </li>

            <div class="list">
                <li>
                    <a href="#" class="list-a">
                        <img src="images\search.png" alt="logo" class="logo">
                        <input type="text" placeholder="Search.." class="searchbar">
                    </a>
                    </li> 
                </div>

            <div class="list">
            <li>
                <a href="home.php" class="list-a"> 
                    <img src="images\home.png" alt="logo" class="logo">
                  <span class="nav-item">Home</span>
                </a>
                </li> 
            </div>

            <div class="list">
            <li>
                <a href="mobdev.php" class="list-a">
                    <img src="images\smartphone-tablet.png" alt="logo" class="logo">
                    <span class="nav-item">Mobile devices</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="vehicles.php" class="list-a">
                    <img src="images\scooter.png" alt="logo" class="logo">
                    <span class="nav-item">Vehicles</span>
                </a>
            </li>
            </div>

            <div class="list">
            <li>
                <a href="wearable.php" class="list-a">
                    <img src="images\watch.png" alt="logo" class="logo">
                    <span class="nav-item">Wearable</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                <a href="smdev.php" class="list-a">
                    <img src="images\lightbulb.png" alt="logo" class="logo">
                    <span class="nav-item">Smart devices</span>
                </a>
            </li>
            </div>

        <div class="list">
            <li>
                 <a href="<?php echo isset($_SESSION['user']) ? 'myAccount.php' : 'login-register.php'; ?>" class="list-a">
                  <img src="images\user.png" alt="logo" class="logo">
                  <span class="nav-item"><?php echo isset($_SESSION['user']) ? 'Profile' : 'Login/Register'; ?></span>
                 </a>
            </li>
            </div>

            
        </ul>
        </nav>

        <div class="btn-div">
            <div class="btn-div-inner">
                    <button class='btn-wish-ham' name='wish' onclick="window.location.href='wishlist.php';"><i class='fa-regular fa-heart wish-i'></i></button>
                    <button class='btn-cart-ham' name='cart'  onclick="window.location.href='cart.php';"><i class='fa-solid fa-cart-shopping cart-i'></i></button>        
            </div>
        </div>
    </header>


    <button id="openButton">Open Pop-up</button>

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

</body>
</html>