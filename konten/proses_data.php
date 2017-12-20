<?php 

	include "../koneksi/koneksi.php";

	$query = "INSERT INTO user (jumlah)
				values ('$_POST[idb]','$_POST[namab]','$_POST[jumlah]')";
	
	if(!mysql_query($query)){
		die(mysql_error());
	}
	else{
		echo "<script>alert('Data Anda berhasil terdaftar!');window.location.href='operator.php';</script>";
	}

 ?>