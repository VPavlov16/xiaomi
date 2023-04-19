<?php

$servername = "localhost";
$username = "root";
$password = "123456789";
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
        echo "<div class='product-item'>";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<img src='vehicles\\" . $row['pic'] . "' alt='" . $row['title'] . "' class='product-image'/>";
        echo "<p>Motor power: " . $row["motorPower"] . "W</p>";
        echo "<p>Top speed: " . $row["topSpeed"] . " km/h</p>";
        echo "<p>Price: " . $row["price"] . " лв.</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}

$conn->close();
?>