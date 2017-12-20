<h1 align="center"><br></br><br>Daftar Dosen</br></h1>
<div class="customers" >
	<table>
    	<tr>
        	<td>ID</td>
            <td>Nama Dosen</td>
            <td>Username</td>	
			<td>Password</td>
            <td>Mata Kuliah</td>
            <td colspan="5">Menu</td>
		</tr>
<?php
	include "koneksi/koneksi.php";
	$hasil=mysql_query("SELECT * FROM user JOIN matkul on user.id_matkul = matkul.id_matkul WHERE status = 'Dosen' ORDER BY user.id_matkul");
	while($aray = mysql_fetch_array($hasil)){?>
		<tr>
			<td align="center"><?php echo $aray['id_user']; ?></td>
			<td align="center"><?php echo $aray['nama']; ?></td>
			<td align="center"><?php echo $aray['username']; ?></td>
			<td align="center"><?php echo $aray['password']; ?></td>
			<td align="center"><?php echo $aray['nama_matkul']; ?></td>
            
			<td align="center"><a href="konten/edit.php?status=dosen&id=<?php echo $aray['id_user']; ?>&idmatkul=<?php echo $aray['id_matkul']; ?>" onclick="return confirm('Edit dosen <?php echo $aray['nama']; ?>?')">Edit</a></td>
            <td align="center"><a href="konten/dosen_hapus.php?id=<?php echo $aray['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus dosen <?php echo $aray['nama']; ?>?')">Hapus</a></td>
            
		</tr>
</div>
	<?php }
	mysql_close();
?>
	</table>
    <br></br>
		<a href="konten/tambah.php?status=dosen&mode=baru"><font color="#07324E"><input type="submit" value="  Tambahkan  " /></font></a><br></br><br></br>