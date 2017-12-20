<?php
	include "koneksi/koneksi.php";
	session_start();
	
	if(isset($_SESSION['id'])) { header("location: index.php"); }
	
	$proses = "SELECT * FROM user WHERE (username='$_POST[username]') and (password='$_POST[password]')";
	$hasil  = mysql_query($proses);

	if(mysql_num_rows($hasil)>0){
		$aray=mysql_fetch_array($hasil);
		$_SESSION['username'] = $aray['username'];
		$_SESSION['status']	  = $aray['status'];
		$_SESSION['id']		  = $aray['id_user'];
		$_SESSION['nama']	  = $aray['nama'];

			if($aray['status']=="Dosen"){
				echo"<script>alert('Login Berhasil');window.location.href='index.php';</script>";
			}
			else if($aray['status'] == "Admin"){
				echo"<script>alert('Login Berhasil');window.location.href='index.php';</script>";
			}	
			else if($aray['status'] == "Mahasiswa"){
				echo"<script>alert('Login Berhasil');window.location.href='index.php';</script>";
			}
			}
			else{
					echo "<script>alert('Login Gagal');window.location.href='index.php';</script>";
				}
	  ?>