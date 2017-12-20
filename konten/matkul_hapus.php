<?php 
	include "../koneksi/koneksi.php";
	$proses  = mysql_query("DELETE FROM matkul WHERE id_matkul = '$_GET[id]'");
	if($proses){
		echo "<script>alert('Mata Kuliah berhasil dihapus');window.location.href='../index.php?module=matkul#pos'</script>";
	}
	
 ?>