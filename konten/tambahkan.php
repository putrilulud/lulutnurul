<?

if(!isset($_SESSION['id'])){ header("location: index.php"); }
	include "koneksi/koneksi.php"; 
?>

<h1 align="center"><font color="#021521">TAMBAH </font></h1>
		<form action="tambah_proses.php" method="post">
		<p>&nbsp;</p>
		
		<table border="0" align="center">
			
				<input type="text" name="status" value="Matkul" hidden/>
				<tr>
					<td>Mata Kuliah</td>
					<td>:</td>
					<td><input type="text" name="nama" required/></td>
				</tr>
				<tr>
			    	<td>SKS</td>
					<td>:</td>
					<td><input type="text" name="sks" required/></td>
			    </tr>
			<?php } else { ?>
				<tr>
					<td width="150">ID</td>
					<td>:</td>
					<td width="170"><input type="text" name="id_user" required/></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" required/></td>
				</tr>
				<tr>
			    	<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" required/></td>
			    </tr>
			    <tr>
			        <td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" required/></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" name="email" required/></td>
				</tr>
			<?php } ?>			
			<tr>
		    <?php if($_GET['status'] == "dosen"){ ?>
			    <tr>
			    	<td>Status</td>
			        <td>:</td>
			        <td><select name="status">
			 		<option value="Dosen" style="width:115px" selected>Dosen</option>
			        </select></td>
			    </tr>
		    	  <td>Mata Kuliah</td>
		          <td>:</td>
		          <td><select name="matkul"> 
		        <?php  
		    	  $query = "SELECT * FROM matkul";
		    	  $hasil = mysql_query($query);
		    	  while ($data = mysql_fetch_array($hasil)) {
		    		?><option value="<?php echo "$data[id_matkul]";?>"><?php echo "$data[nama_matkul]";?></option><?php
		    	  }
		    	?>
		    	</select></td>
		    	</tr>
		    <?php } ?>
		    <?php if($_GET['status'] == "mahasiswa"){ ?>
		    	<input type="text" name="status" value="Mahasiswa" hidden/>
				<tr>
			    	<td>Fakultas</td>
					<td>:</td>
					<td><input type="text" name="fakultas" required/></td>
			    </tr>
				<tr>
			    	<td>Jurusan</td>
					<td>:</td>
					<td><input type="text" name="jurusan" required/></td>
			    </tr>
		    	  <td>Pengajar</td>
		          <td>:</td>
		          <td><select name="dosen"> 
		        <?php  
		    	  $query = "SELECT * FROM user JOIN matkul on user.id_matkul = matkul.id_matkul WHERE status = 'Dosen'";
		    	  $hasil = mysql_query($query);
		    	  while ($data = mysql_fetch_array($hasil)) {
		    		?><option value="<?php echo "$data[id_user]";?>"><?php echo "$data[nama]";?> (<?php echo "$data[nama_matkul]";?>)</option><?php
		    	  }
		    	?>
		    	
		    	</select></td>
		    	</tr>
		    <?php } ?>
			<tr height="68">
				<td  align="right"><input class="button" type="submit" value="Tambah" style="background-color:white"/></td>
				<td> </td>
				<td><input class="button" type="reset" value="Reset" style="background-color:white"/></td>
			</tr>
		</table>
		</form>