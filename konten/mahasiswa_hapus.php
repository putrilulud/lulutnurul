<?php 
	include "../koneksi/koneksi.php";
	$proses  = mysql_query("DELETE FROM user WHERE id_user = '$_GET[id]'");
	$proses2 = mysql_query("DELETE FROM mhs WHERE id_mhs = '$_GET[id]'");
	if($proses && $proses2){
		echo "<script>alert('Mahasiswa berhasil dihapus');window.location.href='../index.php?module=Mahasiswa#pos'</script>";
	}
	
 ?>