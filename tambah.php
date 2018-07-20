<?php
include "include/db.php";
$p = "tambah";
                          
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
			</div>
			</div>
			<div class="page-header">
			<?php
			session_start();
                          if(empty($_SESSION['username'])){
                              echo "<center><br/>Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/></center>
                                      <a href='login.php?p=$p'><center>Login</center></a>";
									  exit(404);
                          }?>
          <div class="col-lg-6">
            <form action="tambah_b.php" method="post">
			<script type="text/javascript" src="include/rp.js"></script>
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="barang" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					
					<label>Harga Barang</label>
					<div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input name="harga" type="text" class="form-control" placeholder="Harga layanan ..">
                  </div>					

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
			
          </div>
		  </div>
		  
        


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/usebootstrap.js"></script>
  </body>
</html>