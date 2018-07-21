<?php
include "include/db.php";
                          session_start();
                          if(empty($_SESSION['username'])){
                              echo "<center><br/>Maaf sepertinya anda belum Login,silahkan tekan link login dibawah <br/></center>
                                      <a href='login.php'><center>Login</center></a>";
                          }
						  $ui = $_GET['barang'];
						  $val = mysqli_query($connect, "SELECT * FROM item WHERE barang= '$ui'")or die(mysqli_error($connect));
                          ?>
<?php include "include/header.php";?>
			</div>
			</div>
          <div class="page-header">
		  <div class="col-lg-6">
            <form action="pro/exec_h.php" method="post">
			<script type="text/javascript" src="include/rp.js"></script>
					<div class="form-group">
					<?php $data = mysqli_fetch_array($val);?>
						<label>Nama Barang Baru</label>
						<input name="barang" type="text" class="form-control" placeholder="Nama Barang ..">
						<br>
					<label>Harga per Barang</label>
					<div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input name="harga" type="text" class="form-control" placeholder="Harga layanan .." value="<?php echo $data['harga'];?>">
					<br>
					</div>
					<br>
					<div class="form-group">
					<label>Nama Barang Lama</label>
						<input name="barang1" type="text" class="form-control" readonly="readonly" value="<?php echo $data['barang'];?>">
						</div>
                  					

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
<?php include "include/footer.php";?>