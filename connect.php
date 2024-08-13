<?php
$server = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($server, $username, $password);

if (!$conn) {
    die("Connection failed due to" . mysqli_connect_error());
}

// echo "connection successful";

$id = $_POST['id'];
$category = $_POST['category'];
$type = $_POST['type'];
$color = $_POST['color'];
$brand = $_POST['brand'];
$gender = $_POST['gender'];
$size = $_POST['size'];
$cost = $_POST['cost'];
$selling = $_POST['selling'];
$qty = $_POST['qty'];


// $query = "SELECT sup_id FROM `project`.`supplier` ORDER BY RAND() LIMIT 1";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);
// $sup_id = $row['sup_id'];
$query = "SELECT sup_id FROM `project`. supplier ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("No supplier found");
}

$sup_id = $row['sup_id'];

$sql = "INSERT INTO `project`.`product` (`prod_id`, `prod_category`, `prod_type`, `prod_color`, `prod_brand`, `prod_gender`, `prod_size`, `cost_price`, `selling_price`, `qty`) 
VALUES ('$id', '$category', '$type', '$color', '$brand', '$gender', '$size', '$cost', '$selling', '$qty');";
// $fr=(`project`.`product` CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`));



if ($conn->query($sql) == true) {
    echo "Inserted Successfully";
} else {
    echo "error : $sql <br> $conn->error";
}

$conn->close();




?>