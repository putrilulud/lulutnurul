<h1 style="text-align: center;"><br></br><br>Input Nilai</br></h1><br/>
	<form method="POST" action="konten/input_proses.php">
	
	<table  style="margin: 0 auto; " >
	<?php
	include "koneksi/koneksi.php";
	$dosen = $_SESSION['id'];
	$hasil = mysql_query("SELECT * FROM mhs JOIN user on mhs.id_mhs = user.id_user WHERE id_dosen = '$dosen' ORDER BY id_user"); ?>
	<tr>
	<td>Mahasiswa/i</td><td>:</td><td><select name="pilih_siswa" ><?php
	while($aray = mysql_fetch_array($hasil)){?>
			<option value="<?php echo $aray['id_user'];?>"><?php echo $aray['nama'];?></option>
	<?php } ?>
		</select></th>
	</tr>
	<tr >    	
	    <td>FORMATIF</td>
		<td>:</td>
		<td><input id="FORMATIF" type="text" name="formatif" value="0" required/></td></tr>
	<tr>
	    <td>UTS</td>
	    <td>:</td>
		<td><input id="UTS" type="text" name="uts" value="0" required/></td></tr>
	<tr>
	    <td>UAS</td>
	    <td>:</td>
		<td><input id="UAS" type="text" name="uas" value="0"  required/></td>	 </tr> 
	<script src="js/jquery-1.9.0.min.js"></script>
	<script> 
		function lihatnilai(){
		var forma = $("#FORMATIF").val(); 
		var uts = $("#UTS").val(); 
		var uas = $("#UAS").val();
		var nilai = (parseInt(forma)*.3) + (parseInt(uts)*.3) + (parseInt(uas)*.4);
    	$("#NilaiAkhir").val(Math.round(nilai));
		}
		$(document).ready(function(){
		$('#FORMATIF').keyup(lihatnilai);
		$('#UTS').keyup(lihatnilai);
		$('#UAS').keyup(lihatnilai);
		});
	</script>  <tr>
	    <td>NILAI AKHIR</td>   
	    <td>:</td>
		<td><input id="NilaiAkhir" type="text" name="nilaiakhir" style="background-color: #D2E9ED; color: black;" readonly /></td></tr>
	<tr><td></td>
		<td colspan="3"><input type="submit" name="kirim" value="Simpan" style="background-color:white"/></td></tr>
	</table>
	
	</form>


