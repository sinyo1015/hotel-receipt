<?php
$h = "localhost";
$u = "root";
$p = "";
$db = "htl";
$connect = mysqli_connect($h,$u,$p,$db);
?>
<!doctype html>
<html>
    <head>
        <title>Dinamic Form - harviacode.com</title>
        <style>
            body{
                padding: 15px
            }
            input[type="text"]{
                margin-bottom: 0px !important;
            }
        </style>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="row-fluid">
            <div class="span6">
                <form action="index.php" method="post">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th width="300px" colspan="2">Jenis Barang</th>
                                <th width="100px" >Jumlah</th>
								<th width="100px">a</th>
								<th width="100px">b</th>
                                <th width="80px"></th>
                            </tr>
                        </thead>
                        <!--elemet sebagai target append-->
                        <tbody id="itemlist">
                            <tr>
    <td colspan="2"><select name="id" id="id" class="form-control" >
	<option value="">---PILIH BARANG--</option>
	<?php
	$p=mysqli_query($connect, "select * from item");
	while($dp=mysqli_fetch_array($p)) {
	?>
	<option name="jenis_input[0]" value="<?php echo $dp['id'];?>"><?php echo $dp['barang'];?></option>
	<?php } ?>
	</select></td>
                                <td><input name="jumlah_input[0]" class="input-block-level" /></td>
								<td><input name="a_input[0]" class="input-block-level" /></td>
								<td><input name="b_input[0]" class="input-block-level" /></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-small btn-default" onclick="additem(); return false"><i class="icon-plus"></i></button>
                                    <button name="submit" class="btn btn-small btn-primary"><i class="icon-ok"></i></button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>


            </div>
            <div class="span6">
                <p>Hasil submit bisa anda lihat di sini. Hasil ini bisa anda simpan dalam tabel atau digunakan untuk kepentingan lain.</p>
                <p>
                    <?php
                    if (isset($_POST['submit'])) {
                        $jenis = $_POST['jenis_input'];
                        $jumlah = $_POST['jumlah_input'];

                        foreach ($jenis as $key => $j) {
                            echo "<p>" . $j . " : " . $jumlah[$key] . "</p>";
                        }
                    }
                    ?>
                </p>
            </div>
        </div>
        <script>
            var i = 1;
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist');
                
//                membuat element
                var row = document.createElement('tr');
                var jenis = document.createElement('select');
                var jumlah = document.createElement('td');
				var a = document.createElement('td');
				var b = document.createElement('td');
                var aksi = document.createElement('td');

//                meng append element
                itemlist.appendChild(row);
                row.appendChild(jenis);
                row.appendChild(jumlah);
				row.appendChild(a);
				row.appendChild(b);
                row.appendChild(aksi);

//                membuat element input
                var jenis_input = document.createElement('input');
                jenis_input.setAttribute('name', 'jenis_input[' + i + ']');
                jenis_input.setAttribute('id', 'jenis_input');

                var jumlah_input = document.createElement('input');
                jumlah_input.setAttribute('name', 'jumlah_input[' + i + ']');
                jumlah_input.setAttribute('class', 'input-block-level');
				
				var a_input = document.createElement('input');
                a_input.setAttribute('name', 'a_input[' + i + ']');
                a_input.setAttribute('class', 'input-block-level');
				
				var b_input = document.createElement('input');
                b_input.setAttribute('name', 'b_input[' + i + ']');
                b_input.setAttribute('class', 'input-block-level');

                var hapus = document.createElement('span');

//                meng append element input
                jenis.appendChild(jenis_input);
                jumlah.appendChild(jumlah_input);
				a.appendChild(a_input);
				b.appendChild(b_input);
                aksi.appendChild(hapus);

                hapus.innerHTML = '<button class="btn btn-small btn-default"><i class="icon-trash"></i></button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };

                i++;
            }
        </script>
    </body>
</html>