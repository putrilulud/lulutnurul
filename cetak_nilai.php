<?php
error_reporting(0);
ob_start();
session_start();
include"koneksi/koneksi.php";
$tgl=date("Y-m-d");
$mhs = $_SESSION['id'];
$sql=mysql_query("SELECT * FROM nilai JOIN user on nilai.id_dosen = user.id_user LEFT JOIN matkul on user.id_matkul = matkul.id_matkul left join mhs on nilai.id_mhs=mhs.id_mhs where nilai.id_mhs = '$mhs'");
while($data=mysql_fetch_array($sql)){
	$fak=$data["fakultas"];
	$jur=$data["jurusan"];

$content="
<h2>Sistem Akademik Informasi</h2>
<h4>UIN Syarif Hidayatullah Jakarta</h4>
Nama     : $_SESSION[nama]<br/>
Fakultas : $fak<br/>
Jurusan  : $jur<br/>


<table>
<tr>
<td>NIM</td>
<td>MATKUL</td>
<td>FORMATIF</td>
<td>UTS</td>
<td>UAS</td>
<td>NILAI AKHIR</td>
<td>GRADE</td>
<td>PREDIKAT</td>
<td>IPK</td>
</tr>";
		
$content .="
<tr>
<td>".$data['id_mhs']."</td>
<td>".$data['nama_matkul']."</td>
<td>".$data['formatif']."</td>
<td>".$data['uts']."</td>
<td>".$data['uas']."</td>
<td>".$data['nilai']."</td>
<td>".$data['huruf']."</td>
<td>".$data['predikat']."</td>
<td>".$data['ipk']."</td>

</tr>
";
}
$content .="</table>";
header("Content-type: application/msdownload");
header("Content-disposition: inline; filename=$tgl.xls");
header("Content-length: " . strlen($content));
echo $content;

?>