<?php
	session_start();
	if(!isset($_SESSION['id'])){ header("location: index.php"); }
	include "../koneksi/koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>UAS WEB</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<div id="container">
			<div id="banner">
				<div class="banner-info">
				<img src="../image/test.gif" width="100%">
			</div>	
			
<?php if(@$_SESSION['status'] == "Admin"){ ?>
				</div>
		
		<div id="cssmenu">
					<ul>
				<li><a href="../index.php"><span>Home</span></a></li>
				<li class='active has-sub'><a href='#'><span>Menu</span></a>
				<ul>
					<li><a href="../index.php?module=Mahasiswa#pos"><span>Mahasiswa</span></a></li>
					<li><a href="../index.php?module=dosen#pos"><span>Dosen</span></a></li>
					<li class='last'><a href="../index.php?module=matkul#pos"><span>Mata Kuliah</span></a></li>
				</ul>
				</li>
				<li><a href="http://www.uinjkt.ac.id"><span>Website UIN</span></a></li>
				<li class='last'><a href="../index.php?module=Logout#pos"><span>Logout</span></a></li>
					
	<?php }?>
	
	<?php if(@$_SESSION['status'] == "Dosen"){ ?>
				</div>
		<div id="cssmenu">
			<ul>
				<li><a href="index.php"><span>Home</span></a></li>
				<li class='active has-sub'><a href='#'><span>Menu</span></a>
				<ul>
					<li><a href="../index.php?module=mahasiswa_do#pos"><span>Daftar Mahasiswa</span></a></li>
					<li><a href="../index.php?module=input#pos"><span>Input Nilai</span></a></li>
				</ul>
				</li>
				<li><a href="http://www.uinjkt.ac.id"><span>Website UIN</span></a></li>
				<li class='last'><a href="../index.php?module=Logout#pos"><span>Logout</span></a></li>
	<?php }?>
	
	<?php if(@$_SESSION['status'] == "Mahasiswa"){ ?>
				</div>
		<div id="cssmenu">
			<ul>
					<li><a href="index.php"><span>Home</span></a></li>
				<li class='active has-sub'><a href='#'><span>Menu</span></a>
				<ul>
					<li><a href="../index.php?module=mnilai#pos"><span>Lihat Nilai</span></a></li>
				</ul>
				</li>
				<li><a href="http://www.uinjkt.ac.id"><span>Website UIN</span></a></li>
				<li class='last'><a href="../index.php?module=Logout#pos"><span>Logout</span></a></li>
	<?php }?>
	
	<?php if(@$_SESSION['status']){ ?>
			<li><a><u>Status :  
					<?php 
						echo $_SESSION["status"];
					?></u></a></li>
			<div id="menucari">
			<form method="post" action="?module=cari#pos">
				</label><input class="inputfield" name="username" type="text"  id="username" placeholder=" Search Username.." />
				<input class="button" type="submit" name=" Search " value=" Search " style="background-color:white" />
				</form>
			</div><?php }?>
				</ul>
							</div>
		<div id="page">
		<h1 align="center"><br></br><br>EDIT <?php echo strtoupper("$_GET[status]"); ?></br></h1>
		<form action="edit_proses.php" method="post">

		<?php if($_GET['status'] == "matkul"){ 
			$query = "SELECT * FROM matkul WHERE id_matkul = $_GET[id] LIMIT 1";
			$hasil = mysql_query($query);
			while ($data = mysql_fetch_array($hasil)){ ?>
				<p>&nbsp;</p>
				<table border="0" align="center">
				<input type="text" name="status" value="Matkul" hidden/>
				<tr>
					<td>ID Matkul</td>
					<td>:</td>
					<td><input type="text" name="id_matkul" value="<?php echo $data['id_matkul']; ?>" style="background-color: #D2E9ED; color: black;" readonly/></td>
				</tr>			
				<tr>
					<td>Matkul</td>
					<td>:</td>
					<td><input type="text" name="nama" value="<?php echo $data['nama_matkul']; ?>" required/></td>
				</tr>
				<tr>
			    	<td>SKS</td>
					<td>:</td>
					<td><input type="text" name="sks" value="<?php echo $data['sks']; ?>" required/></td>
			    </tr>
			<?php }
			} else {
			$query = "SELECT * FROM user WHERE id_user = $_GET[id] LIMIT 1";
			$hasil = mysql_query($query);
			while ($data = mysql_fetch_array($hasil)){ ?>
			<p>&nbsp;</p>
			<table border="0" align="center">
				<tr>
					<td width="150">ID</td>
					<td>:</td>
					<td width="170"><input type="text" name="id_user" value="<?php echo $data['id_user']; ?>" style="background-color: #D2E9ED; color: black;" readonly></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required/></td>
				</tr>
			    	<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" value="<?php echo $data['username']; ?>" required/></td>
			    </tr>
			        <td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" value="<?php echo $data['password']; ?>" required/></td>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" name="email" value="<?php echo $data['email']; ?>" required/></td>
				</tr>
			<?php } ?>

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
		    	  $query2 = "SELECT * FROM matkul";
		    	  $hasil2 = mysql_query($query2);
		    	  while ($data2 = mysql_fetch_array($hasil2)) {
		    		?><option value="<?php echo $data2['id_matkul'];?>" <?php if("$data2[id_matkul]" == $_GET['idmatkul']){ echo "selected"; } ?>><?php echo "$data2[nama_matkul]";?></option><?php
		    	  }
		    	?>
		    	</select></td>
		    	</tr>
		    <?php } ?>

		    <?php if($_GET['status'] == "mahasiswa"){ ?>
		    	<input type="text" name="status" value="Mahasiswa" hidden/>
		    	<?php  
		    	  $query1 = "SELECT * FROM mhs WHERE id_mhs = '$_GET[id]'";
		    	  $hasil1 = mysql_query($query1);
		    	  while ($data1 = mysql_fetch_array($hasil1)) {
		    	?>
				<tr>
			    	<td>Fakultas</td>
					<td>:</td>
					<td><input type="text" name="fakultas" value="<?php echo $data1['fakultas']; ?>" required/></td>
			    </tr>
				<tr>
			    	<td>Jurusan</td>
					<td>:</td>
					<td><input type="text" name="jurusan" value="<?php echo $data1['jurusan']; ?>" required/></td>
			    </tr>
		    	  <td>Dosen</td>
		          <td>:</td>
		          <td><select name="dosen"> 
		        <?php } ?>
		        <?php  
		    	  $query2 = "SELECT * FROM user JOIN matkul on user.id_matkul = matkul.id_matkul WHERE status = 'Dosen'";
		    	  $hasil2 = mysql_query($query2);
		    	  while ($data2 = mysql_fetch_array($hasil2)) {
		    		?><option value="<?php echo "$data2[id_user]";?>" <?php if("$data2[id_user]" == $_GET['iddosen']){ echo "selected"; } ?>><?php echo "$data2[nama]";?> (<?php echo "$data2[nama_matkul]";?>)</option><?php
		    	  }
		    	?>
		    	</select></td>
		    	</tr>
		    <?php }
			} ?>
			<tr height="68">
				<td  align="right"><input class="button" type="submit" value="Simpan"style="background-color:white"/></td>
				<td> </td>
				<td><input class="button" type="reset" value="Reset"style="background-color:white"/></td>
			</tr>
		</table>
		</form>

			<br class="clearfloat" />
		</div>

		<div id="footer">
			<p>&copy; 2015 Lulut dan Nurul <i>All Right Reserved</i></p>
		</div>
	</div>
	</body>
</html>