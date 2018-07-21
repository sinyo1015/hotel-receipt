<?php
include "include/db.php";
                          session_start();
						  $siapa = $_SESSION['username'];
                          if(empty($_SESSION['username'])){
                              echo "<center><br/>Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/></center>
                                      <a href='login.php'><center>Login</center></a>";
                          }else{
                              echo "<center>Selamat datang,<b> $siapa </b><br/></center>";
                          }
                          ?>
<?php include "include/header.php";?>
<?php include "include/footer.php";?>


    