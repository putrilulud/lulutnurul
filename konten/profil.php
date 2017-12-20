<h1 align="center"> <br></br>Profil Mahasiswa</h1>
<?php
	include "koneksi/koneksi.php";
	$mhs = $_SESSION['id']; $i=1;
	$hasil=mysql_query("SELECT * FROM mhs JOIN user on mhs.id_mhs = user.id_user LEFT JOIN pic on mhs.id_mhs = pic.id_user WHERE mhs.id_mhs = '$mhs'");
	$aray = mysql_fetch_array($hasil)?>
	<h3>Nama: <?php echo $aray['nama'];?> </h3>
	<h3>NIM : <?php echo $aray['id_mhs'];?> </h3>
	<h3>Username : <?php echo $aray['username'];?> </h3>
	<h3>Fakultas : <?php echo $aray['fakultas'];?> </h3>
	<h3>Jurusan : <?php echo $aray['jurusan'];?> </h3>


		<?php 
		mysql_close();
	?>