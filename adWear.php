<?php

$servername = "localhost";
$username = "root";
$password = "123456789";
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
       // echo "<a href='product-details.php?id=" . $row["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='wearable\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-info'>Display: " . $row["display"] . " px</p>";
        echo "<p class = 'card-info'>Battery: " . $row["battery"] . " mAh</p>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "</div>";
        echo "</a>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
?>