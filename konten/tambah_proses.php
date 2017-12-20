<?php
include "../koneksi/koneksi.php";

if(isset($_POST['id_user'])){
$query = mysql_query("SELECT * FROM user WHERE id_user = '$_POST[id_user]'");
if(mysql_num_rows($query) > 0){ echo "<script>alert('Gagal input ID sudah terpakai!');window.location.href='tambah.php?status=dosen&mode=baru';</script>"; }
}

if($_POST['status'] == "Dosen"){
	$mysql = mysql_query("INSERT INTO user
	(id_user, nama, username, password, email, status, id_matkul) VALUES
	('$_POST[id_user]', '$_POST[nama]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[status]',$_POST[matkul])");
	if($mysql){
		echo"<script>alert('Selamat, Data dosen berhasil diinput');window.location.href='../index.php?module=dosen#pos';</script>";
	}
}

if($_POST['status'] == "Mahasiswa"){
	if(strlen($_POST['id_user']) != 14){
		echo"<script>alert('NIM harus 14 karakter');window.location.href='tambah.php?status=mahasiswa&mode=baru';</script>";
	}
	
	$mysql = mysql_query("INSERT INTO user
	(id_user, nama, username, password, email, status, id_matkul) VALUES
	('$_POST[id_user]','$_POST[nama]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[status]',null)");

	$mysql2 = mysql_query("INSERT INTO mhs 
	(id_mhs, nama_mhs, fakultas, jurusan, id_dosen) VALUES
	('$_POST[id_user]','$_POST[nama]','$_POST[fakultas]','$_POST[jurusan]','$_POST[dosen]')");
	
	if($mysql && $mysql2){
		echo"<script>alert('Selamat, Data mahasiswa berhasil diinput');window.location.href='../index.php?module=mahasiswa#pos';</script>";
	}
}

if($_POST['status'] == "Matkul"){
	$matkul = strtoupper($_POST['nama']);
	$mysql = mysql_query("INSERT INTO matkul (nama_matkul, sks) VALUES ('$matkul', '$_POST[sks]')");
	if($mysql){
		echo"<script>alert('Selamat, Data matkul berhasil diinput');window.location.href='../index.php?module=matkul#pos';</script>";
	}
}

mysql_close();
?>