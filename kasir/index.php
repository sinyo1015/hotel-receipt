<?php
$h = "localhost";
$u = "root";
$p = "";
$db = "htl";
$connect = mysqli_connect($h,$u,$p,$db);
?>
<tbody>
  <tr>
    <th>Item</th>
    <th colspan="2"><select name="id" id="id" class="form-control" >
	<option value="">---PILIH BARANG--</option>
	<?php
	$p=mysqli_query($connect, "select * from item");
	while($dp=mysqli_fetch_array($p)) {
	?>
	<option value="<?php echo $dp['id'];?>"><?php echo $dp['barang'];?></option>
	<?php } ?>
	</select></th>
	<input type="text" name="rate[]" id="harga" autocomplete="off" disabled="true" class="form-control" onkeyup="sum();"/>
	<input type="text" name="rate[]" id="banyak" autocomplete="off"  class="form-control" onkeyup="sum();"/>
	<input type="text" name="rate[]" id="jumlah" autocomplete="off" disabled="true" class="form-control" />
	<input type="button" value="Delete" class="del"/>
	<button id="btnAddRow" type="button">
    
</button>
  </tr>
  </tbody>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  
  
  
  
  
  
  
  
  
  
  <script type="text/javascript">
$(document).ready(function(){
$("#id").click(function(){
	var id=$("#id").val();
	$.ajax({
		url:"p.php",
		data:"id="+id,
		success:function(value){
			var data = value.split(",");
			$("#barang").val(data[0]);
			$("#harga").val(data[1]);
			
			
		
			
			}
		
		
		});
	
	});
	});
	function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('banyak').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('jumlah').value = result;
      }
}


// Add button Delete in row
$('tbody tr')
    .find('#jumlah')
    //.append('<input type="button" value="Delete" class="del"/>')
    .parent() //traversing to 'tr' Element
    .append('<input type="button" value="Delete" class="del"/>');

// Add row the table
$('#btnAddRow').on('click', function() {
    var lastRow = $('#tblAddRow tbody tr:last').html();
    //alert(lastRow);
    $('#tblAddRow tbody').append('<tr>' + lastRow + '</tr>');
    $('#tblAddRow tbody tr:last input').val('');
});
</script>