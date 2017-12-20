<?php
include "../koneksi/koneksi.php";

if($_POST['status'] == "Dosen"){
	$edit= mysql_query("UPDATE user SET nama='$_POST[nama]', username='$_POST[username]', password='$_POST[password]', email='$_POST[email]', id_matkul ='$_POST[matkul]' WHERE id_user='$_POST[id_user]'");
	if($edit){
	echo"<script>alert('Selamat, Data dosen berhasil diedit');window.location.href='../index.php?module=dosen#pos';</script>";
	}
}

if($_POST['status'] == "Mahasiswa"){
	$edit  = mysql_query("UPDATE user SET nama='$_POST[nama]', username='$_POST[username]', password='$_POST[password]', email='$_POST[email]', id_matkul = null WHERE id_user='$_POST[id_user]'");
	$edit2 = mysql_query("UPDATE mhs SET nama_mhs='$_POST[nama]', fakultas='$_POST[fakultas]', jurusan ='$_POST[jurusan]', id_dosen='$_POST[dosen]' WHERE id_mhs='$_POST[id_user]'");

	if($edit && $edit2){
	echo"<script>alert('Selamat, Data mahasiswa berhasil diedit');window.location.href='../index.php?module=mahasiswa#pos';</script>";
	}
}

if($_POST['status'] == "Matkul"){
	$edit= mysql_query("UPDATE matkul SET nama_matkul='$_POST[nama]', sks='$_POST[sks]' WHERE id_matkul='$_POST[id_matkul]'");
	if($edit){
	echo"<script>alert('Selamat, Data matkul berhasil diedit');window.location.href='../index.php?module=matkul#pos';</script>";
	}
}

mysql_close();
?>