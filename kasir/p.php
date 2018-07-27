<?php 
$h = "localhost";
$u = "root";
$p = "";
$db = "htl";
$connect = mysqli_connect($h,$u,$p,$db);
$id=$_GET['id'];
$query=mysqli_query($connect, "select * from item where id='$id'");
$fe=mysqli_fetch_array($query);
$barang=$fe['barang'];
$harga=$fe['harga'];

 
echo $barang.",".$harga;
 
?>