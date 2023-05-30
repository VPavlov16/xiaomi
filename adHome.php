<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "xiaomi";
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

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='product-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-item'>";
        echo "<a href='product-page.php?id=" . $row["id"] . "' class='product-link'>";
        echo "<h2>" . $row["Model"] . "</h2>";
        echo "<img src='homeCover\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/>";
        echo "<p class='card-price'>Price: " . $row["price"] . " лв.</p>";
        echo "</a>";
        echo "<div class='buttons-div'>";
        echo "<form method='post' action='add_to_cart.php'>"; 
        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>"; 
        echo "<button class='button-cart' name='cart'><i class='fa-solid fa-cart-shopping' style='padding-right:5px;'></i>Add to cart</button>";
        echo "</form>"; 
        echo "<button class='button-wish'><i class='fa-regular fa-heart' style='padding-right:5px;'></i>Add to wishlist</button>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No products found.";
}
$conn->close();
    

?>