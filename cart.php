<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require("nav.php");
require("info.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <link rel="stylesheet" href="cart-wish.css">
</head>
<body>
<div class="product-list">
  <?php
  if (isset($_SESSION['user'])){
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $cartIds = $_SESSION['user']['cart'];

  $itemDetails = array();
  $totalPrice = 0;

  foreach ($cartIds as $id) {
      $sql = "SELECT * FROM (
          SELECT id, Model, price, pic FROM xiaomi.mobdev
          WHERE id = " . $id . "
      ) AS t1
      UNION ALL
      SELECT * FROM (
          SELECT id, Model, price, pic FROM xiaomi.smart_devices
          WHERE id = " . $id . "
      ) AS t2
      UNION ALL
      SELECT * FROM (
          SELECT id, Model, price, pic FROM xiaomi.vehicles
          WHERE id = " . $id . "
      ) AS t3
      UNION ALL
      SELECT * FROM (
          SELECT id, Model, price, pic FROM xiaomi.wearable
          WHERE id = " . $id . "
      ) AS t4;";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $itemDetails[] = $row;
              // Calculate the total price
              $totalPrice += $row["price"];
          }
      }
  }

  if (!empty($itemDetails)) {
    echo "<div class='container-table'>";
      echo "<table class = 'cart-table'>";
      echo "<div class ='tr-heading'><tr><th>Model</th><th></th><th>Price</th><th></th></tr></div>";
      foreach ($itemDetails as $row) {
          echo "<tr>";
          echo "<td><a href='product-page.php?id=" . $row["id"] . "' class='product-link'><span class='product-model'>" . $row["Model"] . "</span></a></td>";
          echo "<td><img src='homeCover\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/></td>";
          echo "<td class='card-price'>" . $row["price"] . " BGN</td>";
          echo "<td>";
          echo "<form method='post' action='removeCart.php'>";
          echo "<button name='remove' value = '".$row['id']."' class='button-cart'><img src='images/recycle-bin2.png' alt='bin'>
          </button>";
          echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>"; 
          echo "</form>";
          echo "</td>";
          echo "</tr>";
      }
      echo "<tr><td colspan='2'></td><td class='total-price'>Total Price: " . $totalPrice . " BGN</td></tr>";
      echo "</table>";
      echo "</div>";

     ?>
    <div class="button-container">
      <button onclick="window.location.href='finishOrder.php'" class='button-cart'>Finish order</button>
    </div>     
    <?php
  } else {
      echo "No products found.";
  }


  $conn->close();
}else{
  echo "<h1>LOGIN FIRST</h1>";
}
  ?>
</div>
</body>
</html>
