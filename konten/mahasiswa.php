
<h1 align="center"><br></br><br>Daftar Mahasiswa</br></h1>
<div class="customers" >
	<table>
    	<tr>
        	<td>NIM</td>
            <td>Nama</td>
            <td>Fakultas</td>
			<td>Jurusan</td>
			
            <td colspan="5">Menu</td>
		</tr>
<?php
	include "koneksi/koneksi.php";
	$hasil=mysql_query("SELECT * FROM user JOIN mhs on user.id_user = mhs.id_mhs WHERE status = 'Mahasiswa' ORDER BY id_user");
	while($aray = mysql_fetch_array($hasil)){?>
		<tr>
			<td align="center"><?php echo $aray['id_user']; ?></td>
			<td align="center"><?php echo $aray['nama']; ?></td>
			<td align="center"><?php echo $aray['fakultas']; ?></td>
			<td align="center"><?php echo $aray['jurusan']; ?></td>
            
			<td align="center"><a href="konten/edit.php?status=mahasiswa&id=<?php echo $aray['id_user']; ?>&iddosen=<?php echo $aray['id_dosen']; ?>" onclick="return confirm('Edit mahasiswa <?php echo $aray['nama']; ?>?')">Edit</a></td>
            <td align="center"><a href="konten/mahasiswa_hapus.php?id=<?php echo $aray['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus mahasiswa <?php echo $aray['nama']; ?>?')">Hapus</a></td>
            
		</tr>
	</div>
	<?php }
	mysql_close();
?>
	</table>
    <br/>
    	    	<a href="konten/tambah.php?status=mahasiswa&mode=baru"><font color="#07324E"><input type="submit" value="  Tambahkan  " /></font></a><br></br><br></br>
