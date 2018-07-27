<?php 
$h = "localhost";
$u = "root";
$p = "";
$db = "htl";
$connect = mysqli_connect($h,$u,$p,$db);
$term = $_GET['term'];
// buat database dan table provinsi
$query = "SELECT * FROM item WHERE item LIKE '%$term%' LIMIT 5";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_array($result))
{
    $data[] = array('id'=>$row['id'],'label'=>$row['barang'],'value'=>$row['harga']);
}
echo json_encode($data);
?>