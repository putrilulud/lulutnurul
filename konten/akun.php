<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml"/>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Untitled Document</title>
</head>

<body>
<h2>Daftar Akun</h2><br />

<div class="customers" >
                <table >
                    <tr>
                        <td>
                            ID
                        </td>
                        <td >
                            Nama
                        </td>
                        <td>
                            Username
                        </td>
						<td>
                            Password
                        </td>
						<td>
                            Mata Kuliah
                        </td>
						<td>
                            TTL
                        </td>
						<td>
                            Aksi
                        </td>
						<td>
                            
                        </td>
                    </tr>
				
<?php

	include"koneksi/koneksi.php";
	$select="select * from login where id>1";
	$hasil=mysql_query($select);

	while($buff=mysql_fetch_array($hasil))
	{
?>

	<tr>
		<td><?php echo $buff['id'];?></td>
		<td><?php echo $buff['nama'];?></td>
		<td><?php echo $buff['username'];?></td>
		<td><?php echo $buff['password'];?></td>
		<td><?php echo $buff['matkul'];?></td>
		<td><?php echo $buff['ttl'];?></td>
		<td><a href="konten/editakun.php?id=<?php echo $buff['id'];?>">edit</a></td>
		<td><a href="konten/hapusakun.php?id=<?php echo $buff['id'];?>">hapus</a></td>
	</tr>

<?php
};
mysql_close();
?></table>
</div><br />
</body>
</html>