<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "xiaomi";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM xiaomi.mobdev
order by RAND()
LIMIT 3;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 class='title'>Mobile devices</h2>";
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<a href='product-page.php?id=" . $row["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='mobile_devices\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "<button class='button button2'>Add to cart</button>";
        echo "</div>";
        echo "</a>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$sql2 = "SELECT * FROM xiaomi.smart_devices
order by RAND()
LIMIT 3;";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    echo "<h2 class='title'>Smart devices</h2>";
    echo "<div class='product-list'>";
    while ($row2 = $result2->fetch_assoc()) {
        echo "<a href='product-page.php?id=" . $row2["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row2["Model"] . "</h2>";
        echo "<img src='smart devices\\" . $row2['pic'] . "' alt='" . $row2['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-price'>Price: " . $row2["price"] . " лв.</p>";
        echo "<button class='button button2'>Add to cart</button>";
        echo "</div>";
        echo "</a>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$sql3 = "SELECT * FROM xiaomi.vehicles
order by RAND()
LIMIT 3;";

$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    echo "<h2 class='title'>Vehicles</h2>";
    echo "<div class='product-list'>";
    while ($row3 = $result3->fetch_assoc()) {
        echo "<a href='product-page.php?id=" . $row3["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row3["Model"] . "</h2>";
        echo "<img src='vehicles\\" . $row3['pic'] . "' alt='" . $row3['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-price'>Price: " . $row3["price"] . " лв.</p>";
        echo "<button class='button button2'>Add to cart</button>";
        echo "</div>";
        echo "</a>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$sql4 = "SELECT * FROM xiaomi.wearable
order by RAND()
LIMIT 3;";

$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    echo "<h2 class='title'>Wearable</h2>";
    echo "<div class='product-list'>";
    while ($row4 = $result4->fetch_assoc()) {
        echo "<a href='product-page.php?id=" . $row4["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row4["Model"] . "</h2>";
        echo "<img src='wearable\\" . $row4['pic'] . "' alt='" . $row4['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-price'>Price: " . $row4["price"] . " лв.</p>";
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