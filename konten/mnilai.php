<h1 align="center"><br><br></br>Nilai <?php echo $_SESSION['nama']; ?></br></h1>
<div class="customers">	
<table>
    	<tr>
        	<td width="150">NIM</td>
        	<td width="300">MATKUL</td>
            <td width="100">FORMATIF</td>
			<td width="100">UTS</td>
			<td  width="100">UAS</td>
			<td  width="100">NILAI AKHIR</td>
			<td  width="100">GRADE</td>
			<td  width="100">IPK</td>
			<td  width="150">PREDIKAT</td>
		</tr>
	<?php
		include "koneksi/koneksi.php";
		$mhs = $_SESSION['id'];
		$hasil = mysql_query("SELECT * FROM nilai JOIN user on nilai.id_dosen = user.id_user LEFT JOIN matkul on user.id_matkul = matkul.id_matkul left join mhs on nilai.id_mhs=mhs.id_mhs where .nilai.id_mhs = '$mhs'");
		while($aray = mysql_fetch_array($hasil)){?>
			<tr>
				<td width="150" align="center"><?php echo $aray['id_mhs']; ?></font></td>
				<td width="300" align="center"><?php echo $aray['nama_matkul']; ?></font></td>
				<td width="100" align="center"><?php echo $aray['formatif']; ?></font></td>
				<td width="100" align="center"><?php echo $aray['uts']; ?></font></td>
				<td width="100" align="center"><?php echo $aray['uas']; ?></font></td>
				<td width="100" align="center"><?php echo $aray['nilai']; ?></font></td>
				<td width="100" align="center"><?php echo $aray['huruf']; ?></font></td>
				<td width="100" align="center"><?php echo $aray['ipk']; ?></font></td>
				<td width="100" width="150" align="center"><?php echo $aray['predikat']; ?></font></td>
			</tr>
		<?php }
		mysql_close();
	?>
	</table>
</div>
    <br/>
	<br></br>
     <a href="cetak_nilai.php"><font color="#07324E"><span></span><span></span><input type="submit" value="  Download Excel  " /></font></a>    <span></span>   
    <a href="cetak_pdf.php"><font color="#07324E"><input type="submit" value="  Download PDF  " /></font></a>