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
       // echo "<a href='product-details.php?id=" . $row["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='mobile_devices\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-info'>Rear Camera: " . $row["rear_camera"] . "MP</p>";
        echo "<p class = 'card-info'>Front Camera: " . $row["front_camera"] . "MP</p>";
        echo "<p class = 'card-info'>Storage: " . $row["storage"] . "GB</p>";
        echo "<p class = 'card-info'>RAM: " . $row["ram"] . " GB</p>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "<button class='button button2'>Add to cart</button>";
        echo "</div>";
        echo "</a>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
?>