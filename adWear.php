<?php

$servername = "localhost";
$username = "root";
$password = "fyre02";
$dbname = "xiaomi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM wearable";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-item'>";
        echo "<a href='product-page.php?id=" . $row["id"] . "' class='product-link'>";  
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='wearable\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-info'>Display: " . $row["display"] . " px</p>";
        echo "<p class = 'card-info'>Battery: " . $row["battery"] . " mAh</p>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
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