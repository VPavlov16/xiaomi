<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$servername = "localhost";
$username = "root";
$password = "fyre02";
$dbname = "xiaomi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM mobdev";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<form method='post'>";
        echo "<div class='product-item'>";
        echo "<a href='product-page.php?id=" . $row["id"] . "' class='product-link'>"; 
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='mobile_devices\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-info'>Rear Camera: " . $row["rear_camera"] . "MP</p>";
        echo "<p class = 'card-info'>Front Camera: " . $row["front_camera"] . "MP</p>";
        echo "<p class = 'card-info'>Storage: " . $row["storage"] . "GB</p>";
        echo "<p class = 'card-info'>RAM: " . $row["ram"] . " GB</p>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "<form method='post' action='add_to_cart.php'>";
        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
        echo "</form>";
        echo "</a>";
        echo "<div class = 'buttons-div'>";
        echo "<button class='button' name='cart' value=".$row["id"]."><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>";
        echo "<button class='button-wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
if (isset($_POST['cart']) && isset($_SESSION['user'])) {
    $productId = $_POST['cart'];
    $userId = $_SESSION['user'][0];

    // Check if the product is already in the cart
    if (!in_array($productId, $_SESSION['user'][5])) {
        // Add the product to the user's cart array in the session
        $_SESSION['user'][5][] = $productId;
    }

    // Redirect to the same page using GET to prevent form resubmission
    header("Location: mobdev.php");
    exit;
}

$conn->close();
?>