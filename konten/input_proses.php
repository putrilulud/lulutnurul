<?php
include "../koneksi/koneksi.php";
session_start();

$dosen = $_SESSION['id'];
if($_POST['nilaiakhir'] >= 80){ $huruf = "A"; $ipk = "4.0" ; $predikat = "Sangat Baik"; }
elseif($_POST['nilaiakhir'] >= 70){ $huruf = "B";$ipk = "3.5" ;  $predikat = "Baik"; }
elseif($_POST['nilaiakhir'] >= 60){ $huruf = "C";$ipk = "3.0" ;  $predikat = "Cukup"; }
elseif($_POST['nilaiakhir'] >= 50){ $huruf = "D"; $ipk = "2.5" ; $predikat = "Buruk"; }
else { $huruf = "E";$ipk = "2.0" ;  $predikat = "Sangat Buruk"; }

$query = mysql_query("SELECT * FROM nilai WHERE id_mhs = '$_POST[pilih_siswa]'");
if(mysql_num_rows($query) > 0){ 
	$edit= mysql_query("UPDATE nilai SET formatif ='$_POST[formatif]', uts='$_POST[uts]', uas='$_POST[uas]', nilai='$_POST[nilaiakhir]', huruf='$huruf', ipk='$ipk', predikat='$predikat' WHERE id_mhs='$_POST[pilih_siswa]'");
	if($edit){
	echo"<script>alert('Selamat, Data nilai mahasiswa sudah berhasil diedit');window.location.href='../index.php?module=input#pos';</script>";
}
} else {
	$edit= mysql_query("INSERT INTO nilai (id_mhs,id_dosen,formatif,uts,uas,nilai,huruf,ipk,predikat) VALUES
		   ('$_POST[pilih_siswa]','$dosen','$_POST[formatif]','$_POST[uts]','$_POST[uas]','$_POST[nilaiakhir]','$huruf','$ipk','$predikat')");
	if($edit){
	echo"<script>alert('Selamat, Data nilai mahasiswa berhasil diinput');window.location.href='../index.php?module=input#pos';</script>";
}
}

mysql_close();
?>