<?php
require("info.php");
$search = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $search = $_POST["search"];
}
if($search == ""){
    $limit = 6;
}else{
    $limit = 100;
}


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM (
    SELECT id, Model, price, pic FROM xiaomi.mobdev
    WHERE Model LIKE '%" . $search . "%'
    ORDER BY RAND()
    LIMIT ".$limit."
) AS t1
UNION ALL
SELECT * FROM (
    SELECT id, Model, price, pic FROM xiaomi.smart_devices
    WHERE Model LIKE '%" . $search . "%'
    ORDER BY RAND()
    LIMIT ".$limit."
) AS t2
UNION ALL
SELECT * FROM (
    SELECT id, Model, price, pic FROM xiaomi.vehicles
    WHERE Model LIKE '%" . $search . "%'
    ORDER BY RAND()
    LIMIT ".$limit."
) AS t3
UNION ALL
SELECT * FROM (
    SELECT id, Model, price, pic FROM xiaomi.wearable
    WHERE Model LIKE '%" . $search . "%'
    ORDER BY RAND()
    LIMIT ".$limit."
) AS t4;";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
<?php
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-item'>";
        echo "<a href='product-page.php?id=" . $row["id"] . "' class='product-link'>";
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='homeCover\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class='card-price'>Price: " . $row["price"] . " BGN</p>";
        echo "</a>";
        echo "<div class='buttons-div'>";
        if(isset($_SESSION['user'])){
        echo "<form method='post' action='add_to_cart.php'>"; 
        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>"; 
        echo "<button class='button-cart' name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>";
        echo "</form>"; 
        echo "<form method='post' action='add_to_wish.php'>"; 
        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>"; 
        echo "<button class='button-wish' name='wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>";
        echo "</form>";    
        } else {
            echo "<button class='button-cart' onclick=\"openPopup()\" name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>";
            echo "<button class='button-wish' onclick=\"openPopup()\" name='wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>";
        }
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
    

?>
