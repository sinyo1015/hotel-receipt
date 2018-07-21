<?php
include "include/db.php";
$p = "tambah";
                          
                          ?>
<?php include "include/header.php";?>
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
					
					<label>Harga per Barang</label>
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

			<div class="col-lg-12">
            <h2>Daftar Harga</h2>
          </div>
			<?php
			//membuat query membaca record dari tabel User    
 $query="SELECT * FROM item";    

 //menjalankan query    
 if (mysqli_query($connect,$query)) {    
 $result=mysqli_query($connect,$query);    
 } else die ("Error menjalankan query". mysqli_error($connect));    

 //mengecek record kosong    
 if (mysqli_num_rows($result) > 0)    
 {    
   //membuat tabel dan heading  
   echo "<table class='table table-striped table-hover'>";
	echo "<thead>";
   echo "<tr class='warning'>";  
   echo "<th>Nama Barang</th>";  
   echo "<th>Harga Per Barang</th>";  
   echo "<th><center>Aksi</th>";
   echo "<th> </center></th>";
   echo "<thead>";
   echo "</tr>";  

   //menampilkan hasil query    
      while($row = mysqli_fetch_assoc($result)) {
		echo "<tbody>";
           echo "<tr class='success'>";  
           echo "<td>".$row["barang"]."</td>";    
           echo "<td><a>Rp. ".$row["harga"]."</a></td>";
			echo "<td><a href='edit_h.php?barang=$row[barang]'>Edit</a></td>";
			echo "<td><a onclick='return konfirmasi()' href='pro/hapus_h.php?barang=$row[barang]' class=del>Hapus</a></td>";
			echo "</tr>"; 
			echo "</tbody>";		   
   }  
   echo "</table>";  
 }    
 else echo "Tidak ada Record didalam tabel";    

 ?>  
          </div>
		  </div>
		  
        


    <script src="include/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" language="JavaScript">
function konfirmasi()
{
tanya = confirm("Anda Yakin Akan Menghapus Data ?");
if (tanya == true) return true;
else return false;
}

</script>
    <script src="bootstrap/bootstrap.min.js"></script>
	<script src="bootstrap/usebootstrap.js"></script>
  </body>
</html>