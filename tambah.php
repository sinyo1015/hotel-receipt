<?php
include "include/db.php";
                          session_start();
						  $siapa = $_SESSION['username'];
                          if(empty($_SESSION['username'])){
                              echo "<center><br/>Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/></center>
                                      <a href='login.php'><center>Login</center></a>";
                          }else{
                              echo "";
                          }
                          
						  ///thot begone///
						  //isi default
$item = '';
$harga = array();

//error
$error_item = '';
$error_harga = '';

//jika form disumbit
if (isset($_POST['submit'])) {
    $item = isset($_POST['item']) ? $_POST['item'] : '';
    $harga = isset($_POST['harga_input']) ? $_POST['harga_input'] : array();
    
//    harga item tidak boleh kosong
    if ($item == '') {
        $error_item = 'harga item tidak boleh kosong';
    }

//    harga harus diisi
    $harga_kosong = 0;
    foreach ($harga as $key => $n) {
        if ($n == '') {
            $harga_kosong++;
        }
    }
    if ($harga == array() OR $harga_kosong > 0) {
        $error_harga = 'harga anggota tidak boleh kosong';
    }
    
//    jika validasi lolos, masukkan ke database
    if ($error_item == '' && $error_harga == '') {
        include 'koneksi.php';
//        masukkan harga item ke tabel item
        mysql_query("INSERT INTO item (harga_item) VALUES ('$item')");
        
//        masukkan harga anggota item
//        note : ini bukan cara yg bagus buat menangkap id, seharusnya ada kode item sehingga tidak ada peluang salah ambil id
//               dalam contoh ini saya gunakan id agar lebih mudah saja 
        $result = mysql_query("SELECT MAX(id_item) as id_terakhir FROM item");
        $row = mysql_fetch_assoc($result);
        $id_item_fk = $row['id_terakhir'];
        
//        masukkan harga anggota
        foreach ($harga as $key => $n) {
            mysql_query("INSERT INTO anggota (id_item_fk,harga_anggota) VALUES ('$id_item_fk','$n')");
        }
        
//        redirect ke tabel item
        echo '<script>window.location="index.php"</script>';
    }
    
    
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Theme Preview - Usebootstrap.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="theme/bootstrap.css" media="screen">
    <link rel="stylesheet" href="theme/usebootstrap.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="http://usebootstrap.com/" class="navbar-brand">UseBootstrap</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          
		  
		  
		  <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php">Logout</a></li>
			</div>
<div class="row-fluid">
            <div class="span6">
                <form action="tambah.php" method="post">
                    <label>Nama Kelas <span style="color: red"><?php echo $error_kelas ?></span></label>
                    <input type="text" name="kelas" value="<?php echo $kelas; ?>" />
                    <label>Anggota <span style="color: red"><?php echo $error_nama ?></span> <a onclick="additem();
                            return false">Tambah</a></label>
                    <table class="table table-condensed">
                        <!--elemet sebagai target append-->
                        <tbody id="itemlist">
                            <?php
                            /* DISINI SEDIKIT TRICKY
                             * ini untuk menampilkan isian yang telah diinputkan sebelumnya
                            tanpa ini inputan yang udah diinput akan hilang karena DOM hanya dimodifikasi
                            sebelum form disubmit, saat disubmit DOM akan kembali ke awal, oleh karena itu
                            kita perlu 'menangkap' inputan pada nama dan membuat baris tabel berdasarkan
                            inputan yang tadi disubmit */
                            $i = 0;
                            foreach ($nama as $key => $j) {
                                ?>
                                <tr id="<?php echo $key . 'tr' ?>"> 
                                    <td><input name="nama_input[<?php echo $key ?>]" class="input-block-level" value="<?php echo $j ?>" /></td>
                                    <td width="50px"><?php echo '<a onclick="busek(' . $key . '); return false;" id="' . $key . '">hapus</a>' ?></td>
                                </tr>
                                <?php
                                $i = $key;
                            }
                            ?>
                        </tbody>
                    </table>
                    <button name="submit" class="btn btn-small btn-primary">Simpan</button>
                </form>        
            </div>
        </div>
        <script>
            var i = "<?php echo $i + 1; ?>";
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist');

//                membuat element
                var row = document.createElement('tr');
                var nama = document.createElement('td');
                var aksi = document.createElement('td');
                aksi.setAttribute('width', '50px');

//                meng append element
                itemlist.appendChild(row);
                row.appendChild(nama);
                row.appendChild(aksi);

//                membuat element input
                var nama_input = document.createElement('input');
                nama_input.setAttribute('name', 'nama_input[' + i + ']');
                nama_input.setAttribute('class', 'input-block-level');

                var hapus = document.createElement('span');

//                meng append element input
                nama.appendChild(nama_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<a>hapus</a>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
            }

            function busek(id) {
                var ele = id + 'tr';
                var elem = document.getElementById(ele);
                return elem.parentNode.removeChild(elem);
            }
            ;
        </script>


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/usebootstrap.js"></script>
  </body>
</html>