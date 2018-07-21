<?php
include "../include/db.php";
session_start();
                          if(empty($_SESSION['username'])){
                              echo "<center><br/>Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/></center>
                                      <a href='login.php?p=$p'><center>Login</center></a>";
						  exit(404);}
$eb = $_POST['barang'];
$eh = $_POST['harga'];
$eb1 = $_POST['barang1'];
mysqli_query($connect, "UPDATE item SET barang='$eb', harga='$eh' WHERE barang='$eb1'") or die(mysqli_error("Error, please contact administrator"));
echo "<script>alert('Sukses');window.location='../tambah.php';</script>";

?>