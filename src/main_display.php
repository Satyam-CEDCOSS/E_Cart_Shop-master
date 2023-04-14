<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT `image`, `product_name`, `quantity`, `company`, `price` FROM product";

$result = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_assoc($result)) {
    array_push($_SESSION["display"],$data);
}
// print_r($_SESSION["display"]);
$txt = "";
foreach ($_SESSION["display"] as $key => $value) {
    $txt .= "<div class='col-lg-3 col-md-6 col-sm-6 d-flex'>
    <div class='card w-100 my-2 shadow-2-strong'>
      <img
        src=".$value["image"]."
        class='card-img-top'
        style='aspect-ratio: 1 / 1'
        onclick='item_display(".($key+1).")'
      />
      <div class='card-body d-flex flex-column'>
        <h5 class='card-title'>".$value["product_name"]."</h5>
        <p class='card-text'>".$value["company"]."</p>
        <p class='card-text'>$".$value["price"]."</p>
        <div
          class='card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto'
        >
          <a href='#!' class='btn btn-primary shadow-0 me-1' onclick='add_cart(".($key).")'
            >Add to cart</a
          >
          <a href='#!' class='btn btn-light border px-2 pt-2 icon-hover' onclick='add_wishlist(".($key).")'
            ><i class='fas fa-heart fa-lg text-secondary px-1'></i
          ></a>
        </div>
      </div>
    </div>
    </div>";
}
echo $txt;
?>