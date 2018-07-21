<?php
include "../include/db.php";
session_start();
                          if(empty($_SESSION['username'])){
                              echo "<center><br/>Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/></center>
                                      <a href='login.php?p=$p'><center>Login</center></a>";
						  exit(404);}
						  $err = "Silahkan hubungi administator";
$wut = $_GET['barang'];
mysqli_query($connect, "DELETE from item where barang='$wut'") or die(mysqli_error($connect));
echo "<script>alert('Sukses');window.location='../tambah.php';</script>";
?>