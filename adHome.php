<?php
$servername = "localhost";
$username = "root";
$password = "fyre02";
$dbname = "xiaomi";
$search = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $search = $_POST["search"];
}
if($search == ""){
    $limit = 5;
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

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<a href='product-page.php?id=" . $row["id"] . "' class='product-link'>"; 
        echo "<div class='product-item'>";
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='homeCover\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class = 'card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "<button class='button button2'><i class='fa-solid fa-cart-shopping' style='padding-right:10px;'></i>Add to cart</button>";
        echo "</div>";
        echo "</a>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
    

?>