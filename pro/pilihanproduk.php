<?php 	

require_once '../include/db.php';

$productId = $_GET['id'];

$sql = "SELECT barang, harga FROM item WHERE id = $productId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
?>