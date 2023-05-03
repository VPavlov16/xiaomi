<?php

$servername = "localhost";
$username = "root";
$password = "123456789";
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
        echo "<button class='button'><i class='fa-solid fa-cart-shopping' style='padding-right:10px;'></i>Add to cart</button>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
?>