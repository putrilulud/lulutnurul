<h1 align="center"><br></br><br>Daftar Mata Kuliah</br></h1>
<div class="customers" >
	<table align="center" width="80%" border="1px solid" cellpadding="5" cellspacing="0" >
    	<tr>
        	<td>ID</td>
            <td>Mata Kuliah</td>
            <td>SKS</td>
            <td colspan="5">Menu</td>
		</tr>
<?php
	include "koneksi/koneksi.php";
	$hasil=mysql_query("SELECT * FROM matkul ORDER BY id_matkul");
	while($aray = mysql_fetch_array($hasil)){?>
		<tr>
			<td align="center"><?php echo $aray['id_matkul']; ?></font></td>
			<td align="center"><?php echo $aray['nama_matkul']; ?></font></td>
			<td align="center"><?php echo $aray['sks']; ?></font></td>
        
			<td align="center"><a href="konten/edit.php?status=matkul&id=<?php echo $aray['id_matkul']; ?>" onclick="return confirm('Edit matkul <?php echo $aray['nama_matkul']; ?>?')">Edit</a></td>
            <td align="center"><a href="konten/matkul_hapus.php?id=<?php echo $aray['id_matkul']; ?>" onclick="return confirm('Yakin ingin menghapus matkul <?php echo $aray['nama_matkul']; ?>?')">Hapus</a></td>
            
		</tr>
		</div>
	<?php }
	mysql_close();
?>
	</table>
    <br/>
    	
		<a href="konten/tambah.php?status=matkul&mode=baru"><font color="#07324E"><input type="submit" value="  Tambahkan  " /></font></a><br></br><br></br>