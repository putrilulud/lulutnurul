<?php 
	include "../koneksi/koneksi.php";
	$proses = "DELETE FROM user WHERE id_user = '$_GET[id]'";
	$hasil = mysql_query($proses);
	if($hasil){
		echo "<script>alert('Dosen berhasil dihapus');window.location.href='../index.php?page=dosen'</script>";
	}
	
 ?>