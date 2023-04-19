<?php

$servername = "localhost";
$username = "root";
$password = "fyre02";
$dbname = "xiaomi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM vehicles";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<a href='product-details.php?id=" . $row["id"] . "' class='product-link'>"; // Add product link with product id as query parameter
        echo "<div class='product-item'>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<img src='vehicles\\" . $row['pic'] . "' alt='" . $row['title'] . "' class='product-image'/>";
        echo "<p class = 'card-info'>Motor power: " . $row["motorPower"] . "W</p>";
        echo "<p class = 'card-info'>Top speed: " . $row["topSpeed"] . " km/h</p>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "</div>";
        echo "</a>"; // Close product link
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
?>