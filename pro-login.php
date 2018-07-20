<?php
include "include/db.php";

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login = mysqli_query($connect, "SELECT * FROM auth WHERE user = '$username' AND pass='$pass'");
$row=mysqli_fetch_array($login);
if ($row['user'] == $username AND $row['pass'] == $pass)
{
  session_start();
  $_SESSION['username'] = $row['user'];
  $_SESSION['password'] = $row['pass'];
  header('location:index.php');
}
else
{
  echo "<script>alert('Silahkan cek kembali data login anda');history.go(-1);</script>";

}
?>
?>