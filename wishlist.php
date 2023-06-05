<?php
session_start();
require("nav.php");
require("info.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <style>
    .product-list {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    table {
      border-collapse: collapse;
      width: 80%;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    .product-image {
      width: 80px;
    }
    .product-link {
      text-decoration: none;
      color: #333;
    }
    .product-model {
      font-weight: bold;
    }
    .card-price {
      font-weight: bold;
    }
    .total-price {
      margin-top: 20px;
      text-align: right;
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="product-list">
  <?php
  if (isset($_SESSION['user'])){
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $wishIds = $_SESSION['user']['wish'];

  $itemDetails = array();
  $totalPrice = 0;

  foreach ($wishIds as $id) {
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
      echo "<table>";
      echo "<tr><th>Model</th><th>Image</th><th>Price</th></tr>";
      foreach ($itemDetails as $row) {
          echo "<tr>";
          echo "<td><a href='product-page.php?id=" . $row["id"] . "' class='product-link'><span class='product-model'>" . $row["Model"] . "</span></a></td>";
          echo "<td><img src='homeCover\\" . $row['pic'] . "' alt='" . $row['Model'] . "' class='product-image'/></td>";
          echo "<td class='card-price'>" . $row["price"] . " BGN</td>";
          echo "</tr>";
      }
      echo "<tr><td colspan='2'></td><td class='total-price'>Total Price: " . $totalPrice . " BGN</td></tr>";
      echo "</table>";
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
