<?php
include "include/db.php";
$barang = $_POST['barang'];
$harga = $_POST['harga'];
$ayy = mysqli_query($connect, "Insert into item (`barang`, `harga`) values('$barang', '$harga')");
if ($ayy) {
        echo "<script>alert('Barang $barang dengan harga $harga berhasil dimasukkan')</script>";
        echo "<meta http-equiv='refresh' content='0; url=tambah.php'>";
    } else {
        Echo "<script>alert('Data sudah ada, silahkan coba yang lain')</script>".mysqli_error($connect);
        echo "<script>window.location='tambah.php'</script>";
    }
	?>