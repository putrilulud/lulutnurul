<h1 align="center"> <br></br>Daftar Mahasiswa</h1>
	<div class="customers">
	<table width="100%" border="1px solid" cellpadding="5" cellspacing="0" overflow="auto" >
    	<tr>
    		<td>No</td>
        	<td>NIM</td>
            <td>Nama</td>
            <td>Fakultas</td>
			<td>Jurusan</td>
			<td>Nilai</td>
			<td>IPK</td>
			<td>Predikat</td>
		</tr>
	<?php
		include "koneksi/koneksi.php";
		$dosen = $_SESSION['id']; $i=1;
		$hasil=mysql_query("SELECT * FROM mhs JOIN user on mhs.id_mhs = user.id_user LEFT JOIN nilai on mhs.id_mhs = nilai.id_mhs WHERE mhs.id_dosen = '$dosen' ORDER BY id_user");
		while($aray = mysql_fetch_array($hasil)){?>
			<tr>
				<td align="center"><?php echo $i++; ?></font></td>
				<td align="center"><?php echo $aray['id_user']; ?></font></td>
				<td align="center"><?php echo $aray['nama']; ?></font></td>
				<td align="center"><?php echo $aray['fakultas']; ?></font></td>
				<td align="center"><?php echo $aray['jurusan']; ?></font></td>
				<td align="center"><?php echo $aray['huruf']; ?></font></td>
				<td align="center"><?php echo $aray['ipk']; ?></font></td>
				<td align="center"><?php echo $aray['predikat']; ?></font></td>
			</tr>
		<?php }
		mysql_close();
	?>
	</table>
    <br/>
	</div>