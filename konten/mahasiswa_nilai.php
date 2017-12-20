<h1 align="center">Nilai <?php echo $_SESSION['nama']; ?></h1>
	<table width="100%" border="1px solid" cellpadding="5" cellspacing="0" >
    	<tr>
        	<th>NIM</th>
        	<th>MATKUL</th>
            <th>FORMATIF</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>NILAI AKHIR</th>
			<th>GRADE</th>
			<th>IPK</th>
			<th>PREDIKAT</th>
		</tr>
	<?php
		include "config.php";
		$mhs = $_SESSION['id'];
		$hasil = mysql_query("SELECT * FROM nilai JOIN user on nilai.id_dosen = user.id_user LEFT JOIN matkul on user.id_matkul = matkul.id_matkul left join mhs on nilai.id_mhs=mhs.id_mhs where .nilai.id_mhs = '$mhs'");
		while($aray = mysql_fetch_array($hasil)){?>
			<tr>
				<td align="center"><?php echo $aray['id_mhs']; ?></font></td>
				<td align="center"><?php echo $aray['nama_matkul']; ?></font></td>
				<td align="center"><?php echo $aray['formatif']; ?></font></td>
				<td align="center"><?php echo $aray['uts']; ?></font></td>
				<td align="center"><?php echo $aray['uas']; ?></font></td>
				<td align="center"><?php echo $aray['nilai']; ?></font></td>
				<td align="center"><?php echo $aray['huruf']; ?></font></td>
				<td align="center"><?php echo $aray['ipk']; ?></font></td>
				<td align="center"><?php echo $aray['predikat']; ?></font></td>
			</tr>
		<?php }
		mysql_close();
	?>
	</table>
    <br/>
    <a href="cetak_nilai.php"><font color="#07324E">Cetak Excel</font></a> ||   
    <a href="cetak_pdf.php"><font color="#07324E">Cetak PDF</font></a>